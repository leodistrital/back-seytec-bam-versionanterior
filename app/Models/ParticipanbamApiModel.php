<?php
namespace App\Models;
use CodeIgniter\Model;

class ParticipanbamApiModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'participanbam';
	protected $primaryKey           = 'cod_par';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = true;
	protected $protectFields        = true;
	protected $allowedFields        = ["tit_par","des_par","tit_par_ing","des_par_ing","img_par","ord_par"];

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
		$array = [ 'cod_par as id', "tit_par","des_par","tit_par_ing","des_par_ing","img_par","ord_par"];
		if ($id == 0) {
			$data = $this->select($array)->orderBy('ord_par')->findAll();
		} else {
			$data = $this->select($array)->find($id);
		}
		return $data;
	}

	public function guardar($request)
	{

		$data = [
			'tit_par' => $request->getVar('tit_par')
,'des_par' => $request->getVar('des_par')
,'tit_par_ing' => $request->getVar('tit_par_ing')
,'des_par_ing' => $request->getVar('des_par_ing')
,'img_par' => $request->getVar('img_par')
,'ord_par' => $request->getVar('ord_par')

		];
		$id = $this->insert($data);
		return $id;
	}

	public function edicion($id, $request)
	{
		$data = [
			'cod_par' => $id,
			'tit_par' => $request->getVar('tit_par')
,'des_par' => $request->getVar('des_par')
,'tit_par_ing' => $request->getVar('tit_par_ing')
,'des_par_ing' => $request->getVar('des_par_ing')
,'img_par' => $request->getVar('img_par')
,'ord_par' => $request->getVar('ord_par')

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
		$array = ["tit_par","des_par","tit_par_ing","des_par_ing","img_par","ord_par"];
		$data = $this->select($array)->findAll();
		return $data;
	}
}
/* fecha de creacion: 01-16-2023 11:46:58 am */