<?php

namespace App\Models;

use CodeIgniter\Model;

class CapitulosbomModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'capitulosbom';
	protected $primaryKey           = 'cod_cbo';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = true;
	protected $protectFields        = true;
	protected $allowedFields        = ["cod_bom_cbo", "nom_cbo", "can_cbo", "tip_cbo"];
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
		$array = ["cod_cbo as id", "cod_bom_cbo", "nom_cbo", "can_cbo", "tip_cbo"];
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
			'cod_bom_cbo' => $request->getVar('codigoBom'), 'nom_cbo' => $request->getVar('nombrecapitulo'), 'can_cbo' => $request->getVar('cantidad'), 'tip_cbo' => $request->getVar('tipocapitulo')

		];
		$id = $this->insert($data);
		return $id;
	}
	public function edicion($id, $request)
	{
		$data = [
			'cod_cbo' => $id,
			'cod_bom_cbo' => $request->getVar('cod_bom_cbo'), 'nom_cbo' => $request->getVar('nom_cbo'), 'can_cbo' => $request->getVar('can_cbo'), 'tip_cbo' => $request->getVar('tip_cbo')

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
		$array = ["cod_bom_cbo", "nom_cbo", "can_cbo", "tip_cbo"];
		
		$data = $this->select($array)->findAll();
		return $data;
	}


	public function listatarCapitulosBomCapitulo($codigoBom )
	{
		//echo $codigoBom.' - '.$codigoCapitulo;
		$array = ["cod_cbo", "nom_cbo", "can_cbo","nom_cap", "cod_bom_cbo" , 'tip_cbo' , "nom_cbo as nombre"  ];
		$data = $this->select($array)->join('capitulos', 'capitulosbom.tip_cbo=capitulos.cod_cap')->where('cod_bom_cbo',$codigoBom)->findAll();
		// echo $this->lastQuery ;	
		
		// foreach($data as $dat){
		// 	echo $dat['cod_cbo'];
		// 	$this->valorCapitulo($dat['cod_cbo']);
		// }
		
		// dd($data);



		//print_r($data);
		return $data;
	}


	// public function valorCapitulo($codigocapitulo ){

	// 	$cuerpobomdetalle =  new CuerpobomdetalleModel();
	// 	// $array = ["cod_hed_cub * can_hed_cub as totalcapitulo"  ];
	// 	$array = ["cos_mat_cub", "can_hed_cub"  ];
	// 	$data = $cuerpobomdetalle->select($array)->where('cod_cub',$codigocapitulo)->findAll();
	// 	print_r($data);
	// 	// exit();
	// }



}
/* fecha de creacion: 09-06-2022 06:24:11 pm */