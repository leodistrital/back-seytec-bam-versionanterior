<?php

namespace App\Models\web;

use CodeIgniter\Model;

class AgendaeventosregionesModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table = 'agendaeventosregiones';
	protected $primaryKey           = 'cod_ave';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = true;
	protected $protectFields        = true;
	protected $allowedFields = ['cod_reg_ave' , "tip_eve_ave", "tit_ave", "tit_ave_ing", "des_ave", "des_ave_ing",
	"fec_ave", "hor_ave", "not_ave", "nor_ave_ing", "pre_ave", "pre_ave_ing", "vir_ave", "url_ave", "lug_ave", "img_ave", 'log_ave'];

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

	$array = ['cod_sit as id', 'fac_sit', 'twt_sit', 'lla_sit', 'mai_sit', 'dir_sit', 'ciu_sit', 'log_sit', 'nom_sit'];

	if ($id == 0) {
	$data = $this->select($array)->findAll();
	} else {
	$data = $this->select($array)->find($id);
	}

	return $data;
	}

}
/* fecha de creacion: 12-12-2022 11:14:11 am */