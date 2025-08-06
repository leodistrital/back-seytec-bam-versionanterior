<?php
namespace App\Models;
use CodeIgniter\Model;

class MovieApiModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'movie';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = true;
	protected $protectFields        = true;
	protected $allowedFields        = ["name","image","codTrailer","description","idGenre","idCountry","idActor","idDirector"];

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
		$array = ["name","image","codTrailer","description","idGenre","idCountry","idActor","idDirector"];
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
			'name' => $request->getVar('name')
,'image' => $request->getVar('image')
,'codTrailer' => $request->getVar('codTrailer')
,'description' => $request->getVar('description')
,'idGenre' => $request->getVar('idGenre')
,'idCountry' => $request->getVar('idCountry')
,'idActor' => $request->getVar('idActor')
,'idDirector' => $request->getVar('idDirector')

		];
		$id = $this->insert($data);
		return $id;
	}

	public function edicion($id, $request)
	{
		$data = [
			'id' => $id,
			'name' => $request->getVar('name')
,'image' => $request->getVar('image')
,'codTrailer' => $request->getVar('codTrailer')
,'description' => $request->getVar('description')
,'idGenre' => $request->getVar('idGenre')
,'idCountry' => $request->getVar('idCountry')
,'idActor' => $request->getVar('idActor')
,'idDirector' => $request->getVar('idDirector')

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
		$array = ["name","image","codTrailer","description","idGenre","idCountry","idActor","idDirector"];
		$data = $this->select($array)->findAll();
		return $data;
	}
}
/* fecha de creacion: 01-27-2023 03:56:56 pm */