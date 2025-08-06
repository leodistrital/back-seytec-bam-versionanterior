<?php
namespace App\Models;
use CodeIgniter\Model;

class AliadosApiModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'aliados';
	protected $primaryKey           = 'cod_ali';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = true;
	protected $protectFields        = true;
	protected $allowedFields        = ["nom_ali","img_ali","tip_ali_esp","tip_ali_ing","des_ali_esp","des_ali_ing","menu_ali","par_ali","ord_ali","url_ali"];

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
		$array = ["cod_ali  as id ","nom_ali","img_ali","tip_ali_esp","tip_ali_ing","des_ali_esp","des_ali_ing","menu_ali","par_ali","ord_ali","url_ali", 'nom_men_esp'];
		if ($id == 0) {
			$data = $this->select($array)->join('menus','aliados.menu_ali=menus.cod_men')->orderBy('menu_ali asc , ord_ali asc')->findAll();
		} else {
			$data = $this->select($array)->join('menus','aliados.menu_ali=menus.cod_men')->orderBy('menu_ali asc , ord_ali asc')->find($id);
		}
		return $data;
	}

	public function guardar($request)
	{

		$data = [
			'nom_ali' => $request->getVar('nom_ali')
			,'img_ali' => $request->getVar('img_ali')
			,'tip_ali_esp' => $request->getVar('tip_ali_esp')
			,'tip_ali_ing' => $request->getVar('tip_ali_ing')
			,'des_ali_esp' => $request->getVar('des_ali_esp')
			,'des_ali_ing' => $request->getVar('des_ali_ing')
			,'menu_ali' => $request->getVar('menu_ali')
			,'par_ali' => $request->getVar('par_ali')
			,'ord_ali' => $request->getVar('ord_ali')
			,'url_ali' => $request->getVar('url_ali')

		];
		// print_r($data); 
		$id = $this->insert($data);
		return $id;
	}

	public function edicion($id, $request)
	{
		$data = [
			'cod_ali' => $id
			,'nom_ali' => $request->getVar('nom_ali')
			,'img_ali' => $request->getVar('img_ali')
			,'tip_ali_esp' => $request->getVar('tip_ali_esp')
			,'tip_ali_ing' => $request->getVar('tip_ali_ing')
			,'des_ali_esp' => $request->getVar('des_ali_esp')
			,'des_ali_ing' => $request->getVar('des_ali_ing')
			,'menu_ali' => $request->getVar('menu_ali')
			,'par_ali' => $request->getVar('par_ali')
			,'ord_ali' => $request->getVar('ord_ali')
			,'url_ali' => $request->getVar('url_ali')

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
		$array = ["nom_ali","img_ali","tip_ali_esp","tip_ali_ing","des_ali_esp","des_ali_ing","menu_ali","par_ali","ord_ali","url_ali"];
		$data = $this->select($array)->findAll();
		return $data;
	}
}
/* fecha de creacion: 08-10-2022 02:29:30 pm */