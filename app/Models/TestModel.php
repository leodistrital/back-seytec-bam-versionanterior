<?php

namespace App\Models;

use CodeIgniter\Model;

class TestModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'test';
	protected $primaryKey           = 'codigo';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = true;
	protected $protectFields        = true;
	protected $allowedFields        = ['nombre', 'archivo'];

	// Dates
	protected $useTimestamps        = true;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';
	protected $deletedField         = 'deleted_at';

	// Validation
	protected $validationRules      = [];
	protected $validationMessages   = [];
	protected $skipValidation       = false;
	protected $cleanValidationRules = true;

	// Callbacks
	protected $allowCallbacks       = true;
	protected $beforeInsert         = [];
	protected $afterInsert          = [];
	protected $beforeUpdate         = [];
	protected $afterUpdate          = [];
	protected $beforeFind           = [];
	protected $afterFind            = [];
	protected $beforeDelete         = [];
	protected $afterDelete          = [];


	public function listatardatos($id = 0)
	{
		if ($id == 0) {
			$data['data'] = $this->findAll();
		} else {
			$data['data'] = $this->find($id);
		}
		return $data;
	}

	public function guardar($request)
	{
		// var_dump($request->getVar('valor'));
		$data = [
			'nombre' => $request->getVar('valor1'),
			'archivo' => $request->getVar('valor2')

		];
		$id = $this->insert($data);
		return $id;
	}

	public function edicion($id, $request)
	{
		$data = [
			'nombre' => $request['valor1'],
			'archivo' => $request['valor2']
		];

		$id = $this->update($id, $data);
		return $id;
	}

	public function borrar($id)
	{
		$id = $this->delete($id);
		return $id;
	}
}