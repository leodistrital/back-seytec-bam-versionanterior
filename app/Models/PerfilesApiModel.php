<?php
namespace App\Models;
use CodeIgniter\Model;

class PerfilesApiModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'perfiles';
	protected $primaryKey           = 'cod_per';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = true;
	protected $protectFields        = true;
	protected $allowedFields        = ["tip_per","img_per","ord_per","nom_per_esp","car_per_esp","car_per_ing","des_per_esp","des_per_ing"];

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
		$array = ["cod_per as id","tip_per","img_per","ord_per","nom_per_esp","car_per_esp","car_per_ing","des_per_esp","des_per_ing"];
		if ($id == 0) {
			$data = $this->select($array)->select("(select nom_op_para from parametros where nom_para='tipo_perfil' and val_op_para=tip_per limit 1) as tipoperfil ")->orderBy('tip_per desc, ord_per asc')->findAll();
		} else {
			$data = $this->select($array)->find($id);
		}
		return $data;
	}

	public function guardar($request)
	{

		$data = [
			'tip_per' => $request->getVar('tip_per')
,'img_per' => $request->getVar('img_per')
,'ord_per' => $request->getVar('ord_per')
,'nom_per_esp' => $request->getVar('nom_per_esp')
,'car_per_esp' => $request->getVar('car_per_esp')
,'car_per_ing' => $request->getVar('car_per_ing')
,'des_per_esp' => $request->getVar('des_per_esp')
,'des_per_ing' => $request->getVar('des_per_ing')

		];
		$id = $this->insert($data);
		return $id;
	}

	public function edicion($id, $request)
	{
		$data = [
			'cod_per' => $id,
			'tip_per' => $request->getVar('tip_per')
,'img_per' => $request->getVar('img_per')
,'ord_per' => $request->getVar('ord_per')
,'nom_per_esp' => $request->getVar('nom_per_esp')
,'car_per_esp' => $request->getVar('car_per_esp')
,'car_per_ing' => $request->getVar('car_per_ing')
,'des_per_esp' => $request->getVar('des_per_esp')
,'des_per_ing' => $request->getVar('des_per_ing')

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
		$array = ["tip_per","img_per","ord_per","nom_per_esp","car_per_esp","car_per_ing","des_per_esp","des_per_ing"];
		$data = $this->select($array)->findAll();
		return $data;
	}
}
/* fecha de creacion: 08-23-2022 03:38:03 pm */