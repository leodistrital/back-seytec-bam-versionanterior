<?php

namespace App\Models;

use CodeIgniter\Model;


class PlnatillaModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'plantilla';
	protected $primaryKey           = 'cod_pla';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = true;
	protected $protectFields        = true;
	protected $allowedFields        = ['nom_pla', 'fac_pla'];

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

		$array = ['cod_pla as id', 'nom_pla  nombre' , 'fac_pla as factor'   ];
		
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
			'nom_pla' => $request->getVar('nombre'),
			'fac_pla' => $request->getVar('factor')
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
			'cod_pla' => $id,
			'nom_pla' => $request->getVar('nombre'),
			'fac_pla' => $request->getVar('factor')
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