<?php
namespace App\Models;
use CodeIgniter\Model;

class CodigosacreditacionApiModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'codigosacreditacion';
	protected $primaryKey           = 'cod_coa';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = true;
	protected $protectFields        = true;
	protected $allowedFields        = ["cod_ali_coa","sec_coa","fin_coa"];

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
		$array = ["cod_ali_coa","sec_coa","fin_coa"];
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
			'cod_ali_coa' => $request->getVar('cod_ali_coa')
,'sec_coa' => $request->getVar('sec_coa')
,'fin_coa' => $request->getVar('fin_coa')

		];
		$id = $this->insert($data);
		return $id;
	}

	public function edicion($id, $request)
	{
		$data = [
			'cod_coa' => $id,
			'cod_ali_coa' => $request->getVar('cod_ali_coa')
,'sec_coa' => $request->getVar('sec_coa')
,'fin_coa' => $request->getVar('fin_coa')

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
		$array = ["cod_ali_coa","sec_coa","fin_coa"];
		$data = $this->select($array)->findAll();
		return $data;
	}
}
/* fecha de creacion: 06-05-2023 10:28:42 am */