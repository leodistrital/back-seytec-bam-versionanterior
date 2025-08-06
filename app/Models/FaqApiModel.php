<?php
namespace App\Models;
use CodeIgniter\Model;

class FaqApiModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'faq';
	protected $primaryKey           = 'cod_faq';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = true;
	protected $protectFields        = true;
	protected $allowedFields        = ["pre_fac","pre_fac_ing","res_fac","res_fac_ing","ord_faq"];

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
		$array = ["cod_faq as id", "pre_fac","pre_fac_ing","res_fac","res_fac_ing","ord_faq"];
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
			'pre_fac' => $request->getVar('pre_fac')
,'pre_fac_ing' => $request->getVar('pre_fac_ing')
,'res_fac' => $request->getVar('res_fac')
,'res_fac_ing' => $request->getVar('res_fac_ing')
,'ord_faq' => $request->getVar('ord_faq')

		];
		$id = $this->insert($data);
		return $id;
	}

	public function edicion($id, $request)
	{
		$data = [
			'cod_faq' => $id,
			'pre_fac' => $request->getVar('pre_fac')
,'pre_fac_ing' => $request->getVar('pre_fac_ing')
,'res_fac' => $request->getVar('res_fac')
,'res_fac_ing' => $request->getVar('res_fac_ing')
,'ord_faq' => $request->getVar('ord_faq')

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
		$array = ["pre_fac","pre_fac_ing","res_fac","res_fac_ing","ord_faq"];
		$data = $this->select($array)->findAll();
		return $data;
	}
}
/* fecha de creacion: 11-12-2022 10:47:16 am */