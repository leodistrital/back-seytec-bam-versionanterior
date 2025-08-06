<?php

namespace App\Models\web;

use CodeIgniter\Model;

class ListafavoritosWebModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'listafavoritos';
	protected $primaryKey           = 'cod_lif';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = true;
	protected $protectFields        = true;
	protected $allowedFields        = ["usu_lif", "nom_lif"];

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
		$array = ["usu_lif", "nom_lif"];
		if ($id == 0) {
			$data = $this->select($array)->findAll();
		} else {
			$data = $this->select($array)->find($id);
		}
		return $data;
	}


	public function buscarlistas($user)
	{
		$totallistas = $this->where('usu_lif', $user)->countAllResults();
		if ($totallistas == 0) {
			$data = [
				'usu_lif' => $user, 'nom_lif' => 'Mis Favoritos'

			];
			$confirmacion = $this->save($data);
		}
		$totallistas = $this->select('cod_lif,nom_lif')->where('usu_lif', $user)->find();
		return $totallistas;
	}

	public function guardar($usu_lif, $nom_lif)
	{

		$data = [
			'usu_lif' => $usu_lif, 'nom_lif' => $nom_lif

		];
		$id = $this->insert($data);
		return $id;
	}
}
/* fecha de creacion: 06-25-2023 09:02:55 pm */