<?php

namespace App\Models;

use CodeIgniter\Model;

class BannersApiModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'banners';
	protected $primaryKey           = 'cod_ban';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = true;
	protected $protectFields        = true;
	protected $allowedFields        = ["tip_ban", "nom_ban", "img_ban", "txt_ban", 'txt_ban_ing', "ord_ban",  "lin_bam"];

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
		$array = ["cod_ban as id", "tip_ban", "nom_ban", "img_ban", "txt_ban", 'txt_ban_ing', "ord_ban", "lin_bam"];
		if ($id == 0) {
			$data = $this->select($array)->findAll();
		} else {
			$data = $this->select($array)->find($id);
		}
		return $data;
	}


	public function guardar($request)
	{
		// exit;
		$data = [
			'tip_ban' => $request->getVar('tip_ban'),
			'nom_ban' => $request->getVar('nom_ban'),
			'img_ban' => $request->getVar('img_ban'),
			'txt_ban' => $request->getVar('txt_ban'),
			'txt_ban_ing' => $request->getVar('txt_ban_ing'),
			'ord_ban' => $request->getVar('ord_ban'),
			'lin_bam' => $request->getVar('lin_bam')

		];


		$id = $this->insert($data);
		return $id;
	}

	public function edicion($id, $request)
	{
		$data = [
			'cod_ban' => $id,
			'tip_ban' => $request->getVar('tip_ban'),
			'nom_ban' => $request->getVar('nom_ban'),
			'img_ban' => $request->getVar('img_ban'),
			'txt_ban' => $request->getVar('txt_ban'),
			'txt_ban_ing' => $request->getVar('txt_ban_ing'),
			'ord_ban' => $request->getVar('ord_ban'),
			'lin_bam' => $request->getVar('lin_bam')

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
		$array = ["tip_ban", "img_ban", "txt_ban", "ord_ban"];
		$data = $this->select($array)->findAll();
		return $data;
	}

	public function grupoBanner($grupo)
	{
		$array = ["cod_ban as id", "tip_ban", "nom_ban", "img_ban", "txt_ban", 'txt_ban_ing', "ord_ban", "lin_bam"];
		$data = $this->select($array)->where('tip_ban', $grupo)->orderBy('ord_ban')->findAll();
		return $data;
	}
}
/* fecha de creacion: 11-12-2022 10:44:38 am */