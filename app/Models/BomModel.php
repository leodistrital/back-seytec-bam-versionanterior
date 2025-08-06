<?php

namespace App\Models;

use CodeIgniter\Model;


class BomModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'bom';
	protected $primaryKey           = 'cod_bom';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = true;
	protected $protectFields        = true;
	protected $allowedFields        = ['cod_cli_bom',  'pro_bom' , 'des_bom' , 'not_bom' , 'fec_bom' ,  'cgo_bom' , 'mar_bom' , 'sta_bom'  , 'tim_bom' , 'per_bom' ];

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
		$array = ['cod_bom as id', 'cod_cli_bom'  ,'pro_bom  proyecto', 'fec_bom as fecha', 'sta_bom as status', 'nom_cli as cliente' , 'des_bom as description' , 'tim_bom' , 'per_bom'];

		if ($id == 0) {
			$data = $this->select($array)->join('cliente' ,'cod_cli=cod_cli_bom', 'left' )->findAll();
		} else {
			$data = $this->select($array)->join('cliente' ,'cod_cli=cod_cli_bom', 'left' )->find($id);

		}
		
		//echo $this->getLastQuery();
		//print_r($data);
		//exit;

		return $data;
	}

	public function guardar($request)
	{
		$data = [
			'cod_cli_bom' => $request->getVar('cod_cli_bom'),
			'pro_bom' => $request->getVar('proyecto'),
			'des_bom' => $request->getVar('description'),
			'sta_bom' => $request->getVar('status'),
			'tim_bom' => $request->getVar('tim_bom'),
			'per_bom' => $request->getVar('per_bom')
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

	public function edicion($id, $request)
	{
		$data = [
			'cod_bom' => $id,
			'cod_cli_bom' => $request->getVar('cod_cli_bom'),
			'pro_bom' => $request->getVar('proyecto'),
			'des_bom' => $request->getVar('description'),
			'sta_bom' => $request->getVar('status'),
			'tim_bom' => $request->getVar('tim_bom'),
			'per_bom' => $request->getVar('per_bom')
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
}