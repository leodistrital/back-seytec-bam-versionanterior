<?php
namespace App\Models;
use CodeIgniter\Model;

class EquiposApiModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'equipos';
	protected $primaryKey           = 'cod_equ';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = true;
	protected $protectFields        = true;
	protected $allowedFields        = ["nom_equ","car_equ","car_equ_ing","img_equ","ord_equ"];

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
		$array = ["cod_equ as id" , "nom_equ","car_equ","car_equ_ing","img_equ","ord_equ"];
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
			'nom_equ' => $request->getVar('nom_equ')
,'car_equ' => $request->getVar('car_equ')
,'car_equ_ing' => $request->getVar('car_equ_ing')
,'img_equ' => $request->getVar('img_equ')
,'ord_equ' => $request->getVar('ord_equ')

		];
		$id = $this->insert($data);
		return $id;
	}

	public function edicion($id, $request)
	{
		$data = [
			'cod_equ' => $id,
			'nom_equ' => $request->getVar('nom_equ')
,'car_equ' => $request->getVar('car_equ')
,'car_equ_ing' => $request->getVar('car_equ_ing')
,'img_equ' => $request->getVar('img_equ')
,'ord_equ' => $request->getVar('ord_equ')

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
		$array = ["nom_equ","car_equ","car_equ_ing","img_equ","ord_equ"];
		$data = $this->select($array)->findAll();
		return $data;
	}
}
/* fecha de creacion: 11-12-2022 10:46:50 am */