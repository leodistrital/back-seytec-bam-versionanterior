<?php

namespace App\Models;

use CodeIgniter\Model;


class DetsubpartidasModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'detsubpartidas';
	protected $primaryKey           = 'cod_dsu';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = true;
	protected $protectFields        = true;
	protected $allowedFields        = ['cod_par_dsu' ,'cod_sub_dsu' ];

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

		$array = ['cod_dsu as id', 'cod_par_dsu partida'  ,'cod_sub_dsu  subpartida', "nom_pla as  nombsubpartida"];
		
		if ($id == 0) {
			$data = $this->select($array)->findAll();
		} else {
			$data = $this->select($array)->join('plantilla' ,'cod_pla=cod_sub_dsu', 'left' )->where('cod_par_dsu',$id)->findAll();
		}

		return $data;
	}

	public function guardar($request)
	{
		$data = [
			'cod_par_dsu' => $request->getVar('idPartida'),
			'cod_sub_dsu' => $request->getVar('idSubpartida')
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
			'cod_dsu' => $id,
			'cod_par_dsu' => $request->getVar('idPartida'),
			'cod_sub_dsu' => $request->getVar('idSubpartida')
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