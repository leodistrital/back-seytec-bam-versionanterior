<?php
namespace App\Models;
use CodeIgniter\Model;

class ContenidosApiModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'contenidos';
	protected $primaryKey           = 'cod_con';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = true;
	protected $protectFields        = true;
	protected $allowedFields =
	["slu_con","img_con","tit_con_esp","tit_con_ing","des_con_esp","des_con_ing","cod_mep_con","img2_con_esp", 'contenidos'
	, 'cod_gal_con' ];

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
		$array = ["cod_con as id" ,
		"slu_con","img_con","tit_con_esp","tit_con_ing","des_con_esp","des_con_ing","cod_mep_con","img2_con_esp" ,
		'cod_gal_con'];
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
			'slu_con' => $request->getVar('slu_con')
,'img_con' => $request->getVar('img_con')
,'tit_con_esp' => $request->getVar('tit_con_esp')
,'tit_con_ing' => $request->getVar('tit_con_ing')
,'des_con_esp' => $request->getVar('des_con_esp')
,'des_con_ing' => $request->getVar('des_con_ing')
,'cod_mep_con' => $request->getVar('cod_mep_con')
,'img2_con_esp' => $request->getVar('img2_con_esp')
,'cod_gal_con' => $request->getVar('cod_gal_con')

		];
		$id = $this->insert($data);
		return $id;
	}

	public function edicion($id, $request)
	{
		$data = [
			'cod_con' => $id,
			'slu_con' => $request->getVar('slu_con')
,'img_con' => $request->getVar('img_con')
,'tit_con_esp' => $request->getVar('tit_con_esp')
,'tit_con_ing' => $request->getVar('tit_con_ing')
,'des_con_esp' => $request->getVar('des_con_esp')
,'des_con_ing' => $request->getVar('des_con_ing')
,'cod_mep_con' => $request->getVar('cod_mep_con')
,'img2_con_esp' => $request->getVar('img2_con_esp')
,'cod_gal_con' => $request->getVar('cod_gal_con')

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
		$array = ["slu_con","img_con","tit_con_esp","tit_con_ing","des_con_esp","des_con_ing","cod_mep_con","img2_con_esp"];
		$data = $this->select($array)->findAll();
		return $data;
	}
}
/* fecha de creacion: 11-12-2022 10:46:09 am */