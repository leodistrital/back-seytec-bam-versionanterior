<?php

namespace App\Models;

use CodeIgniter\Model;


class ClienteModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'cliente';
	protected $primaryKey           = 'cod_cli';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = true;
	protected $protectFields        = true;
	protected $allowedFields        = ['nom_cli',  'con_cli' , 'dir_cli' , 'tel_cli' , 'rso_cli' ,  'mail_cli' , 'nit_cli' , 'obs_cli' , 'cod_usu_cli' ];

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

		$array =
		['cod_cli as id', 'nom_cli as nombre', 'con_cli as contacto', 'nit_cli	 as nit', 'mail_cli as email', 'rso_cli as rsocial' ,  'obs_cli as observaciones', 'dir_cli as direccion', 'tel_cli as telefonos', 'cod_usu_cli as responsable']; 

		if ($id == 0) {
			// $data['data'] = $this->findAll();
			$data = $this->select($array)->findAll();
		} else {
			$data = $this->select($array)->find($id);
		}

		return $data;
	}

	public function guardar($request)
	{

		$data = [
			'nom_cli' => $request->getVar('nombre'),
			'con_cli' => $request->getVar('contacto'),
			'dir_cli' => $request->getVar('direccion'),
			'tel_cli' => $request->getVar('telefonos'),
			'rso_cli' => $request->getVar('rsocial'),
			'mail_cli' => $request->getVar('email'),
			'nit_cli' => $request->getVar('nit'),
			'obs_cli' => $request->getVar('observaciones'),
			'cod_usu_cli' => $request->getVar('responsable'),
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
			'cod_cli' => $id,
			'nom_cli' => $request->getVar('nombre'),
			'con_cli' => $request->getVar('contacto'),
			'dir_cli' => $request->getVar('direccion'),
			'tel_cli' => $request->getVar('telefonos'),
			'rso_cli' => $request->getVar('rsocial'),
			'mail_cli' => $request->getVar('email'),
			'nit_cli' => $request->getVar('nit'),
			'obs_cli' => $request->getVar('observaciones'),
			'cod_usu_cli' => $request->getVar('responsable'),
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
		$array = ['cod_cli  value', 'nom_cli  name', 'nom_cli code'];
		$data = $this->select($array)->findAll();
		return $data;
	}
}