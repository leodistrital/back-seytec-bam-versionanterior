<?php

namespace App\Models;

use CodeIgniter\Model;

class PrensaApiModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'prensa';
	protected $primaryKey           = 'cod_pre';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = true;
	protected $protectFields        = true;
	protected $allowedFields        = ["tip_pre", "lin_pre", "tit_pre", "sti_pre", "des_pre", "tit_pre_ing", "sti_pre_ing", "des_pre_ing", "fec_pre"];

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
		$array = ['cod_pre as id', "tip_pre", "lin_pre", "tit_pre", "sti_pre", "des_pre", "tit_pre_ing", "sti_pre_ing", "des_pre_ing", "fec_pre"];
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
			'tip_pre' => $request->getVar('tip_pre'), 'lin_pre' => $request->getVar('lin_pre'), 'tit_pre' => $request->getVar('tit_pre'), 'sti_pre' => $request->getVar('sti_pre'), 'des_pre' => $request->getVar('des_pre'), 'tit_pre_ing' => $request->getVar('tit_pre_ing'), 'sti_pre_ing' => $request->getVar('sti_pre_ing'), 'des_pre_ing' => $request->getVar('des_pre_ing'), 'fec_pre' => $request->getVar('fec_pre')

		];
		$id = $this->insert($data);
		return $id;
	}

	public function edicion($id, $request)
	{
		$data = [
			'cod_pre' => $id,
			'tip_pre' => $request->getVar('tip_pre'), 'lin_pre' => $request->getVar('lin_pre'), 'tit_pre' => $request->getVar('tit_pre'), 'sti_pre' => $request->getVar('sti_pre'), 'des_pre' => $request->getVar('des_pre'), 'tit_pre_ing' => $request->getVar('tit_pre_ing'), 'sti_pre_ing' => $request->getVar('sti_pre_ing'), 'des_pre_ing' => $request->getVar('des_pre_ing'), 'fec_pre' => $request->getVar('fec_pre')

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
		$array = ["tip_pre", "lin_pre", "tit_pre", "sti_pre", "des_pre", "tit_pre_ing", "sti_pre_ing", "des_pre_ing", "fec_pre"];
		$data = $this->select($array)->findAll();
		return $data;
	}
}
/* fecha de creacion: 12-12-2022 01:48:26 pm */