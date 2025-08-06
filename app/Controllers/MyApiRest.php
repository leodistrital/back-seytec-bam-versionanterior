<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class MyApiRest extends ResourceController
{
	public function genericResponse($data, $code = 200, $msj = '')
	{
		if ($code == 200) {
			$respuesta = array('data' => $data, 'codigo' => $code);
			return $this->respond($respuesta);
		} else {
			$respuesta = array('mjs' => $msj, 'codigo' => $code);
			return $this->respond($respuesta);
		}
	}
}