<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$pager = \Config\Services::pager();
		$motorModel = new \App\Models\MotorModel();
		$data = [
			'motor' => $motorModel->paginate(3, 'pagerku'),
			'pager' => $motorModel->pager,
		];


		return view('index', $data);
	}

	//--------------------------------------------------------------------

}
