<?php

namespace App\Models;

use CodeIgniter\Model;

class EdicionesApiModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'ediciones';
	protected $primaryKey           = 'cod_edi';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = true;
	protected $protectFields        = true;
	protected $allowedFields        = ["ano_edi", "tit_edi", "des_edi", "tit_edi_ing", "des_edi_ing", "act_edi", "sti_edi", "sti_edi_ing", "img_edi", "pro_edi", "gal_edi", "ad1_edi", "ad2_edi", "ad3_edi", "ad4_edi", "ad5_edi", "im1_edi", "im2_edi", "im3_edi", "im4_edi", "im5_edi"];

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
		$array = ["cod_edi as id", "ano_edi", "tit_edi", "des_edi", "tit_edi_ing", "des_edi_ing", "act_edi", "sti_edi",
		"sti_edi_ing", "img_edi", "pro_edi", "gal_edi", "ad1_edi", "ad2_edi", "ad3_edi", "ad4_edi", "ad5_edi", "im1_edi",
		"im2_edi", "im3_edi", "im4_edi", "im5_edi"];
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
			'ano_edi' => $request->getVar('ano_edi'), 'tit_edi' => $request->getVar('tit_edi'), 'des_edi' => $request->getVar('des_edi'), 'tit_edi_ing' => $request->getVar('tit_edi_ing'), 'des_edi_ing' => $request->getVar('des_edi_ing'), 'act_edi' => $request->getVar('act_edi'), 'sti_edi' => $request->getVar('sti_edi'), 'sti_edi_ing' => $request->getVar('sti_edi_ing'), 'img_edi' => $request->getVar('img_edi'), 'pro_edi' => $request->getVar('pro_edi'), 'gal_edi' => $request->getVar('gal_edi'), 'ad1_edi' => $request->getVar('ad1_edi'), 'ad2_edi' => $request->getVar('ad2_edi'), 'ad3_edi' => $request->getVar('ad3_edi'), 'ad4_edi' => $request->getVar('ad4_edi'), 'ad5_edi' => $request->getVar('ad5_edi'), 'im1_edi' => $request->getVar('im1_edi'), 'im2_edi' => $request->getVar('im2_edi'), 'im3_edi' => $request->getVar('im3_edi'), 'im4_edi' => $request->getVar('im4_edi'), 'im5_edi' => $request->getVar('im5_edi')

		];
		$id = $this->insert($data);
		return $id;
	}

	public function edicion($id, $request)
	{
		$data = [
			'cod_edi' => $id,
			'ano_edi' => $request->getVar('ano_edi'), 'tit_edi' => $request->getVar('tit_edi'), 'des_edi' => $request->getVar('des_edi'), 'tit_edi_ing' => $request->getVar('tit_edi_ing'), 'des_edi_ing' => $request->getVar('des_edi_ing'), 'act_edi' => $request->getVar('act_edi'), 'sti_edi' => $request->getVar('sti_edi'), 'sti_edi_ing' => $request->getVar('sti_edi_ing'), 'img_edi' => $request->getVar('img_edi'), 'pro_edi' => $request->getVar('pro_edi'), 'gal_edi' => $request->getVar('gal_edi'), 'ad1_edi' => $request->getVar('ad1_edi'), 'ad2_edi' => $request->getVar('ad2_edi'), 'ad3_edi' => $request->getVar('ad3_edi'), 'ad4_edi' => $request->getVar('ad4_edi'), 'ad5_edi' => $request->getVar('ad5_edi'), 'im1_edi' => $request->getVar('im1_edi'), 'im2_edi' => $request->getVar('im2_edi'), 'im3_edi' => $request->getVar('im3_edi'), 'im4_edi' => $request->getVar('im4_edi'), 'im5_edi' => $request->getVar('im5_edi')

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
		$array = ["cod_edi as value", "ano_edi as name"];
		$data = $this->select($array)->orderBy('ano_edi', 'desc')->findAll();
		return $data;
	}
}
/* fecha de creacion: 01-10-2023 02:14:01 pm */