<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Acr_registoApiModel;
use CodeIgniter\API\ResponseTrait;
use Firebase\JWT\JWT;


// use vendor\Firebase\JWT\JWT;

class Verificar extends BaseController
{
	use ResponseTrait;

	public function index($parametro)
	{
		$userModel = new Acr_registoApiModel();
		// echo $parametro;
		$email = $this->request->getVar('emails');
		$recapcha = $this->request->getVar('recapcha');

		if ($this->verifyCapcha($recapcha)) {
			$arrayWhere = ['mai_reg' => $email ,'act_req' => '1'];
			$users = $userModel->select('mai_reg')->where($arrayWhere)->find();
			// echo $userModel->getLastQuery();
			if (count($users) > 0) {
				return json_encode(false);
			}
		}
		return json_encode(true);
	}


	public function verifyCapcha($capcha)
	{
		$url = 'https://www.google.com/recaptcha/api/siteverify';
		$keysecret = '6Ld8zdclAAAAAGdsNq6R1-fXuB4ysq0LVa4gIwkR';
		$request = file_get_contents($url . '?secret=' . $keysecret . '&response=' . $capcha);
		$response = json_decode($request);
		if ($response->success == true  && $response->score > 0.6) {
			return true;
		}
		return false;
	}
}