<?php
namespace App\Models;
use CodeIgniter\Model;

class AgendaeventosregionesApiModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'agendaeventosregiones';
	protected $primaryKey           = 'cod_ave';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = true;
	protected $protectFields        = true;
	protected $allowedFields        = ["cod_reg_ave","tip_eve_ave","tit_ave","tit_ave_ing","des_ave","des_ave_ing","fec_ave","hor_ave","not_ave","nor_ave_ing","pre_ave","pre_ave_ing","vir_ave","url_ave","lug_ave","img_ave","log_ave"];

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
		$array = ['cod_ave as id',"cod_reg_ave","tip_eve_ave","tit_ave","tit_ave_ing","des_ave","des_ave_ing","fec_ave","hor_ave","not_ave","nor_ave_ing","pre_ave","pre_ave_ing","vir_ave","url_ave","lug_ave","img_ave","log_ave"
		, 'nom_reg as region'];
		if ($id == 0) {
			$data = $this->select($array)->join('regionesbam' , 'cod_reg_ave=cod_reg' )->findAll();
		} else {
			$data = $this->select($array)->join('regionesbam' , 'cod_reg_ave=cod_reg' )->find($id);
		}
		return $data;
	}

	public function guardar($request)
	{

		$data = [
			'cod_reg_ave' => $request->getVar('cod_reg_ave')
,'tip_eve_ave' => $request->getVar('tip_eve_ave')
,'tit_ave' => $request->getVar('tit_ave')
,'tit_ave_ing' => $request->getVar('tit_ave_ing')
,'des_ave' => $request->getVar('des_ave')
,'des_ave_ing' => $request->getVar('des_ave_ing')
,'fec_ave' => $request->getVar('fec_ave')
,'hor_ave' => $request->getVar('hor_ave')
,'not_ave' => $request->getVar('not_ave')
,'nor_ave_ing' => $request->getVar('nor_ave_ing')
,'pre_ave' => $request->getVar('pre_ave')
,'pre_ave_ing' => $request->getVar('pre_ave_ing')
,'vir_ave' => $request->getVar('vir_ave')
,'url_ave' => $request->getVar('url_ave')
,'lug_ave' => $request->getVar('lug_ave')
,'img_ave' => $request->getVar('img_ave')
,'log_ave' => $request->getVar('log_ave')

		];
		$id = $this->insert($data);
		return $id;
	}

	public function edicion($id, $request)
	{
		$data = [
			'cod_ave' => $id,
			'cod_reg_ave' => $request->getVar('cod_reg_ave')
,'tip_eve_ave' => $request->getVar('tip_eve_ave')
,'tit_ave' => $request->getVar('tit_ave')
,'tit_ave_ing' => $request->getVar('tit_ave_ing')
,'des_ave' => $request->getVar('des_ave')
,'des_ave_ing' => $request->getVar('des_ave_ing')
,'fec_ave' => $request->getVar('fec_ave')
,'hor_ave' => $request->getVar('hor_ave')
,'not_ave' => $request->getVar('not_ave')
,'nor_ave_ing' => $request->getVar('nor_ave_ing')
,'pre_ave' => $request->getVar('pre_ave')
,'pre_ave_ing' => $request->getVar('pre_ave_ing')
,'vir_ave' => $request->getVar('vir_ave')
,'url_ave' => $request->getVar('url_ave')
,'lug_ave' => $request->getVar('lug_ave')
,'img_ave' => $request->getVar('img_ave')
,'log_ave' => $request->getVar('log_ave')

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
		$array = ["cod_ave as value","tit_ave as name"];
		$data = $this->select($array)->findAll();
		return $data;
	}
}
/* fecha de creacion: 01-16-2023 03:12:21 pm */