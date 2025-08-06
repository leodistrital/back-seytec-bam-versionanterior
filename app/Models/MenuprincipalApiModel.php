<?php
namespace App\Models;
use CodeIgniter\Model;

class MenuprincipalApiModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'menuprincipal';
	protected $primaryKey           = 'cod_mep';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = true;
	protected $protectFields        = true;
	protected $allowedFields        = ["nom_mep","nom_mep_ing","ord_mep"];

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
		$array = ["cod_mep as id" , "nom_mep","nom_mep_ing","ord_mep"];
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
			'nom_mep' => $request->getVar('nom_mep')
,'nom_mep_ing' => $request->getVar('nom_mep_ing')
,'ord_mep' => $request->getVar('ord_mep')

		];
		$id = $this->insert($data);
		return $id;
	}

	public function edicion($id, $request)
	{
		$data = [
			'cod_mep' => $id,
			'nom_mep' => $request->getVar('nom_mep')
,'nom_mep_ing' => $request->getVar('nom_mep_ing')
,'ord_mep' => $request->getVar('ord_mep')

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
		$array = ["nom_mep","nom_mep_ing","ord_mep"];
		$data = $this->select($array)->findAll();
		return $data;
	}
}
/* fecha de creacion: 11-12-2022 10:49:04 am */