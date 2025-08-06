<?php

namespace App\Controllers\Admin;

use App\Models\SitioModel;
use App\Controllers\MyApiRest;

class Recursos extends  MyApiRest
{
	protected $format    = 'json';

	public function __construct()
	{
		$this->modelName = new SitioModel();
	}

	public function index()
	{
		// $token = $this->request->getServer('HTTP_X_TOKEN');
		// if(empty($token)){
		//    return $this->respond('error', 404);
		//    exit;
		// }


		// $data = $this->model->listatardatos();
		// return $this->respond($data, 200);
		echo "recursos";
	}


	public function show($id = null)
	{
		$data = $this->model->listatardatos($id);
		return $this->respond(array('data' => $data), 200);
	}

	public function create()
	{
		$file = $this->request->getFile('imagen');
		// helper('number');
		$newName = $file->getRandomName();
		// $data = $newName;
		$data['name'] = $newName;
		// $data['size'] = number_to_size($file->getSizeByUnit('kb'));
		// $data['type'] = $file->getMimeType();
		// $data['ext'] = $file->guessExtension();
		// $data['url'] = env('app.baseURL') . env('app.assests') . $newName;
		$file->move('assets/images', $newName);
		return $this->respond($data, 200);
	}


	public function update($id = null)
	{
		$resp = $this->model->edicion($id, $this->request);
		return $this->respond($resp, 200);
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
