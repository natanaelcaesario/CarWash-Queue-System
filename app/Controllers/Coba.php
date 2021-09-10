<?php

namespace App\Controllers;

use App\ThirdParty\midtrans;


class Coba extends BaseController
{
    public function index()
    {
        $service = \Config\Services::Midtrans();
        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => 10000,
            ),
            'customer_details' => array(
                'first_name' => 'budi',
                'last_name' => 'pratama',
                'email' => 'budi.pra@example.com',
                'phone' => '08111222333',
            ),
        );
        $snapToken = $service->getSnapToken($params)->token;
        $data = [
            'snapToken' => $snapToken,
        ];
        // berhasil integrasi midtrans
        return view('coba', $data);
    }
}
