<?php
namespace App\Models;
use CodeIgniter\Model;
class CabezotebomdetalleModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'cabezotebomdetalle';
	protected $primaryKey           = 'cod_cab';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = true;
	protected $protectFields        = true;
	protected $allowedFields        = ["cod_bom_cab","tip_det_cab","cod_tip_cab","nom_det_cab","cod_cap_cab","can_cab","created_at"];
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
		$array = ["cod_bom_cab","tip_det_cab","cod_tip_cab","nom_det_cab","cod_cap_cab","can_cab","created_at"];
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
			'cod_bom_cab' => $request->getVar('cod_bom_cab')
,'tip_det_cab' => $request->getVar('tip_det_cab')
,'cod_tip_cab' => $request->getVar('cod_tip_cab')
,'nom_det_cab' => $request->getVar('nom_det_cab')
,'cod_cap_cab' => $request->getVar('cod_cap_cab')
,'can_cab' => $request->getVar('can_cab')
,'created_at' => $request->getVar('created_at')

		];
		$id = $this->insert($data);
		return $id;
	}
	public function edicion($id, $request)
	{
		$data = [
			'cod_cab' => $id,
			'cod_bom_cab' => $request->getVar('cod_bom_cab')
,'tip_det_cab' => $request->getVar('tip_det_cab')
,'cod_tip_cab' => $request->getVar('cod_tip_cab')
,'nom_det_cab' => $request->getVar('nom_det_cab')
,'cod_cap_cab' => $request->getVar('cod_cap_cab')
,'can_cab' => $request->getVar('can_cab')
,'created_at' => $request->getVar('created_at')

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
		$array = ["cod_bom_cab","tip_det_cab","cod_tip_cab","nom_det_cab","cod_cap_cab","can_cab","created_at"];
		$data = $this->select($array)->findAll();
		return $data;
	}
}
/* fecha de creacion: 09-06-2022 03:01:54 pm */