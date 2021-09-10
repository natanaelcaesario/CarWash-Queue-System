<?php namespace App\Database\Seeds;

class SewaSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();
        for ($hallo = 0; $hallo < 500; $hallo++) {
            $data = [
                'motor' => $faker->name,
                'nama' => $faker->name,
                'lokasi_jemput' => $faker->streetAddress,
                'nomorhandphone' => $faker->phoneNumber,
                'tglsewa' => date("Y-m-d H:i:s"),
                'tglkembali' => date("Y-m-d H:i:s"),
                'kode_booking' => $faker->bankAccountNumber,
                'plat_motor' => $faker->bankAccountNumber,
                'status' => "Diterima",
                'bukti_bayar' => $faker->bankAccountNumber,
                'bank' => $faker->bankAccountNumber,
                'harga' => $faker->randomNumber(2),
            ];

            // Simple Queries
            // $this->db->query("INSERT INTO users (username, email) VALUES(:username:, :email:)",
            //     $data
            // );

            // Using Query Builder
            $this->db->table('sewa')->insert($data);
        }
    }

}
