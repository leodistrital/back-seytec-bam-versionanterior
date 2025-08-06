<?php
namespace App\Models;
use CodeIgniter\Model;

class NoticiasApiModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'noticias';
	protected $primaryKey           = 'cod_not';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = true;
	protected $protectFields        = true;
	protected $allowedFields        = ["tip_not","img_not","lin_not","fue_not","tit_not","fec_not","ent_not","tit_not_ing","ent_not_ing","ord_not"];

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
		$array = ["cod_not as id" , "tip_not","img_not","lin_not","fue_not","tit_not","fec_not","ent_not","tit_not_ing","ent_not_ing","ord_not"];
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
			'tip_not' => $request->getVar('tip_not')
,'img_not' => $request->getVar('img_not')
,'lin_not' => $request->getVar('lin_not')
,'fue_not' => $request->getVar('fue_not')
,'tit_not' => $request->getVar('tit_not')
,'fec_not' => $request->getVar('fec_not')
,'ent_not' => $request->getVar('ent_not')
,'tit_not_ing' => $request->getVar('tit_not_ing')
,'ent_not_ing' => $request->getVar('ent_not_ing')
,'ord_not' => $request->getVar('ord_not')

		];
		$id = $this->insert($data);
		return $id;
	}

	public function edicion($id, $request)
	{
		$data = [
			'cod_not' => $id,
			'tip_not' => $request->getVar('tip_not')
,'img_not' => $request->getVar('img_not')
,'lin_not' => $request->getVar('lin_not')
,'fue_not' => $request->getVar('fue_not')
,'tit_not' => $request->getVar('tit_not')
,'fec_not' => $request->getVar('fec_not')
,'ent_not' => $request->getVar('ent_not')
,'tit_not_ing' => $request->getVar('tit_not_ing')
,'ent_not_ing' => $request->getVar('ent_not_ing')
,'ord_not' => $request->getVar('ord_not')

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
		$array = ["tip_not","img_not","lin_not","fue_not","tit_not","fec_not","ent_not","tit_not_ing","ent_not_ing","ord_not"];
		$data = $this->select($array)->findAll();
		return $data;
	}

	public function gruponoticias($grupo)
	{
		$array =  ["cod_not as id",  "tip_not", "img_not", "lin_not", "fue_not", "tit_not", "fec_not", "ent_not", "tit_not_ing", "ent_not_ing", "ord_not"];
		$data = $this->select($array)->where('tip_not', $grupo)->orderBy('ord_not')->findAll();
		return $data;
	}
}
/* fecha de creacion: 11-12-2022 11:38:29 pm */