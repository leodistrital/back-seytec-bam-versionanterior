<?php
namespace App\Models\web;
use CodeIgniter\Model;

class EdicionesModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table = 'ediciones';
	protected $primaryKey           = 'cod_edi';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = true;
	protected $protectFields        = true;
	protected $allowedFields =
	['ano_edi','tit_edi','des_edi','tit_edi_ing','des_edi_ing','act_edi','sti_edi','sti_edi_ing','img_edi','pro_edi','gal_edi',
	"ad1_edi", "ad2_edi", "ad3_edi", "ad4_edi", "ad5_edi", "im1_edi", "im2_edi", "im3_edi", "im4_edi", "im5_edi"];

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
	
}