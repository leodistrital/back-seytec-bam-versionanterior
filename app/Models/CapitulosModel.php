<?php
namespace App\Models;
use CodeIgniter\Model;
class CapitulosModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'capitulos';
	protected $primaryKey           = 'cod_cap';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = true;
	protected $protectFields        = true;
	protected $allowedFields        = ["nom_cap"];
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
		$array = ['cod_cap', "nom_cap"];
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
			'nom_cap' => $request->getVar('nom_cap')

		];
		$id = $this->insert($data);
		return $id;
	}
	public function edicion($id, $request)
	{
		$data = [
			'cod_cap' => $id,
			'nom_cap' => $request->getVar('nom_cap')

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
		$array = ['cod_cap as value', "nom_cap as name"];
		$data = $this->select($array)->findAll();
		return $data;
	}
}
/* fecha de creacion: 06-14-2022 02:58:03 pm */