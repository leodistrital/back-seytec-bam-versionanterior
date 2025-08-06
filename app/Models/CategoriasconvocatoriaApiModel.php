<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoriasconvocatoriaApiModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'categoriasconvocatoria';
	protected $primaryKey           = 'cod_cac';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = true;
	protected $protectFields        = true;
	protected $allowedFields        = ["nom_cac", "tit_cac", "des_cac", "img_cac", "ad1_cac", "ad2_cac", "ord_cac", "slu_cac", "fon_cac", "tit_cac_ing", "des_cac_ing", 'col_cac'];

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
		$array = ['cod_cac as id', "nom_cac", "tit_cac", "des_cac", "img_cac", "ad1_cac", "ad2_cac", "ord_cac", "slu_cac", "fon_cac", "tit_cac_ing", "des_cac_ing", 'col_cac'];
		if ($id == 0) {
			$data = $this->select($array)->findAll();
		} else {
			$data = $this->select($array)->find($id);
		}
		return $data;
	}

	public function guardar($request)
	{

		// var_dump($request);
		// return '';
		$data = [
			'nom_cac' => $request->getVar('nom_cac'), 'tit_cac' => $request->getVar('tit_cac'), 'des_cac' => $request->getVar('des_cac'), 'img_cac' => $request->getVar('img_cac'), 'ad1_cac' => $request->getVar('ad1_cac'), 'ad2_cac' => $request->getVar('ad2_cac'), 'ord_cac' => $request->getVar('ord_cac'), 'slu_cac' => mb_url_title($request->getVar('nom_cac'), '', true), 'fon_cac' => $request->getVar('fon_cac'), 'tit_cac_ing' => $request->getVar('tit_cac_ing'), 'des_cac_ing' => $request->getVar('des_cac_ing'), 'col_cac' => $request->getVar('col_cac')

		];
		$id = $this->insert($data);
		return $id;
	}

	public function edicion($id, $request)
	{
		$data = [
			'cod_cac' => $id,
			'nom_cac' => $request->getVar('nom_cac'), 'tit_cac' => $request->getVar('tit_cac'), 'des_cac' => $request->getVar('des_cac'), 'img_cac' => $request->getVar('img_cac'), 'ad1_cac' => $request->getVar('ad1_cac'), 'ad2_cac' => $request->getVar('ad2_cac'), 'ord_cac' => $request->getVar('ord_cac'), 'slu_cac' => mb_url_title($request->getVar('nom_cac'), '', true), 'fon_cac' => $request->getVar('fon_cac'), 'tit_cac_ing' => $request->getVar('tit_cac_ing'), 'des_cac_ing' => $request->getVar('des_cac_ing'), 'col_cac' => $request->getVar('col_cac')

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

	public function parametros()
	{
		$array = ["nom_cac as name" ,"cod_cac as value"];
		$data = $this->select($array)->findAll();
		return $data;
	}
}
/* fecha de creacion: 12-11-2022 05:12:20 pm */