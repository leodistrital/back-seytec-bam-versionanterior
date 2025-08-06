<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\TestModel;

class Test extends ResourceController
{

	protected $format    = 'json';


	public function __construct()
	{
		$this->modelName = new TestModel();
	}

	/**
	 * Return an array of resource objects, themselves in array format
	 *
	 * @return mixed
	 */
	public function index()
	{
		$data = $this->model->listatardatos();
		return $this->respond($data, 200);
	}

	/**
	 * Return the properties of a resource object
	 *  
	 * @return mixed
	 */
	public function show($id = null)
	{
		$data = $this->model->listatardatos($id);
		return $this->respond($data, 200);
	}

	/**
	 * Return a new resource object, with default properties
	 *
	 * @return mixed
	 */
	public function new()
	{
		//
	}

	/**
	 * Create a new resource object, from "posted" parameters
	 *
	 * @return mixed
	 */
	public function create()
	{
		$resp = $this->model->guardar($this->request);
		$data['data'] = [
			'codigo' => $resp
		];
		return $this->respond($data, 200);
	}

	/**
	 * Return the editable properties of a resource object
	 *
	 * @return mixed
	 */
	public function edit($id = null)
	{
	}

	/**
	 * Add or update a model resource, from "posted" properties
	 *
	 * @return mixed
	 */
	public function update($id = null)
	{

		$resp = $this->model->edicion($id, $this->request->getRawInput());
		return $this->respond($resp, 200);
	}

	/**
	 * Delete the designated resource object from the model
	 *
	 * @return mixed
	 */
	public function delete($id = null)
	{
		$resp = $this->model->borrar($id);
		return $this->respond($resp, 200);
	}
}