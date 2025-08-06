<?php

namespace App\Models\web;

use CodeIgniter\Model;

class Proyectos extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'proyectos';
	protected $primaryKey           = 'cod_pro';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = true;
	protected $protectFields        = true;
	protected $allowedFields        = [
		'cod_pro',
		'cod_cat_pro',
		'nom_pro',
		'nom_pro_ing',
		'per_pro',
		'gen_pro',
		'gen_pro_ing',
		'dur_pro',
		'pdc_pro',
		'sin_pro',
		'sin_pro_ing',
		'img_pro', 'ord_pro' , 'pdc_lin_pro'
	];

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

		$array = [

			'cod_cat_pro',
			'nom_pro',
			'nom_pro_ing',
			'per_pro',
			'gen_pro',
			'gen_pro_ing',
			'dur_pro',
			'pdc_pro',
			'sin_pro',
			'sin_pro_ing',
			'img_pro', 'ord_pro'
		];

		if ($id == 0) {
			$data = $this->select($array)->findAll();
		} else {
			$data = $this->select($array)->find($id);
		}

		return $data;
	}
}
