<?php

namespace App\Models;

use CodeIgniter\Model;

class SliderModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'sliders';
	protected $primaryKey           = 'cod_sli';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = true;
	protected $protectFields        = true;
	protected $allowedFields        = ['nom_sli', 'img_sli_esp', 'img_sli_ing', 'tex_sli_esp', 'tex_sli_ing', 'ord_sli', 'tip_sli'];

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

		$array = ['cod_sli as id', 'nom_sli', 'img_sli_esp', 'img_sli_ing', 'tex_sli_esp', 'tex_sli_ing', 'ord_sli', 'tip_sli'];

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
			'nom_sli' => $request->getVar('nom_sli'),
			'img_sli_esp' => $request->getVar('img_sli_esp'),
			'img_sli_ing' => $request->getVar('img_sli_ing'),
			'tex_sli_esp' => $request->getVar('tex_sli_esp'),
			'tex_sli_ing' => $request->getVar('tex_sli_ing'),
			'ord_sli' => $request->getVar('ord_sli'),
			'tip_sli' => $request->getVar('tip_sli'),
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
			'cod_sli' => $id,
			'nom_sli' => $request->getVar('nom_sli'),
			'img_sli_esp' => $request->getVar('img_sli_esp'),
			'img_sli_ing' => $request->getVar('img_sli_ing'),
			'tex_sli_esp' => $request->getVar('tex_sli_esp'),
			'tex_sli_ing' => $request->getVar('tex_sli_ing'),
			'ord_sli' => $request->getVar('ord_sli'),
			'tip_sli' => $request->getVar('tip_sli'),
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
