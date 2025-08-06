<?php

namespace App\Controllers;

use App\Models\CasosModel;
use App\Models\CategoriasModel;
use App\Models\ProcesosModel;
use App\Models\UsuarioModel;
use CodeIgniter\RESTful\ResourceController;


class Casos extends ResourceController
{
	protected $format    = 'json';

	public function __construct()
	{
		$this->modelName = new CasosModel();
	}

	public function index()
	{

		$token = $this->request->getServer('HTTP_X_TOKEN');
		if (empty($token)) {
			return $this->respond('error', 404);
			exit;
		}



		$data = $this->model->listatardatos();
		return $this->respond($data, 200);
	}



	public function show($id = null)
	{

		$data = $this->model->listatardatos($id);
		$usuariosM = new  UsuarioModel();
		$procesosM = new ProcesosModel();
		$categoriasM = new CategoriasModel();
		$data['data']['usuarios'] = $usuariosM->listatardatos();
		$data['data']['procesos'] = $procesosM->listatardatos();
		$data['data']['categorias'] = $categoriasM->listatardatos();
		return $this->respond($data, 200);
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
