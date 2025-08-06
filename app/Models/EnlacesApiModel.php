<?php
namespace App\Models;
use CodeIgniter\Model;

class EnlacesApiModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'enlaces';
	protected $primaryKey           = 'con_enl';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = true;
	protected $protectFields        = true;
	protected $allowedFields        = ["nom_enl_esp","nom_enl_ing","url_enl","ord_enl","tip_enl","cod_men_enl"];

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
		$array = ["nom_enl_esp","nom_enl_ing","url_enl","ord_enl","tip_enl","cod_men_enl"];
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
			'nom_enl_esp' => $request->getVar('nom_enl_esp')
,'nom_enl_ing' => $request->getVar('nom_enl_ing')
,'url_enl' => $request->getVar('url_enl')
,'ord_enl' => $request->getVar('ord_enl')
,'tip_enl' => $request->getVar('tip_enl')
,'cod_men_enl' => $request->getVar('cod_men_enl')

		];
		$id = $this->insert($data);
		return $id;
	}

	public function edicion($id, $request)
	{
		$data = [
			'con_enl' => $id,
			'nom_enl_esp' => $request->getVar('nom_enl_esp')
,'nom_enl_ing' => $request->getVar('nom_enl_ing')
,'url_enl' => $request->getVar('url_enl')
,'ord_enl' => $request->getVar('ord_enl')
,'tip_enl' => $request->getVar('tip_enl')
,'cod_men_enl' => $request->getVar('cod_men_enl')

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
		$array = ["nom_enl_esp","nom_enl_ing","url_enl","ord_enl","tip_enl","cod_men_enl"];
		$data = $this->select($array)->findAll();
		return $data;
	}
}
/* fecha de creacion: 08-10-2022 02:44:12 pm */