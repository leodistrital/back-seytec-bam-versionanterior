<?php

namespace App\Models;

use CodeIgniter\Model;


class DominiosModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'dominios';
	protected $primaryKey           = 'cod_dom';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = true;
	protected $protectFields        = true;
	protected $allowedFields        = ['nom_dom',  'act_dom'];

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
			$data = $this->find($id);
		}

		return $data;
	}

	public function guardar($request)
	{

		$data = [
			'nom_dom' => $request->getVar('dominio'),
			'tim_par' => $request->getVar('activo'),
		];

		$codigo  = $request->getVar('codigo');

		if ($codigo == 0) {
			$id = $this->insert($data);
		}
		if ($codigo > 0) {
			$id = $this->edicion($codigo, $data);
		}
		return $id;
		// return '1';
	}

	public function edicion($id, $data)
	{
		$confirmacion = $this->update($id, $data);
		if ($confirmacion == 1) {
			return $id;
		}
	}

	public function borrar($id)
	{
		$id = $this->delete($id);
		return $id;
	}
}