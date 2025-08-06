<?php

namespace App\Models;


use CodeIgniter\Model;

class AliadosacreditacionApiModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'aliadosacreditacion';
	protected $primaryKey           = 'cod_alc';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = true;
	protected $protectFields        = true;
	protected $allowedFields        = ["nom_alc", "nit_alc", "cup_alc", 'tar_alc'];

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
		$array = ["cod_alc as id", "nom_alc", "nit_alc", "cup_alc", 'tar_alc'];
		if ($id == 0) {
			$data = $this->select($array)->findAll();
		} else {
			$data = $this->select($array)->find($id);
		}
		return $data;
	}

	public function guardar($request)
	{

		$data = [
			'nom_alc' => $request->getVar('nom_alc'),
			'nit_alc' => $request->getVar('nit_alc'),
			'cup_alc' => $request->getVar('cup_alc'),
			'tar_alc' => $request->getVar('tar_alc')
		];
		$id = $this->insert($data);

		$this->generarCodigos($id, $request->getVar('cup_alc'));

		return $id;
	}

	public function edicion($id, $request)
	{
		$data = [
			'cod_alc' => $id,
			'nom_alc' => $request->getVar('nom_alc'),
			'nit_alc' => $request->getVar('nit_alc'),
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
		$array = ["nom_alc", "nit_alc", "cup_alc"];
		$data = $this->select($array)->findAll();
		return $data;
	}


	function generarCodigos($idalido, $cupos)
	{

		$codigosAcreditacion = new CodigosacreditacionApiModel();
		// echo $idalido . ' - ' . $cupos;
		$DesdeLetra = "e";
		$HastaLetra = "u";
		$DesdeNumero = 100001;
		$HastaNumero = 900000;

		$letraAleatoria1 = chr(rand(ord($DesdeLetra), ord($HastaLetra)));
		$letraAleatoria2 = chr(rand(ord($DesdeLetra), ord($HastaLetra)));
		$numeroAleatorio = rand($DesdeNumero, $HastaNumero);
		// echo $codigo = strtoupper($letraAleatoria1) . strtoupper($letraAleatoria2) . '-' . $numeroAleatorio;

		for ($i = 0; $i <  $cupos; $i++) {
			$letraAleatoria1 = chr(rand(ord($DesdeLetra), ord($HastaLetra)));
			$letraAleatoria2 = chr(rand(ord($DesdeLetra), ord($HastaLetra)));
			$numeroAleatorio = rand($DesdeNumero, $HastaNumero);
			$codigo = strtoupper($letraAleatoria1) . strtoupper($letraAleatoria2) . '-' . $numeroAleatorio;
			$data = [
				'cod_ali_coa' => $idalido, 
				'sec_coa' => $codigo 
			];
			// print_r($data);
			$id = $codigosAcreditacion->insert($data);
		}
	}
}
/* fecha de creacion: 05-22-2023 01:39:29 pm */