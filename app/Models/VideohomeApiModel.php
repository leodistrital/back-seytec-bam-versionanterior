<?php
namespace App\Models;
use CodeIgniter\Model;

class VideohomeApiModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'videohome';
	protected $primaryKey           = 'cod_vid';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = true;
	protected $protectFields        = true;
	protected $allowedFields        = ["you_vid","img_vid","tit_vid","sti_vid","ent_not","tit_vid_ing","sti_vid_ing","ent_not_ing"];

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
		$array = ["cod_vid as id" , "you_vid","img_vid","tit_vid","sti_vid","ent_not","tit_vid_ing","sti_vid_ing","ent_not_ing"];
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
			'you_vid' => $request->getVar('you_vid')
,'img_vid' => $request->getVar('img_vid')
,'tit_vid' => $request->getVar('tit_vid')
,'sti_vid' => $request->getVar('sti_vid')
,'ent_not' => $request->getVar('ent_not')
,'tit_vid_ing' => $request->getVar('tit_vid_ing')
,'sti_vid_ing' => $request->getVar('sti_vid_ing')
,'ent_not_ing' => $request->getVar('ent_not_ing')

		];
		$id = $this->insert($data);
		return $id;
	}

	public function edicion($id, $request)
	{
		$data = [
			'cod_vid' => $id,
			'you_vid' => $request->getVar('you_vid')
,'img_vid' => $request->getVar('img_vid')
,'tit_vid' => $request->getVar('tit_vid')
,'sti_vid' => $request->getVar('sti_vid')
,'ent_not' => $request->getVar('ent_not')
,'tit_vid_ing' => $request->getVar('tit_vid_ing')
,'sti_vid_ing' => $request->getVar('sti_vid_ing')
,'ent_not_ing' => $request->getVar('ent_not_ing')

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
		$array = ["you_vid","img_vid","tit_vid","sti_vid","ent_not","tit_vid_ing","sti_vid_ing","ent_not_ing"];
		$data = $this->select($array)->findAll();
		return $data;
	}
}
/* fecha de creacion: 11-13-2022 01:35:39 am */