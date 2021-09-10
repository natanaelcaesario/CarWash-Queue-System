<?php

namespace App\Controllers\Admin;

// defined('BASEPATH') or exit("404 Not Found");

use App\Controllers\BaseController;
use FPDF;

class Admin extends BaseController
{
    // users
    public function index()
    {
        if (session()->has('user')) {
            $session = session();
            $session->destroy();
            return redirect()->to(site_url('admin/login'));
        }
        if (!session()->has('admin')) {
            return redirect()->to(site_url('admin/login'));
        }
        $userModel = new \App\Models\UserModel();
        $semua = $userModel->findAll();
        return view('utama/index', ['semua' => $semua]);
    }
    public function hapususer()
    {
        if (session()->has('user')) {
            $session = session();
            $session->destroy();
            return redirect()->to(site_url('admin/login'));
        }
        if (!session()->has('admin')) {
            return redirect()->to(site_url('admin/login'));
        }
        $id = $this->request->uri->getSegment(3);
        $penggunaModel = new \App\Models\UserModel();
        $penggunaModel->delete($id);
        return redirect()->to(site_url('admin'));
    }
    public function edituser()
    {
        if (session()->has('user')) {
            $session = session();
            $session->destroy();
            return redirect()->to(site_url('admin/login'));
        }
        if (!session()->has('admin')) {
            return redirect()->to(site_url('admin/login'));
        }
        $id = $this->request->uri->getSegment(3);
        $penggunaModel = new \App\Models\UserModel();
        $pengguna = new \App\Entities\User();
        $cari = $penggunaModel->find($id);
        if ($this->request->getPost()) {
            $posting = $this->request->getPost();
            $pengguna->fill($posting)->cari;
            $penggunaModel->update($id, $posting);
            return redirect()->to(site_url('admin'));
        }
        echo view('utama/edituser', ['cari' => $cari]);
    }
    public function login()
    {

        if (session()->has('user')) {
            $session = session();
            $session->destroy();
        }
        if (session()->has('admin')) {
            return redirect()->to(site_url('admin'));
        }
        if ($this->request->getPost()) {
            $session = session();
            $username = $this->request->getPost("username");
            $password = $this->request->getPost("password");
            $adminModel = new \App\Models\AdminModel();
            $admin = $adminModel->where('username', $username)->first();
            if ($admin) {
                if ($admin->password == $password) {
                    $ses_data = [
                        'id_admin' => $admin->id_admin,
                        'username' => $admin->username,
                        'logged' => true,
                        'admin' => true,
                    ];
                    $session->set($ses_data);
                    return \redirect()->to(\site_url('admin'));
                }
            }
        }
        echo view('utama/login');
        //--------------------------------------------------------------------

    }
    public function antrian()
    {
        if (session()->has('user')) {
            $session = session();
            $session->destroy();
            return redirect()->to(site_url('admin/login'));
        }
        if (!session()->has('admin')) {
            return redirect()->to(site_url('admin/login'));
        }
        $antrian = new \App\Models\AntrianModel();
        $data = $antrian->findAll();
        return view('utama/antrian', ['data' => $data]);
    }
    public function hapusantrian()
    {
        if (session()->has('user')) {
            $session = session();
            $session->destroy();
            return redirect()->to(site_url('admin/login'));
        }
        if (!session()->has('admin')) {
            return redirect()->to(site_url('admin/login'));
        }
        $id = $this->request->uri->getSegment(3);

        $antrianModel = new \App\Models\AntrianModel();
        $antrianModel->delete($id);
        return redirect()->to(site_url('admin/antrian'));
    }
    // transaksi
    public function transaksi()
    {
        if (session()->has('user')) {
            $session = session();
            $session->destroy();
            return redirect()->to(site_url('admin/login'));
        }
        if (!session()->has('admin')) {
            return redirect()->to(site_url('admin/login'));
        }
        $db = \Config\Database::connect();
        $cari = $db->query("SELECT * FROM sewa INNER JOIN pengguna ON sewa.id_pengguna = pengguna.id_pengguna");
        $data = $cari->getResult();
        return view('utama/transaksi', ['data' => $data]);
    }
    public function edittransaksi()
    {
        if (session()->has('user')) {
            $session = session();
            $session->destroy();
            return redirect()->to(site_url('admin/login'));
        }
        if (!session()->has('admin')) {
            return redirect()->to(site_url('admin/login'));
        }
        $id = $this->request->uri->getSegment(3);
        $transaksiModel = new \App\Models\SewaModel();
        $transaksi = $transaksiModel->find($id);
        return view('utama/edittransaksi', ['transaksi' => $transaksi]);
    }
    public function hapustransaksi()
    {
        if (session()->has('user')) {
            $session = session();
            $session->destroy();
            return redirect()->to(site_url('admin/login'));
        }
        if (!session()->has('admin')) {
            return redirect()->to(site_url('admin/login'));
        }
        $id = $this->request->uri->getSegment(3);
        $id2 = $this->request->uri->getSegment(4);
        $motorModel = new \App\Models\MotorModel();
        $sewaModel = new \App\Models\SewaModel();
        $data = [
            'status' => 'Tersedia'
        ];
        $motorModel->update($id2, $data);
        $sewaModel->delete($id);
        return redirect()->to(site_url('admin/transaksi'));
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return \redirect()->to(\site_url('admin/login'));
    }

    // produk
    public function hapusproduk()
    {
        if (session()->has('user')) {
            $session = session();
            $session->destroy();
            return redirect()->to(site_url('admin/login'));
        }
        if (!session()->has('admin')) {
            return redirect()->to(site_url('admin/login'));
        }
        $id = $this->request->uri->getSegment(3);
        $motorModel = new \App\Models\MotorModel();
        $motorModel->delete($id);
        return redirect()->to(site_url('admin/listproduk'));
    }
    public function editproduk()
    {
        if (session()->has('user')) {
            $session = session();
            $session->destroy();
            return redirect()->to(site_url('admin/login'));
        }
        if (!session()->has('admin')) {
            return redirect()->to(site_url('admin/login'));
        }
        $id = $this->request->uri->getSegment(3);
        $motorModel = new \App\Models\MotorModel();
        $motorEntity = new \App\Entities\Motor();
        $motor = $motorModel->where('id_motor', $id)->first();
        if ($this->request->getPost()) {
            $data = $this->request->getPost();
            $motorEntity->fill($data)->motor;
            $motorModel->update($id, $data);
            header("Refresh:0;");
        }

        return view('utama/editproduk', ['motor' => $motor]);
    }
    public function tambahproduk()
    {
        if (session()->has('user')) {
            $session = session();
            $session->destroy();
            return redirect()->to(site_url('admin/login'));
        }
        if (!session()->has('admin')) {
            return redirect()->to(site_url('admin/login'));
        }
        if ($this->request->getPost()) {
            $motorModel = new \App\Models\MotorModel();
            $motor = new \App\Entities\Motor();
            $data = $this->request->getPost();
            $motor->fill($data);
            $gambar = $this->request->getFile('gambar_motor');
            $img = $gambar->getRandomName();
            $writepath = './uploads/gambar_produk';
            $gambar->move($writepath, $img);
            $motor->gambar_motor = $img;
            $motorModel->save($motor);
            return redirect()->to(site_url('admin/listproduk'));
        }
        echo view('utama/tambahproduk');
    }
    public function gantigambar()
    {
        if (session()->has('user')) {
            $session = session();
            $session->destroy();
            return redirect()->to(site_url('admin/login'));
        }
        if (!session()->has('admin')) {
            return redirect()->to(site_url('admin/login'));
        }
        if (!session()->has('admin')) {
            return redirect()->to(site_url('user/login'));
        }
        $id = $this->request->uri->getSegment(3);
        $motorModel = new \App\Models\MotorModel();
        if ($this->request->getFile('gambar_motor')) {
            $gambar = $this->request->getFile('gambar_motor');
            $img = $gambar->getRandomName();
            $writepath = './uploads/gambar_produk';
            $gambar->move($writepath, $img);
            $data = [
                'gambar_motor' => $img,
            ];
            $motorModel->update($id, $data);
            header("Refresh:0;");
            return redirect()->to(site_url('admin/listproduk'));
        }
        echo view('utama/gantigambar');
    }
    public function listproduk()
    {
        if (session()->has('user')) {
            $session = session();
            $session->destroy();
            return redirect()->to(site_url('admin/login'));
        }
        if (!session()->has('admin')) {
            return redirect()->to(site_url('admin/login'));
        }
        $motorModel = new \App\Models\MotorModel();
        $data = $motorModel->findAll();
        return view('utama/listproduk', ['data' => $data]);
    }

    public function terima()
    {
        if (session()->has('user')) {
            $session = session();
            $session->destroy();
            return redirect()->to(site_url('admin/login'));
        }
        if (!session()->has('admin')) {
            return redirect()->to(site_url('admin/login'));
        }
        $id = $this->request->uri->getSegment(3);
        $id2 = $this->request->uri->getSegment(4);
        $sewaModel = new \App\Models\SewaModel();
        $motorModel = new \App\Models\MotorModel();

        $data2 = [
            'status' => "Disewa"
        ];
        $data = [
            'status' => "Diterima",
        ];
        $motorModel->update($id2, $data2);
        $sewaModel->update($id, $data);
        return redirect()->to(site_url('admin/edittransaksi/' . $id));
    }
    public function tolak()
    {
        if (session()->has('user')) {
            $session = session();
            $session->destroy();
            return redirect()->to(site_url('admin/login'));
        }
        if (!session()->has('admin')) {
            return redirect()->to(site_url('admin/login'));
        }
        $id = $this->request->uri->getSegment(3);

        $sewaModel = new \App\Models\SewaModel();
        $sewa = $sewaModel->find($id);
        $motorModel = new \App\Models\MotorModel();
        $data = [
            'status' => "Ulangi Pembayaran",
        ];
        $data2 = [
            'status' => "Tersedia"
        ];
        $id2 = $sewa->id_motor;
        $motorModel->update($id2, $data2);
        $sewaModel->update($id, $data);
        return redirect()->to(site_url('admin/edittransaksi/' . $id));
    }
    public function cetak()
    {
        if (session()->has('user')) {
            $session = session();
            $session->destroy();
            return redirect()->to(site_url('admin/login'));
        }
        if (!session()->has('admin')) {
            return redirect()->to(site_url('admin/login'));
        }
        if ($this->request->getPost()) {
            $tglawal = $this->request->getPost("tglawal");
            $tglakhir = $this->request->getPost("tglakhir");
            $db = \Config\Database::connect();
            $gasken = $db->query("SELECT * FROM sewa INNER JOIN pengguna ON sewa.id_pengguna=pengguna.id_pengguna  WHERE tglkembali BETWEEN '$tglawal' AND '$tglakhir'");
            $result = $gasken->getResult();

            return view('utama/cetak', ['result' => $result, 'tglawal' => $tglawal, 'tglakhir' => $tglakhir]);
        }
    }
    public function laporan()
    {
        if (session()->has('user')) {
            $session = session();
            $session->destroy();
            return redirect()->to(site_url('admin/login'));
        }
        if (!session()->has('admin')) {
            return redirect()->to(site_url('admin/login'));
        }
        if ($this->request->getPost()) {
            $tglawal = $this->request->getPost("tglawal");
            $tglakhir = $this->request->getPost("tglakhir");
            $db = \Config\Database::connect();
            $gasken = $db->query("SELECT * FROM sewa INNER JOIN pengguna ON sewa.id_pengguna=pengguna.id_pengguna  WHERE tglkembali BETWEEN '$tglawal' AND '$tglakhir'");
            $result = $gasken->getResult();
            return view('utama/counter', ['result' => $result, 'tglawal' => $tglawal, 'tglakhir' => $tglakhir]);
        }
        echo view("utama/laporan");
    }

    public function pengembalian()
    {
        $transaksiModel = new \App\Models\SewaModel();
        $transaksi = $transaksiModel->where('status', 'Diterima')->findAll();
        if (session()->has('user')) {
            $session = session();
            $session->destroy();
            return redirect()->to(site_url('admin/login'));
        }
        if (!session()->has('admin')) {
            return redirect()->to(site_url('admin/login'));
        }
        $db = \Config\Database::connect();
        $cari = $db->query("SELECT * FROM sewa INNER JOIN pengguna ON sewa.id_pengguna = pengguna.id_pengguna where sewa.status ='Diterima'");
        $transaksi = $cari->getResult();
        return view('utama/pengembalian', ['transaksi' => $transaksi]);
    }
    public function kembalikan()
    {
        $id_admin = session()->get('id_admin');
        $id = $this->request->uri->getSegment(3);
        $id2 = $this->request->uri->getSegment(4);
        $id3 = $this->request->uri->getSegment(5);
        $transaksiModel = new \App\Models\SewaModel();
        $motorModel = new \App\Models\MotorModel();
        $penggunaModel = new \App\Models\UserModel();
        $transaksi = $transaksiModel->find($id);
        $pengguna = $penggunaModel->find($id3);

        if ($this->request->getPost()) {
            $data = $this->request->getPost();
            $update = [
                'denda' => $data["denda"],
                'keterangan' => $data["keterangan"],
                'id_admin' => $id_admin
            ];
            $update3 = [
                'status' => "Tersedia"
            ];
            $motorModel->update($id2, $update3);
            $transaksiModel->update($id, $update);

            return redirect()->to(site_url('admin/pengembalian'));
        }
        return view('utama/formpengembalian', ['transaksi' => $transaksi, 'pengguna' => $pengguna]);
    }
}
