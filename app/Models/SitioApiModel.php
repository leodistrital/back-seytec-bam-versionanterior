<?php
namespace App\Models;
use CodeIgniter\Model;

class SitioApiModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'sitio';
	protected $primaryKey           = 'cod_sit';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = true;
	protected $protectFields        = true;
	protected $allowedFields        = ["fac_sit","nom_sit","twt_sit","ins_sit","you_sit","lla_sit","mai_sit","dir_sit","tel_sit","con_sit","sel_sit","pro_sit","ley_sit","edi_sit","key_sit","ana_sit","vid_sit","acr_sit","reg_sit","his_reg"];

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
		["cod_sit as id","fac_sit","nom_sit","twt_sit","ins_sit","you_sit","lla_sit","mai_sit","dir_sit","tel_sit","con_sit","sel_sit","pro_sit","ley_sit","edi_sit","key_sit","ana_sit","vid_sit","acr_sit","reg_sit","his_reg"];
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
			'fac_sit' => $request->getVar('fac_sit')
,'nom_sit' => $request->getVar('nom_sit')
,'twt_sit' => $request->getVar('twt_sit')
,'ins_sit' => $request->getVar('ins_sit')
,'you_sit' => $request->getVar('you_sit')
,'lla_sit' => $request->getVar('lla_sit')
,'mai_sit' => $request->getVar('mai_sit')
,'dir_sit' => $request->getVar('dir_sit')
,'tel_sit' => $request->getVar('tel_sit')
,'con_sit' => $request->getVar('con_sit')
,'sel_sit' => $request->getVar('sel_sit')
,'pro_sit' => $request->getVar('pro_sit')
,'ley_sit' => $request->getVar('ley_sit')
,'edi_sit' => $request->getVar('edi_sit')
,'key_sit' => $request->getVar('key_sit')
,'ana_sit' => $request->getVar('ana_sit')
,'vid_sit' => $request->getVar('vid_sit')
,'acr_sit' => $request->getVar('acr_sit')
,'reg_sit' => $request->getVar('reg_sit')
,'his_reg' => $request->getVar('his_reg')

		];
		$id = $this->insert($data);
		return $id;
	}

	public function edicion($id, $request)
	{
		$data = [
			'cod_sit' => $id,
			'fac_sit' => $request->getVar('fac_sit')
,'nom_sit' => $request->getVar('nom_sit')
,'twt_sit' => $request->getVar('twt_sit')
,'ins_sit' => $request->getVar('ins_sit')
,'you_sit' => $request->getVar('you_sit')
,'lla_sit' => $request->getVar('lla_sit')
,'mai_sit' => $request->getVar('mai_sit')
,'dir_sit' => $request->getVar('dir_sit')
,'tel_sit' => $request->getVar('tel_sit')
,'con_sit' => $request->getVar('con_sit')
,'sel_sit' => $request->getVar('sel_sit')
,'pro_sit' => $request->getVar('pro_sit')
,'ley_sit' => $request->getVar('ley_sit')
,'edi_sit' => $request->getVar('edi_sit')
,'key_sit' => $request->getVar('key_sit')
,'ana_sit' => $request->getVar('ana_sit')
,'vid_sit' => $request->getVar('vid_sit')
,'acr_sit' => $request->getVar('acr_sit')
,'reg_sit' => $request->getVar('reg_sit')
,'his_reg' => $request->getVar('his_reg')

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
		$array = ["fac_sit","nom_sit","twt_sit","ins_sit","you_sit","lla_sit","mai_sit","dir_sit","tel_sit","con_sit","sel_sit","pro_sit","ley_sit","edi_sit","key_sit","ana_sit","vid_sit","acr_sit","reg_sit","his_reg"];
		$data = $this->select($array)->findAll();
		return $data;
	}
}
/* fecha de creacion: 01-05-2023 05:54:55 pm */