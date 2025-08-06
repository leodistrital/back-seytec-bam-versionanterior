<?php

namespace App\Models;

use CodeIgniter\Model;

class ComiteevaluadorApiModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'comiteevaluador';
	protected $primaryKey           = 'cod_coe';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = true;
	protected $protectFields        = true;
	protected $allowedFields        = ["cod_cat_coe", "nom_coe", "pai_coe", "per_coe", "per_coe_ing", "ord_coe", "img_coe"];

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
		$array = ["cod_coe as id", "cod_cat_coe", "nom_coe", "pai_coe", "per_coe", "per_coe_ing", "ord_coe", "img_coe", "concat(nom_cat, ' ', ano_edi) as categoraia"];
		if ($id == 0) {
			$data = $this->select($array)->join('categorias', 'cod_cat_coe=cod_cat', 'left')->join('ediciones', 'edi_cat=cod_edi', 'left')->orderby('nom_cat, ord_coe')->findAll();
		} else {
			$data = $this->select($array)->join('categorias', 'cod_cat_coe=cod_cat', 'left')->join('ediciones', ' edi_cat=cod_edi ')->orderby('nom_cat, ord_coe', 'left')->find($id);
		}
		return $data;
	}

	public function guardar($request)
	{

		$data = [
			'cod_cat_coe' => $request->getVar('cod_cat_coe'), 'nom_coe' => $request->getVar('nom_coe'), 'pai_coe' => $request->getVar('pai_coe'), 'per_coe' => $request->getVar('per_coe'), 'per_coe_ing' => $request->getVar('per_coe_ing'), 'ord_coe' => $request->getVar('ord_coe'), 'img_coe' => $request->getVar('img_coe')

		];
		$id = $this->insert($data);
		return $id;
	}

	public function edicion($id, $request)
	{
		$data = [
			'cod_coe' => $id,
			'cod_cat_coe' => $request->getVar('cod_cat_coe'), 'nom_coe' => $request->getVar('nom_coe'), 'pai_coe' => $request->getVar('pai_coe'), 'per_coe' => $request->getVar('per_coe'), 'per_coe_ing' => $request->getVar('per_coe_ing'), 'ord_coe' => $request->getVar('ord_coe'), 'img_coe' => $request->getVar('img_coe')

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
		$array = ["cod_cat_coe", "nom_coe", "pai_coe", "per_coe", "per_coe_ing", "ord_coe", "img_coe"];
		$data = $this->select($array)->findAll();
		return $data;
	}
}
/* fecha de creacion: 12-11-2022 11:58:26 pm */