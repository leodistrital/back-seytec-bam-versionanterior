<?php

namespace App\Models;

use CodeIgniter\Model;

class EnlacesModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'enlaces';
	protected $primaryKey           = 'con_enl';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = true;
	protected $protectFields        = true;
	protected $allowedFields        = ['nom_enl_esp', 'nom_enl_ing' , 'url_enl', 'ord_enl', 'tip_enl' , 'cod_men_enl'];

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

		$array = ['con_enl', 'nom_enl_esp', 'nom_enl_ing' , 'url_enl', 'ord_enl', 'tip_enl' , 'cod_men_enl'];
		
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
			'cod_ite' => $id,
			'nom_ite' => $request->getVar('nombre'),
			'des_ite' => $request->getVar('descripcion'),
			'cod_uni_ite' => $request->getVar('unidad'),
			'pre_ite' => $request->getVar('precio'),
			'fac_ite' => $request->getVar('factor'),
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