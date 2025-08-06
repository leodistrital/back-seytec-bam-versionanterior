<?php

namespace App\Models;

use CodeIgniter\Model;

class CuerpobomdetalleModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'cuerpobomdetalle';
	protected $primaryKey           = 'cod_cub';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = true;
	protected $protectFields        = true;
	protected $allowedFields        = ["cod_bom_cub", "cod_hed_cub", "cod_mat_cub", "cos_mat_cub", "cod_cap_cub" , 'fac_can_cub', 'can_hed_cub'];
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
		$array = ["cod_bom_cub", "cod_hed_cub", "cod_mat_cub", "cos_mat_cub",  "cod_cap_cub" ,'fac_can_cub', 'can_hed_cub'];
		if ($id == 0) {
			$data = $this->select($array)->findAll();
		} else {
			$data = $this->select($array)->find($id);
		}
		return $data;
	}


	public function guardar($request)
	{
		// print_r($request->getVar('codigoCapitulo'));
		
		$data = [
			'cod_bom_cub' => $request->getVar('codigoBom'), 
			'cod_hed_cub' => $request->getVar('codigoCapitulo'), 
			'cod_mat_cub' => $request->getVar('codigomaterial'), 
			'cos_mat_cub' => $request->getVar('precio'),
			'fac_can_cub' => $request->getVar('factor'),
			'can_hed_cub' => $request->getVar('cantidad')

		];
		$id = $this->insert($data);
		return $id;
	}


	public function guardarPlnatilla($request ,$Material )
	{
		print_r($Material);
		
		$data = [
			'cod_bom_cub' => $request->getVar('codigoBom'), 
			'cod_hed_cub' => $request->getVar('codigoCapitulo'), 
			'cod_mat_cub' => $Material['id'], 
			'cos_mat_cub' => $Material['precio'],
			'fac_can_cub' => $Material['fac_ite_dpi'],
			'can_hed_cub' => $Material['fac_ite_dpi']
		];
		$id = $this->insert($data);
		return $id;
	}


	public function edicion($id, $request)
	{
		$data = [
			'cod_cub' => $id,
			'cod_bom_cub' => $request->getVar('cod_bom_cub'), 
			'cod_hed_cub' => $request->getVar('cod_hed_cub'), 
			'cod_mat_cub' => $request->getVar('cod_mat_cub'), 
			'cos_mat_cub' => $request->getVar('cos_mat_cub')


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
		$array = ["cod_bom_cub", "cod_hed_cub", "cod_mat_cub", "cos_mat_cub", "created_at"];
		$data = $this->select($array)->findAll();
		return $data;
	}



	public function guardarProcess($data)
	{
		$id = $this->insert($data);
		return $id;
	}


	public function listatarMaterialBomCapitulo($codigoBom, $codigoCapitulo)
	{
		// echo $codigoBom.' - '.$codigoCapitulo;
		// exit;
		$array = ["cod_hed_cub as codigobom", "cod_cub", "cod_ite", "nom_ite" , "ser_ite", "FORMAT(pre_ite,0) as pre_ite ",  "cod_cap_cub", "nom_uni" , 'can_hed_cub as cantidad' ];

		$wherearray = ['cod_bom_cub' => $codigoBom, 'cod_hed_cub' => $codigoCapitulo];
		
		// $data = $this->select($array)->join('item', 'item.cod_ite=cuerpobomdetalle.cod_mat_cub')->join('unidadesmedida', 'cod_uni_ite=cod_uni' )->findAll();
		$data = $this->select('* ,FORMAT(cos_mat_cub,0) as cos_mat_cub_valor , FORMAT(can_hed_cub,0) as can_hed_cub_valor, cod_cub as id ')->join('item', 'item.cod_ite=cuerpobomdetalle.cod_mat_cub')->join('unidadesmedida', 'cod_uni_ite=cod_uni' )->where($wherearray)->findAll();
		//echo $this->lastQuery ;	
		//print_r($data);
		return $data;
		
		
	}
} 
/* fecha de creacion: 06-15-2022 05:09:09 pm */