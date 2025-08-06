<?php

namespace App\Controllers;

use App\Models\ApiparametrosModel;
use CodeIgniter\RESTful\ResourceController;

class Apiparametros extends ResourceController
{

	protected $format    = 'json';

	public function __construct()
	{
		$this->modelName = new ApiparametrosModel();
	}

	public function index()
	{
		$data = $this->model->listatardatos();
		return $this->respond($data, 200);
	}

	public function show($id = null)
	{
		$data['parametros'] = $this->model->listatardatos($id);
		return $this->respond(array('data' => $data), 200);
	}


	public function create()
	{

		$resp = $this->model->guardar($this->request);
		$info = $this->model->listatardatos($resp);
		$data['resp'] = [
			'codigo' => $resp,
			'status' => 'Ok',
			'info' => $info
		];
		return $this->respond($data, 200);
	}


	public function delete($id = null)
	{
		$resp = $this->model->borrar($id);
		$data['resp'] = [
			'codigo' => $resp,
			'status' => 'Ok'
		];
		return $this->respond($data, 200);
	}
}