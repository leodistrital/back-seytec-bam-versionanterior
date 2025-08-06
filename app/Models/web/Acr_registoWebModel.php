<?php

namespace App\Models\web;

use CodeIgniter\Model;

class Acr_registoWebModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'acr_registo';
	protected $primaryKey           = 'cod_reg';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = true;
	protected $protectFields        = true;
	protected $allowedFields        = [
		"nom_reg", "ape_reg", "mai_reg", "usu_reg", "pas_reg", "tok_reg", 'act_req', 'divpaso1',
		'cod_reg',
		'formPart',
		'nombre',
		'apellido',
		'tipodocumento',
		'numdocumento',
		'paisresidencia',
		'ciudadresidencia',
		'dirresidencia',
		'nacionalidad',
		'localidad',
		'estrato',
		'sexo',
		'identidad',
		'nacimientofecha',
		'grupoetnia',
		'indicativo',
		'telefono',
		'mailcontacto',
		'confMail',
		'idioma',
		'partifiporegiones',
		'ciudadparticipo',
		'indicativopublicacion',
		'telefonopublicacion',
		'correopublicacion',
		'sectoractividad',
		'intereses',
		'otrointeres',
		'territorio',
		'mencionepaises',
		'perfilinteres',
		'nombreempresa',
		'nit',
		'cargoempresa',
		'direccionempresa',
		'indicativoempresa',
		'telefonoempresa',
		'correoempresa',
		'paisempresa',
		'ciudadempresa',
		'actividad',
		'otraactividad',
		'webempresa',

		'fotoacreditacion',
		'certificadovinculo',
		'certificadoexistencia',
		'finacreditacion', 
		'divpaso2',
		'divpaso3',
		'divpaso4', 'wompi' , 'descuento' ,'valorasi' ,'seleccionado' , 'excluir' , 'categoriaseleccion'

	];

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
		$array = ["nom_reg", "ape_reg", "mai_reg", "usu_reg", "pas_reg", "tok_reg"];
		if ($id == 0) {
			$data = $this->select($array)->findAll();
		} else {
			$data = $this->select($array)->find($id);
		}
		return $data;
	}
}
/* fecha de creacion: 05-03-2023 10:16:17 am */