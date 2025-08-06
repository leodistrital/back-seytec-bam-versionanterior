<?php

namespace App\Models;

use CodeIgniter\Model;


class UserModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'usuarios';
	protected $primaryKey           = 'cod_usu';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = true;
	protected $protectFields        = true;
	protected $allowedFields        = ['nom_usu' , 'mai_usu', 'pas_usu', 'tel_usu', 'car_usu'  ];

	// Dates
	protected $useTimestamps        = false;
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

		$array = ['nom_usu as nombre ' , 'mai_usu as emial', 'pas_usu as pass', 'tel_usu as tel', 'car_usu as cargo'];
		
		if ($id == 0) {
			$data = $this->select($array)->join('unidadesmedida' ,'cod_uni_ite=cod_uni', 'left' )->findAll();
		} else {
			$data = $this->select($array)->join('unidadesmedida' ,'cod_uni_ite=cod_uni', 'left' )->find($id);
		}

		return $data;
	}

	public function guardar($request)
	{
		$data = [
			'nom_usu' => $request->getVar('nombre'),
			'mai_usu' => $request->getVar('emial'),
			'pas_usu' => $request->getVar('pass'),
			'tel_usu' => $request->getVar('tel'),
			'car_usu' => $request->getVar('cargo'),
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
			'cod_usu' => $id,
			'nom_usu' => $request->getVar('nombre'),
			'mai_usu' => $request->getVar('emial'),
			'pas_usu' => $request->getVar('pass'),
			'tel_usu' => $request->getVar('tel'),
			'car_usu' => $request->getVar('cargo'),
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
		$array = ['cod_usu  value', 'nom_usu  name', 'nom_usu code'];
		$data = $this->select($array)->findAll();
		return $data;
	}


}