<?php
namespace App\Models;
use CodeIgniter\Model;

class SedesApiModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'sedes';
	protected $primaryKey           = 'cod_sed';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = true;
	protected $protectFields        = true;
	protected $allowedFields        = ["nom_sed","nom_sed_ing","dir_sed","dir_sed_ing","des_sed","des_sed_ing","img_sed","ord_sed"];

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
		$array = ["cod_sed as id",  "nom_sed","nom_sed_ing","dir_sed","dir_sed_ing","des_sed","des_sed_ing","img_sed","ord_sed"];
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
			'nom_sed' => $request->getVar('nom_sed')
,'nom_sed_ing' => $request->getVar('nom_sed_ing')
,'dir_sed' => $request->getVar('dir_sed')
,'dir_sed_ing' => $request->getVar('dir_sed_ing')
,'des_sed' => $request->getVar('des_sed')
,'des_sed_ing' => $request->getVar('des_sed_ing')
,'img_sed' => $request->getVar('img_sed')
,'ord_sed' => $request->getVar('ord_sed')

		];
		$id = $this->insert($data);
		return $id;
	}

	public function edicion($id, $request)
	{
		$data = [
			'cod_sed' => $id,
			'nom_sed' => $request->getVar('nom_sed')
,'nom_sed_ing' => $request->getVar('nom_sed_ing')
,'dir_sed' => $request->getVar('dir_sed')
,'dir_sed_ing' => $request->getVar('dir_sed_ing')
,'des_sed' => $request->getVar('des_sed')
,'des_sed_ing' => $request->getVar('des_sed_ing')
,'img_sed' => $request->getVar('img_sed')
,'ord_sed' => $request->getVar('ord_sed')

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
		$array = ["nom_sed","nom_sed_ing","dir_sed","dir_sed_ing","des_sed","des_sed_ing","img_sed","ord_sed"];
		$data = $this->select($array)->findAll();
		return $data;
	}
}
/* fecha de creacion: 11-12-2022 10:50:29 am */