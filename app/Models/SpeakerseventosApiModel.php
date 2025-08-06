<?php
namespace App\Models;
use CodeIgniter\Model;

class SpeakerseventosApiModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'speakerseventos';
	protected $primaryKey           = 'cod_spe';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = true;
	protected $protectFields        = true;
	protected $allowedFields        = ["cod_ave_spe","nom_spe","per_spe","per_spe_ing","img_spe","ord_spe","tip_spe"];

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
		$array = ['cod_spe as id', "cod_ave_spe","nom_spe","per_spe","per_spe_ing","img_spe","ord_spe","tip_spe"];
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
			'cod_ave_spe' => $request->getVar('cod_ave_spe')
,'nom_spe' => $request->getVar('nom_spe')
,'per_spe' => $request->getVar('per_spe')
,'per_spe_ing' => $request->getVar('per_spe_ing')
,'img_spe' => $request->getVar('img_spe')
,'ord_spe' => $request->getVar('ord_spe')
,'tip_spe' => $request->getVar('tip_spe')

		];
		$id = $this->insert($data);
		return $id;
	}

	public function edicion($id, $request)
	{
		$data = [
			'cod_spe' => $id,
			'cod_ave_spe' => $request->getVar('cod_ave_spe')
,'nom_spe' => $request->getVar('nom_spe')
,'per_spe' => $request->getVar('per_spe')
,'per_spe_ing' => $request->getVar('per_spe_ing')
,'img_spe' => $request->getVar('img_spe')
,'ord_spe' => $request->getVar('ord_spe')
,'tip_spe' => $request->getVar('tip_spe')

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
		$array = ["cod_ave_spe","nom_spe","per_spe","per_spe_ing","img_spe","ord_spe","tip_spe"];
		$data = $this->select($array)->findAll();
		return $data;
	}
	public function grupospeakeers($grupo)
	{
	// echo $grupo;
	$array = ['cod_spe as id' ,"cod_ave_spe","nom_spe","per_spe","per_spe_ing","img_spe","ord_spe","tip_spe" , 'tit_ave'];
	$data = $this->select($array)->join('agendaeventos', 'cod_ave_spe=cod_ave', 'left')->where('tip_spe',
	$grupo)->orderBy('cod_ave_spe,ord_spe ')->findAll();
	return $data;
	}
}
/* fecha de creacion: 01-16-2023 03:53:52 pm */