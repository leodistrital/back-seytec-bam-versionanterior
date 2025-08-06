<?php

namespace App\Models;

use CodeIgniter\Model;

class CifrasApiModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'cifras';
	protected $primaryKey           = 'cod_cif';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = true;
	protected $protectFields        = true;
	protected $allowedFields        = ["tit_cif", "tit_cif_ing", "dat_cif", "ord_cif", "tip_cif"];

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

	public function leoconstruct()
	{
	}

	public function listatardatos($id = 0)
	{

		// mb_url_title('la calle DE la sirenañññ989.   * % & ó', '-', true);
		$array = ["cod_cif as id",  "tit_cif", "tit_cif_ing", "dat_cif", "ord_cif", "tip_cif"];
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
			'tit_cif' => $request->getVar('tit_cif'), 'tit_cif_ing' => $request->getVar('tit_cif_ing'), 'dat_cif' => $request->getVar('dat_cif'), 'ord_cif' => $request->getVar('ord_cif'), 'tip_cif' => $request->getVar('tip_cif')

		];
		$id = $this->insert($data);
		return $id;
	}

	public function edicion($id, $request)
	{
		$data = [
			'cod_cif' => $id,
			'tit_cif' => $request->getVar('tit_cif'), 'tit_cif_ing' => $request->getVar('tit_cif_ing'), 'dat_cif' => $request->getVar('dat_cif'), 'ord_cif' => $request->getVar('ord_cif'), 'tip_cif' => $request->getVar('tip_cif')

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
		$array = ["tit_cif", "tit_cif_ing", "dat_cif", "ord_cif", "tip_cif"];
		$data = $this->select($array)->findAll();
		return $data;
	}
}
/* fecha de creacion: 11-12-2022 10:45:41 am */