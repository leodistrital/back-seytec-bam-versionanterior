<?php
namespace App\Models;
use CodeIgniter\Model;

class AliadosApiModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'aliados';
	protected $primaryKey           = 'cod_ali';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = true;
	protected $protectFields        = true;
	protected $allowedFields        = ["cat_ali","img_ali","cat_ali_ing","ord_ali"];

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
		$array = ["cod_ali as id" , "cat_ali","img_ali","cat_ali_ing","ord_ali"];
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
			'cat_ali' => $request->getVar('cat_ali')
,'img_ali' => $request->getVar('img_ali')
,'cat_ali_ing' => $request->getVar('cat_ali_ing')
,'ord_ali' => $request->getVar('ord_ali')

		];
		$id = $this->insert($data);
		return $id;
	}

	public function edicion($id, $request)
	{
		$data = [
			'cod_ali' => $id,
			'cat_ali' => $request->getVar('cat_ali')
,'img_ali' => $request->getVar('img_ali')
,'cat_ali_ing' => $request->getVar('cat_ali_ing')
,'ord_ali' => $request->getVar('ord_ali')

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
		$array = ["cat_ali","img_ali","cat_ali_ing","ord_ali"];
		$data = $this->select($array)->findAll();
		return $data;
	}
}
/* fecha de creacion: 11-12-2022 10:33:02 am */