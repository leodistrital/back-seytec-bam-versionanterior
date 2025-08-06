<?php
namespace App\Models;
use CodeIgniter\Model;

class GaleriaimagenesdetalleApiModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'galeriaimagenesdetalle';
	protected $primaryKey           = 'cod_dga';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = true;
	protected $protectFields        = true;
	protected $allowedFields        = ["sec_dal","img_dal","des_dal"];

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
		$array = ["sec_dal","img_dal","des_dal"];
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
			'sec_dal' => $request->getVar('id')
,'img_dal' => $request->getVar('img_detalle')
,'des_dal' => $request->getVar('des_dal')

		];
		$id = $this->insert($data);
		return $id;
	}

	public function edicion($id, $request)
	{
// 		$data = [
// 			'cod_dga' => $id,
// 			'sec_dal' => $request->getVar('sec_dal')
// ,'img_dal' => $request->getVar('img_dal')
// ,'des_dal' => $request->getVar('des_dal')

// 		];
// 		$confirmacion = $this->save($data);

// 		if ($confirmacion == 1) {
// 			return $id;
// 		}
	}

	public function borrar($id)
	{
		$id = $this->delete($id);
		return $id;
	}

	public function parametros($id)
	{
		$array = ["sec_dal","img_dal","cod_dga"];
		$data = $this->select($array)->where('sec_dal', $id )->findAll();
		return $data;
	}
}
/* fecha de creacion: 11-12-2022 10:48:33 am */