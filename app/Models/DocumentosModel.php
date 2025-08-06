<?php

namespace App\Models;

use CodeIgniter\Model;

class DocumentosModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'documentos';
	protected $primaryKey           = 'cod_doc';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = true;
	protected $protectFields        = true;
	protected $allowedFields        = ['nom_doc_esp', 'nom_doc_ing', 'fecha', 'des_doc_esp', 'des_doc_ing', 'url_doc', 'ord_doc', 'cod_men_doc'];

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

		$array = ['cod_doc as id', 'nom_doc_esp', 'nom_doc_ing', 'fecha', 'des_doc_esp', 'des_doc_ing', 'url_doc', 'ord_doc', 'cod_men_doc'];

		// if ($id == 0) {
		// 	$data = $this->select($array)->join('menus', 'menus.cod_men=cod_men_doc	')->orderby('nom_doc_esp, ord_doc', 'ASC')->findAll();
		// } else {
		// 	$data = $this->select($array)->join('menus', 'menus.cod_men=cod_men_doc	')->orderby('cod_men_doc, ord_doc', 'ASC')->find($id);
		// }

		if ($id == 0) {
			$data = $this->select($array)->orderby('nom_doc_esp, ord_doc', 'ASC')->findAll();
		} else {
			$data = $this->select($array)->orderby('cod_men_doc, ord_doc', 'ASC')->find($id);
		}

		return $data;
	}

	public function guardar($request)
	{
		$data = [
			'nom_doc_esp' => $request->getVar('nom_doc_esp'),
			'nom_doc_ing' => $request->getVar('nom_doc_ing'),
			'fecha' => $request->getVar('fecha'),
			'des_doc_esp' => $request->getVar('des_doc_esp'),
			'des_doc_ing' => $request->getVar('des_doc_ing'),
			'url_doc' => $request->getVar('url_doc'),
			'ord_doc' => $request->getVar('ord_doc'),
			'cod_men_doc' => $request->getVar('cod_men_doc')
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
			'cod_doc' => $id,
			'nom_doc_esp' => $request->getVar('nom_doc_esp'),
			'nom_doc_ing' => $request->getVar('nom_doc_ing'),
			'fecha' => $request->getVar('fecha'),
			'des_doc_esp' => $request->getVar('des_doc_esp'),
			'des_doc_ing' => $request->getVar('des_doc_ing'),
			'url_doc' => $request->getVar('url_doc'),
			'ord_doc' => $request->getVar('ord_doc'),
			'cod_men_doc' => $request->getVar('cod_men_doc')
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




