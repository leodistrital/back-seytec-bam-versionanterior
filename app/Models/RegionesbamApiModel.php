<?php
namespace App\Models;
use CodeIgniter\Model;

class RegionesbamApiModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'regionesbam';
	protected $primaryKey           = 'cod_reg';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = true;
	protected $protectFields        = true;
	protected $allowedFields        = ["slu_reg","nom_reg","fec_reg","dat_reg","ord_reg","tit_reg","sit_reg","des_reg","acr_reg","ade_reg","apd_reg","ter_reg","tpd_reg","log_reg","tit_reg_ing","sit_reg_ing","des_reg_ing","gal_reg","ter_reg_ing"];

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
		$array =
		["cod_reg as id","slu_reg","nom_reg","fec_reg","dat_reg","ord_reg","tit_reg","sit_reg","des_reg","acr_reg","ade_reg","apd_reg","ter_reg","tpd_reg","log_reg","tit_reg_ing","sit_reg_ing","des_reg_ing","gal_reg","ter_reg_ing"];
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
			'slu_reg' => mb_url_title($request->getVar('nom_reg'))
,'nom_reg' => $request->getVar('nom_reg')
,'fec_reg' => $request->getVar('fec_reg')
,'dat_reg' => $request->getVar('dat_reg')
,'ord_reg' => $request->getVar('ord_reg')
,'tit_reg' => $request->getVar('tit_reg')
,'sit_reg' => $request->getVar('sit_reg')
,'des_reg' => $request->getVar('des_reg')
,'acr_reg' => $request->getVar('acr_reg')
,'ade_reg' => $request->getVar('ade_reg')
,'apd_reg' => $request->getVar('apd_reg')
,'ter_reg' => $request->getVar('ter_reg')
,'tpd_reg' => $request->getVar('tpd_reg')
,'log_reg' => $request->getVar('log_reg')
,'tit_reg_ing' => $request->getVar('tit_reg_ing')
,'sit_reg_ing' => $request->getVar('sit_reg_ing')
,'des_reg_ing' => $request->getVar('des_reg_ing')
,'gal_reg' => $request->getVar('gal_reg')
,'ter_reg_ing' => $request->getVar('ter_reg_ing')

		];
		$id = $this->insert($data);
		return $id;
	}

	public function edicion($id, $request)
	{
		$data = [
			'cod_reg' => $id,
			'slu_reg' => mb_url_title($request->getVar('nom_reg'))
,'nom_reg' => $request->getVar('nom_reg')
,'fec_reg' => $request->getVar('fec_reg')
,'dat_reg' => $request->getVar('dat_reg')
,'ord_reg' => $request->getVar('ord_reg')
,'tit_reg' => $request->getVar('tit_reg')
,'sit_reg' => $request->getVar('sit_reg')
,'des_reg' => $request->getVar('des_reg')
,'acr_reg' => $request->getVar('acr_reg')
,'ade_reg' => $request->getVar('ade_reg')
,'apd_reg' => $request->getVar('apd_reg')
,'ter_reg' => $request->getVar('ter_reg')
,'tpd_reg' => $request->getVar('tpd_reg')
,'log_reg' => $request->getVar('log_reg')
,'tit_reg_ing' => $request->getVar('tit_reg_ing')
,'sit_reg_ing' => $request->getVar('sit_reg_ing')
,'des_reg_ing' => $request->getVar('des_reg_ing')
,'gal_reg' => $request->getVar('gal_reg')
,'ter_reg_ing' => $request->getVar('ter_reg_ing')

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
		$array = ["cod_reg as value","nom_reg as name"];
		$data = $this->select($array)->findAll();
		return $data;
	}
}
/* fecha de creacion: 01-16-2023 01:26:08 pm */