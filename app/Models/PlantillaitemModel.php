<?php

namespace App\Models;

use CodeIgniter\Model;


class PlantillaitemModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'detplantillaitem';
	protected $primaryKey           = 'cod_dpi';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = true;
	protected $protectFields        = true;
	protected $allowedFields        = ['cod_pla_dpi', 'cod_ite_dpi', 'fac_ite_dpi'];

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

		$array = ['cod_dpi as id', 'cod_pla_dpi codigoplantilla', 'cod_ite_dpi  codigoitem', "concat(ser_ite, ' - ',nom_ite) nombreitem", 'fac_ite_dpi' ,'pre_ite as precio'];

		if ($id == 0) {
			$data = $this->select($array)->findAll();
		} else {
			$data = $this->select($array)->join('item', 'cod_ite=cod_ite_dpi', 'left')->where('cod_pla_dpi', $id)->findAll();
		}

		return $data;
	}

	public function guardar($request)
	{
		$data = [
			'cod_pla_dpi' => $request->getVar('idPlantilla'),
			'cod_ite_dpi' => $request->getVar('iditem'),
			'fac_ite_dpi' => $request->getVar('factor')
		];

		$codigo  = $request->getVar('codigo');

		if ($codigo == 0) {
			$id = $this->insert($data);
		}
		if ($codigo > 0) {
			$id = $this->edicion($codigo, $data);
		}
		return $id;
	}


	// public function guardarPlantilla($idItem, $request)
	// {

	// 	print_r($request->getVar('codigoPlantilla'));
	// 	$data = [
	// 		'cod_pla_dpi' => $request->getVar('idPlantilla'),
	// 		'cod_ite_dpi' => $idItem,
	// 		'fac_ite_dpi' => $request->getVar('factor')
	// 	];
	// 	print_r($data);

	// 	// $id = $this->insert($data);
	// 	// return $id;
	// }

	public function edicion($id, $request)
	{
		$data = [
			'cod_ite' => $id,
			'cod_pla_dpi' => $request->getVar('codigoplantilla'),
			'cod_ite_dpi' => $request->getVar('codigoitem')
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

	// public function listatardatosxPlnatilla($id = 0)
	// {

	// 	$array = ['cod_dpi as id', 'cod_pla_dpi codigoplantilla'  ,'cod_ite_dpi  codigoitem', "concat(ser_ite, ' - ',nom_ite) nombreitem" , 'fac_ite_dpi'];

	// 	if ($id == 0) {
	// 		$data = $this->select($array)->findAll();
	// 	} else {
	// 		$data = $this->select($array)->join('item' ,'cod_ite=cod_ite_dpi', 'left' )->where('cod_pla_dpi',$id)->findAll();
	// 	}

	// 	return $data;
	// }


}