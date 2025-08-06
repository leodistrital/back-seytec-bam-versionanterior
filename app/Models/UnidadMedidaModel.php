<?php

namespace App\Models;

use CodeIgniter\Model;


class UnidadMedidaModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'unidadesmedida';
	protected $primaryKey           = 'cod_uni';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = true;
	protected $protectFields        = true;
	protected $allowedFields        = ['nom_uni',  'sig_uni'];

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
		$array = ['cod_uni as id', 'nom_uni  nombre'  ];
		
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
			'nom_uni' => $request->getVar('nombre'),
			'sig_uni' => $request->getVar('sigla'),
		];

		$codigo  = $request->getVar('codigo');

		if ($codigo == 0) {
			$id = $this->insert($data);
		}
		if ($codigo > 0) {
			$id = $this->edicion($codigo, $data);
		}
		return $id;
		// return '1';
	}

	public function edicion($id, $request)
	{
		$data = [
			'cod_uni' => $id,
			'nom_uni' => $request->getVar('nombre')
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
		$array = ['cod_uni  value'  ,'nom_uni  name', 'sig_uni code' ];
		$data = $this->select($array)->findAll();
		return $data;
	}
}