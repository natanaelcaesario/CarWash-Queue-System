<?php

namespace App\Controllers\Costumer;

use App\Controllers\BaseController;

class Costumer extends BaseController
{
    // USER LOG
    protected $snap;
    public function login()
    {
        if ($this->request->getPost()) {
            $session = session();
            $userModel = new \App\Models\UserModel();
            $login = $this->request->getPost();
            $find = $userModel->where('email', $login['email'])->first();
            if ($find) {
                if ($find->password == $login['password']) {
                    $ses_data = [
                        'id_pengguna' => $find->id_pengguna,
                        'nama' => $find->nama,
                        'nomorhandphone' => $find->nomorhandphone,
                        'email' => $find->email,
                        'logged' => TRUE,
                        'user' => TRUE,
                    ];
                    $session->set($ses_data);
                    return redirect()->to(site_url('home'));
                }
            }
            session()->setFlashdata('errors', 'Username atau password anda salah');
            return redirect()->to(site_url('user/login'));
        }
        echo view('costumers/init/navbar');
        echo view('costumers/init/login');
        echo view('costumers/init/footer');
    }

    public function register()
    {
        if ($this->request->getPost()) {
            $daftar = $this->request->getPost();
            $session = session();
            $userModel = new \App\Models\UserModel();
            $user = new \App\Entities\User();
            $find = $userModel->where('email', $daftar["email"])->find();
            if ($find) {
                session()->setFlashdata('errors', 'Sepertinya anda sudah memiliki akun');
                return redirect()->to(site_url('user/register'));
            }
            $user->fill($daftar);
            $userModel->save($user);
            session()->setFlashdata('success', 'Akun anda berhasil dibuat');
            return redirect()->to(site_url('user/login'));
        }
        echo view('costumers/init/navbar');
        echo view('costumers/init/register');
        echo view('costumers/init/footer');
    }

    public function logout()
    {
        if (session()->has('logged')) {
            session_destroy();
            unset($ses_data);
            return redirect()->to(site_url('user/login'));
        }
    }
    // END


    // USER TRANS
    public function sewa()
    {
        // ambil session
        $id_pengguna = session()->get('id_pengguna');
        if (!session()->has('user')) {
            return redirect()->to(site_url('user/login'));
        }
        $id = $this->request->uri->getSegment(3);
        $motorModel = new \App\Models\MotorModel();
        $sewaModel = new \App\Models\SewaModel();
        $sewa = new \App\Entities\Sewa();
        $motor = $motorModel->where('id_motor', $id)->first();
        $cari = $sewaModel->where('id_motor', $motor->id_motor)->find();
        if ($cari && $motor->status !== "Tersedia") {
            return redirect()->to(site_url('user/transaksi'));
        }
        if ($this->request->getPost()) {
            $data = $this->request->getPost();
            $sewa->fill($data);
            $data = [
                'status' => "Akan Disewa"
            ];
            $motorModel->update($id, $data);
            helper('text');
            $sewa->kode_booking = random_string('alnum', 8);
            $sewaModel->save($sewa);
            session()->setFlashdata('success', 'Berhasil membuat transaksi');
            return redirect()->to(site_url('user/transaksi'));
        }
        $data = session()->get();
        echo view('costumers/init/sewa', ['data' => $data, 'motor' => $motor, 'id_pengguna' => $id_pengguna]);
    }

    public function profil()
    {
        if (!session()->has('user')) {
            return redirect()->to(site_url('user/login'));
        }
        $userModel = new \App\Models\UserModel();
        $user = new \App\Entities\User();
        $data = session()->get('id_pengguna');
        $info = $userModel->where('id_pengguna', $data)->first();
        if ($this->request->getPost()) {
            $posting = $this->request->getPost();
            $user->fill($posting)->info;
            $userModel->update($data, $posting);
            return \redirect()->to(\site_url('user/profil'));
        }
        session()->setFlashdata('success', 'Akun anda berhasil diupdate');
        return view('costumers/init/dashboard', ['info' => $info]);
    }

    public function foto()
    {
        if (!session()->has('user')) {
            return redirect()->to(site_url('user/login'));
        }
        $id = session()->get('id_pengguna');
        $userModel = new \App\Models\UserModel();
        $user = new \App\Entities\User();
        $info = $userModel->where('id_pengguna', $id)->first();
        if ($this->request->getFile('gambar')) {
            $gambar = $this->request->getFile('gambar');
            $img = $gambar->getRandomName();
            $writepath = './uploads/profil';
            $gambar->move($writepath, $img);
            $data = [
                'gambar' => $img
            ];
            $userModel->update($id, $data);
            header("Refresh:0;");
        }
        return view('costumers/init/foto', ['info' => $info]);
    }
    public function transaksi()
    {
        if (!session()->has('user')) {
            return redirect()->to(site_url('user/login'));
        }
        $session = session();
        $current = $session->get();
        $id_pengguna = $current["id_pengguna"];
        $sewaModel = new \App\Models\SewaModel();
        $motorModel = new \App\Models\MotorModel();

        $data = $sewaModel->findAll();
        foreach ($data as $a) {
            // ubah jadi unix time
            $data =  strtotime($a->deadline);
            // waktu sekarang dengan unix time
            $sekarang =  strtotime("+13 Hours 1 Minute");
            // fungsinya , kurangi waktu deadline dengan waktu sekarang
            $nilai = $data - $sekarang;
            // kalau waktu deadline - sekarang = 0 , maka status akan dihapus , namun hanya berlaku untuk status yang belum lunas
            if ($a->status == "Belum Lunas") {
                if ($nilai <= 0) {
                    $sewaModel->delete($a->id_sewa);
                    //    update data motor setelah transaksi yang belum lunas dihapus
                    $id = $a->id_motor;
                    $data = [
                        'status' => "Tersedia"
                    ];
                    $motorModel->update($id, $data);
                }
            }
        }
        $hai = $sewaModel->where('id_pengguna', $current['id_pengguna'])->findAll();
        return view('costumers/init/transaksi', ['hai' => $hai, 'current' => $current]);
    }

    public function bayar()
    {
        $id = $this->request->uri->getSegment(3);
        // declare
        $sewaModel = new \App\Models\SewaModel();
        $motorModel = new \App\Models\MotorModel();
        $service = \Config\Services::Midtrans();
        // data
        $sewa = $sewaModel->where('id_sewa', $id)->first();
        $motor = $motorModel->where('id_motor', $sewa->id_motor)->first();

        // parameter
        $params = array(
            'transaction_details' => array(
                'order_id' => $id,
                'gross_amount' => $sewa->harga,
            ),
            'customer_details' => array(
                'first_name' => $sewa->nama,
                'phone' => $sewa->nomorhandphone,
            ),
        );
        if ($this->request->getPost()) {
            $id = $this->request->getPost("id_sewa");
            $data = [
                'status' => "Diterima",
            ];
            $motor = [
                'status' => "Disewa"
            ];
            $motorModel->update($motorModel->id_motor, $motor);
            $sewaModel->update($id, $data);
            return redirect()->to(site_url('user/transaksi'));
        }
        $snapToken = $service->getSnapToken($params)->token;

        $data = [
            'sewa' => $sewa,
            'motor' => $motor,
            'snapToken' => $snapToken
        ];

        return view('costumers/init/bayar', $data);
    }
    public function batal()
    {
        $id = $this->request->uri->getSegment(3);
        // declare
        $sewaModel = new \App\Models\SewaModel();
        $motorModel = new \App\Models\MotorModel();
        $service = \Config\Services::Midtrans();
        // data
        $sewa = $sewaModel->where('id_sewa', $id)->first();
        $motor = $motorModel->where('id_motor', $sewa->id_motor)->set('status', 'Tersedia')->update();
        if ($motor) {
            $sewa = $sewaModel->where('id_sewa', $id)->delete();

            return redirect()->to(site_url('user/transaksi'));
        }
    }
    public function carasewa()
    {
        return view('costumers/init/carasewa');
    }
    public function antrian()
    {
        $antrian = new \App\Models\AntrianModel();
        if (!session()->has('user')) {
            return redirect()->to(site_url('user/login'));
        }

        $cari = $antrian->where('id_pengguna', session()->get()['id_pengguna'])->first();
        if ($cari) {
            return view('costumers/init/antrian2', ['cari' => $cari]);
        }


        if ($this->request->getPost()) {
            $itung = $antrian->findAll();
            if (count($itung) < 1) {
                $db = \Config\Database::connect();
                $db->query("ALTER TABLE antrian AUTO_INCREMENT = 1");
            }
            $data = [
                'nama_pelanggan' => $this->request->getPost('nama'),
                'status' => "Antri",
                'tanggal' => date("Y-m-d"),
                'id_pengguna' => session()->get()['id_pengguna'],
            ];
            $antrian->insert($data);
            return redirect()->to(base_url('antrian'));
        }


        return view('costumers/init/antrian', ['cari' => $cari]);
    }
    //--------------------------------------------------------------------

}
