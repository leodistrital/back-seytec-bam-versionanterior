<?php
namespace App\Models;
use CodeIgniter\Model;

class ParametrosApiModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'parametros';
	protected $primaryKey           = 'cod_pra';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = true;
	protected $protectFields        = true;
	protected $allowedFields        = ["nom_para","val_op_para","nom_op_para","ord_para"];

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
		$array = ["nom_para","val_op_para","nom_op_para","ord_para"];
		if ($id == 0) {
			$data = $this->select($array)->findAll();
		} else {
			$data = $this->select($array)->find($id);
		}
		return $data;
	}


	public function filtrodatos($filtro)
	{
		$array = ["val_op_para as value","nom_op_para as name"];
		if (!empty($filtro)) {
			$data = $this->select($array)->where("nom_para",$filtro)->orderBy('ord_para')->findAll();
			return $data;
		} 
		
	}

	public function guardar($request)
	{

		$data = [
			'nom_para' => $request->getVar('nom_para')
,'val_op_para' => $request->getVar('val_op_para')
,'nom_op_para' => $request->getVar('nom_op_para')
,'ord_para' => $request->getVar('ord_para')

		];
		$id = $this->insert($data);
		return $id;
	}

	public function edicion($id, $request)
	{
		$data = [
			'cod_pra' => $id,
			'nom_para' => $request->getVar('nom_para')
,'val_op_para' => $request->getVar('val_op_para')
,'nom_op_para' => $request->getVar('nom_op_para')
,'ord_para' => $request->getVar('ord_para')

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
		$array = ["nom_para","val_op_para","nom_op_para","ord_para"];
		$data = $this->select($array)->findAll();
		return $data;
	}
}
/* fecha de creacion: 08-23-2022 03:10:15 pm */