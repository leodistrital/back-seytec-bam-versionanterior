<?php
namespace App\Models;
use CodeIgniter\Model;

class UsuariosApiModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'usuarios';
	protected $primaryKey           = 'cod_usu';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = true;
	protected $protectFields        = true;
	protected $allowedFields        = ["nom_usu","mai_usu","pas_usu","tel_usu","car_usu","created_at"];

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
		$array = ["nom_usu","mai_usu","pas_usu","tel_usu","car_usu","created_at"];
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
			'nom_usu' => $request->getVar('nom_usu')
,'mai_usu' => $request->getVar('mai_usu')
,'pas_usu' => $request->getVar('pas_usu')
,'tel_usu' => $request->getVar('tel_usu')
,'car_usu' => $request->getVar('car_usu')
,'created_at' => $request->getVar('created_at')

		];
		$id = $this->insert($data);
		return $id;
	}

	public function edicion($id, $request)
	{
		$data = [
			'cod_usu' => $id,
			'nom_usu' => $request->getVar('nom_usu')
,'mai_usu' => $request->getVar('mai_usu')
,'pas_usu' => $request->getVar('pas_usu')
,'tel_usu' => $request->getVar('tel_usu')
,'car_usu' => $request->getVar('car_usu')
,'created_at' => $request->getVar('created_at')

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
		$array = ["nom_usu","mai_usu","pas_usu","tel_usu","car_usu","created_at"];
		$data = $this->select($array)->findAll();
		return $data;
	}
}
/* fecha de creacion: 08-14-2023 02:48:08 pm */