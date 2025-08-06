<?php

namespace App\Models;

use CodeIgniter\Model;


class PartidaModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'partida';
	protected $primaryKey           = 'cod_par';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = true;
	protected $protectFields        = true;
	protected $allowedFields        = ['nom_par', 'fac_par', 'cod_cap_par'];

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

		$array = ['cod_par as id', 'nom_par  nombre' , 'fac_par as factor'  , 'cod_cap_par', 'nom_cap as nombrecapitulo' ];
		
		if ($id == 0) {
			$data = $this->select($array)->join('capitulos','cod_cap=cod_cap_par','left')->findAll();
		} else {
			$data = $this->select($array)->join('capitulos','cod_cap=cod_cap_par','left')->find($id);
			
		}
		return $data;
	}

	public function guardar($request)
	{

		$data = [
			'nom_par' => $request->getVar('nombre'),
			'fac_par' => $request->getVar('factor'),
			'cod_cap_par' => $request->getVar('cod_cap_par')
			
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
			'cod_par' => $id,
			'nom_par' => $request->getVar('nombre'),
			'fac_par' => $request->getVar('factor'),
			'cod_cap_par' => $request->getVar('cod_cap_par')
		];

		//print_r($data);
		
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