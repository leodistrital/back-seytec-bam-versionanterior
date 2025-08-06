<?php
namespace App\Models;
use CodeIgniter\Model;

class MenusApiModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'menus';
	protected $primaryKey           = 'cod_men';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = true;
	protected $protectFields        = true;
	protected $allowedFields        = ["slu_men","nom_men_esp","nom_men_ing","ord_men","pad_men","rut_men","pla_men"];

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
		$array = ["slu_men","nom_men_esp","nom_men_ing","ord_men","pad_men","rut_men","pla_men"];
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
			'slu_men' => $request->getVar('slu_men')
,'nom_men_esp' => $request->getVar('nom_men_esp')
,'nom_men_ing' => $request->getVar('nom_men_ing')
,'ord_men' => $request->getVar('ord_men')
,'pad_men' => $request->getVar('pad_men')
,'rut_men' => $request->getVar('rut_men')
,'pla_men' => $request->getVar('pla_men')

		];
		$id = $this->insert($data);
		return $id;
	}

	public function edicion($id, $request)
	{
		$data = [
			'cod_men' => $id,
			'slu_men' => $request->getVar('slu_men')
,'nom_men_esp' => $request->getVar('nom_men_esp')
,'nom_men_ing' => $request->getVar('nom_men_ing')
,'ord_men' => $request->getVar('ord_men')
,'pad_men' => $request->getVar('pad_men')
,'rut_men' => $request->getVar('rut_men')
,'pla_men' => $request->getVar('pla_men')

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
		$array = ["slu_men","nom_men_esp","nom_men_ing","ord_men","pad_men","rut_men","pla_men"];
		$data = $this->select($array)->findAll();
		return $data;
	}

	public function tipoaliados()
	{
		$array = ["cod_men as value","nom_men_esp as name"];
		$where =' cod_men in(17,18,19)';
		$data = $this->select($array)->where($where)->findAll();
		return $data;
	}

	public function tipoaCifras()
	{
		$array = ["cod_men as value","nom_men_esp as name"];
		$where ='pad_men=8 or  pad_men=13';
		$data = $this->select($array)->where($where)->findAll();
		return $data;
	}
}
/* fecha de creacion: 08-10-2022 02:44:46 pm */