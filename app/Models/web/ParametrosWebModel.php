<?php
namespace App\Models\web;
use CodeIgniter\Model;

class ParametrosWebModel extends Model
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
		$array = ["name","lastname","idconutry"];
		if ($id == 0) {
			$data = $this->select($array)->findAll();
		} else {
			$data = $this->select($array)->find($id);
		}
		return $data;
	}


	public function listataParametro($parametro)
	{
		$array = ["val_op_para as valor","nom_op_para as dato"];
		$wherearray = ["nom_para"=>$parametro];
		$data = $this->select($array)->where($wherearray)->find();
		return $data;
	}
}