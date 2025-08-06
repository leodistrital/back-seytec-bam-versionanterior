<?php

namespace App\Models;

use CodeIgniter\Model;

class ProyectosApiModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'proyectos';
	protected $primaryKey           = 'cod_pro';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = true;
	protected $protectFields        = true;
	protected $allowedFields        = ["cod_cat_pro", "nom_pro", "nom_pro_ing", "per_pro", "gen_pro", "gen_pro_ing", "dur_pro", "pdc_pro", "pdc_lin_pro", "sin_pro", "sin_pro_ing", "con_pro", "con_pro_ing", "img_pro", "ord_pro"];

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
		$array = ["cod_pro as id", "cod_cat_pro", "nom_pro", "nom_pro_ing", "per_pro", "gen_pro", "gen_pro_ing", "dur_pro", "pdc_pro", "pdc_lin_pro", "sin_pro", "sin_pro_ing", "con_pro", "con_pro_ing", "img_pro", "ord_pro", "concat(nom_cat, ' ', ano_edi) as categoraia"];
		if ($id == 0) {
			$data = $this->select($array)->join('categorias', 'cod_cat_pro=cod_cat', 'left')->join('ediciones', 'edi_cat=cod_edi', 'left')->orderby('nom_cat, ord_pro')->findAll();
		} else {
			$data = $this->select($array)->join('categorias', 'cod_cat_pro=cod_cat', 'left')->join('ediciones', 'edi_cat=cod_edi', 'left')->orderby('nom_cat, ord_pro')->find($id);
		}
		return $data;
	}

	public function guardar($request)
	{

		$data = [
			'cod_cat_pro' => $request->getVar('cod_cat_pro'), 'nom_pro' => $request->getVar('nom_pro'), 'nom_pro_ing' => $request->getVar('nom_pro_ing'), 'per_pro' => $request->getVar('per_pro'), 'gen_pro' => $request->getVar('gen_pro'), 'gen_pro_ing' => $request->getVar('gen_pro_ing'), 'dur_pro' => $request->getVar('dur_pro'), 'pdc_pro' => $request->getVar('pdc_pro'), 'pdc_lin_pro' => $request->getVar('pdc_lin_pro'), 'sin_pro' => $request->getVar('sin_pro'), 'sin_pro_ing' => $request->getVar('sin_pro_ing'), 'con_pro' => $request->getVar('con_pro'), 'con_pro_ing' => $request->getVar('con_pro_ing'), 'img_pro' => $request->getVar('img_pro'), 'ord_pro' => $request->getVar('ord_pro')

		];
		$id = $this->insert($data);
		return $id;
	}

	public function edicion($id, $request)
	{
		$data = [
			'cod_pro' => $id,
			'cod_cat_pro' => $request->getVar('cod_cat_pro'), 'nom_pro' => $request->getVar('nom_pro'), 'nom_pro_ing' => $request->getVar('nom_pro_ing'), 'per_pro' => $request->getVar('per_pro'), 'gen_pro' => $request->getVar('gen_pro'), 'gen_pro_ing' => $request->getVar('gen_pro_ing'), 'dur_pro' => $request->getVar('dur_pro'), 'pdc_pro' => $request->getVar('pdc_pro'), 'pdc_lin_pro' => $request->getVar('pdc_lin_pro'), 'sin_pro' => $request->getVar('sin_pro'), 'sin_pro_ing' => $request->getVar('sin_pro_ing'), 'con_pro' => $request->getVar('con_pro'), 'con_pro_ing' => $request->getVar('con_pro_ing'), 'img_pro' => $request->getVar('img_pro'), 'ord_pro' => $request->getVar('ord_pro')

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
		$array = ["cod_cat_pro", "nom_pro", "nom_pro_ing", "per_pro", "gen_pro", "gen_pro_ing", "dur_pro", "pdc_pro", "pdc_lin_pro", "sin_pro", "sin_pro_ing", "con_pro", "con_pro_ing", "img_pro", "ord_pro"];
		$data = $this->select($array)->findAll();
		return $data;
	}
}
/* fecha de creacion: 12-12-2022 12:55:53 am */