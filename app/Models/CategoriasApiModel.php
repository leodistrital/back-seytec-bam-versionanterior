<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoriasApiModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'categorias';
	protected $primaryKey           = 'cod_cat';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = true;
	protected $protectFields        = true;
	protected $allowedFields        = ["edi_cat", "nom_cat", "tit_cat", "des_cat", "ord_cat", "eva_cat", "slu_cat", "tit_cat_ing", "des_cat_ing"];

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
		$array = ['cod_cat as id', "edi_cat", "nom_cat", "tit_cat", "des_cat", "ord_cat", "eva_cat", "slu_cat", "tit_cat_ing", "des_cat_ing", "ano_edi as edicion"];
		if ($id == 0) {
			$data = $this->select($array)->join('ediciones', 'edi_cat=cod_edi', 'left')->orderby('edi_cat, ord_cat')->findAll();
		} else {
			$data = $this->select($array)->join('ediciones', 'edi_cat=cod_edi', 'left')->find($id);
		}
		return $data;
	}

	public function guardar($request)
	{

		$data = [
			'edi_cat' => $request->getVar('edi_cat'), 'nom_cat' => $request->getVar('nom_cat'), 'tit_cat' => $request->getVar('tit_cat'), 'des_cat' => $request->getVar('des_cat'), 'ord_cat' => $request->getVar('ord_cat'), 'eva_cat' => $request->getVar('eva_cat'), 'slu_cat' => $request->getVar('slu_cat'), 'tit_cat_ing' => $request->getVar('tit_cat_ing'), 'des_cat_ing' => $request->getVar('des_cat_ing')

		];
		$id = $this->insert($data);
		return $id;
	}

	public function edicion($id, $request)
	{
		$data = [
			'cod_cat' => $id,
			'edi_cat' => $request->getVar('edi_cat'), 'nom_cat' => $request->getVar('nom_cat'), 'tit_cat' => $request->getVar('tit_cat'), 'des_cat' => $request->getVar('des_cat'), 'ord_cat' => $request->getVar('ord_cat'), 'eva_cat' => $request->getVar('eva_cat'), 'slu_cat' => $request->getVar('slu_cat'), 'tit_cat_ing' => $request->getVar('tit_cat_ing'), 'des_cat_ing' => $request->getVar('des_cat_ing')

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
		$array = ["cod_cat as value", "concat(nom_cat , ' ', ano_edi) as name"];
		$data = $this->select($array)->join('ediciones', 'edi_cat=cod_edi', 'left')->orderby('edi_cat, nom_cat')->findAll();
		return $data;
	}
}
/* fecha de creacion: 12-11-2022 08:11:38 pm */