<?php

namespace App\Controllers;

use App\Models\CasosModel;
use App\Models\UsuarioModel;
use CodeIgniter\RESTful\ResourceController;

class Usuarios extends ResourceController
{

	protected $format    = 'json';

	public function __construct()
	{
		$this->modelName = new UsuarioModel();
	}

	public function index()
	{

		$token = $this->request->getServer('HTTP_X_TOKEN');
		if(empty($token)){
		   return $this->respond('error', 404);
		   exit;
		}

		
		$data = $this->model->listatardatos();
		foreach ($data['data'] as $fila) {
			unset($fila['pas_usu']);
			$arreglo[] = $fila;
		}
		$data['data'] = $arreglo;
		return $this->respond($data, 200);
	}

	public function show($id = null)
	{
		$casosM = new CasosModel();
		$data['asignaciones'] = $casosM->where('cod_usu_cas', $id)->findAll();
		$data['user'] = $this->model->listatardatos($id);
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