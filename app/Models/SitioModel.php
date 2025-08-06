<?php

namespace App\Models;

use CodeIgniter\Model;

class SitioModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'sitio';
	protected $primaryKey           = 'cod_sit';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = false;
	protected $protectFields        = true;
	protected $allowedFields        = ['fac_sit', 'twt_sit', 'lla_sit', 'mai_sit', 'dir_sit', 'ciu_sit', 'log_sit', 'nom_sit'];

	// Dates
	protected $useTimestamps        = false;
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

		$array = ['cod_sit as id', 'fac_sit', 'twt_sit', 'lla_sit', 'mai_sit', 'dir_sit', 'ciu_sit', 'log_sit', 'nom_sit'];

		if ($id == 0) {
			$data = $this->select($array)->findAll();
		} else {
			$data = $this->select($array)->find($id);
		}

		return $data;
	}

	public function guardar($request)
	{
		$data = [
			'nom_ite' => $request->getVar('nombre'),
			'des_ite' => $request->getVar('descripcion'),
			'cod_uni_ite' => $request->getVar('unidad'),
			'fac_ite' => $request->getVar('factor'),
			'pre_ite' => $request->getVar('precio'),

		];

		$codigo  = $request->getVar('codigo');

		if ($codigo == 0) {
			$id = $this->insert($data);
		}
		if ($codigo > 0) {
			$id = $this->edicion($codigo, $data);
		}
		return $id;
	}

	public function edicion($id, $request)
	{
		$data = [
			'cod_sit' => $id,
			'fac_sit' => $request->getVar('fac_sit'),
			'twt_sit' => $request->getVar('twt_sit'),
			'lla_sit' => $request->getVar('lla_sit'),
			'mai_sit' => $request->getVar('mai_sit'),
			'dir_sit' => $request->getVar('dir_sit'),
			'ciu_sit' => $request->getVar('ciu_sit'),
			'log_sit' => $request->getVar('log_sit'),
			'nom_sit' => $request->getVar('nom_sit'),
		];



		$confirmacion = $this->save($data);

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
