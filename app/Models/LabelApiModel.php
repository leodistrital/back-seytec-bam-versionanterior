<?php
namespace App\Models;
use CodeIgniter\Model;

class LabelApiModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'label';
	protected $primaryKey           = 'cod_lab';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = true;
	protected $protectFields        = true;
	protected $allowedFields        = ["nom_lab","tex_lab_ing","tex_lab_esp"];

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
		$array = ['cod_lab as id', "nom_lab","tex_lab_ing","tex_lab_esp"];
		if ($id == 0) {
			$data = $this->select($array)->orderby('tex_lab_esp')->findAll();
		} else {
			$data = $this->select($array)->find($id);
		}
		return $data;
	}

	public function guardar($request)
	{

		$data = [
			'nom_lab' => $request->getVar('nom_lab')
,'tex_lab_ing' => $request->getVar('tex_lab_ing')
,'tex_lab_esp' => $request->getVar('tex_lab_esp')

		];
		$id = $this->insert($data);
		return $id;
	}

	public function edicion($id, $request)
	{
		$data = [
			'cod_lab' => $id,
			'nom_lab' => $request->getVar('nom_lab')
,'tex_lab_ing' => $request->getVar('tex_lab_ing')
,'tex_lab_esp' => $request->getVar('tex_lab_esp')

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
		$array = ["nom_lab","tex_lab_ing","tex_lab_esp"];
		$data = $this->select($array)->findAll();
		return $data;
	}
}
/* fecha de creacion: 01-11-2023 11:10:47 am */