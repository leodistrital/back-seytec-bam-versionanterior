<?php

namespace App\Models;

use CodeIgniter\Model;

class MenueventosApiModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'menueventos';
	protected $primaryKey           = 'cod_mne';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = true;
	protected $protectFields        = true;
	protected $allowedFields        = ["cod_edi_mne", "cod_pad_mne", "slu_mne", "tit_mne", "tit_mne_ing", "des_mne", "des_mne_ing", "dla_mne", "dla_mne_ing", "img_mne", "adj_mne", "ord_mne", "pla_mne", "ctp_mne", "fon_mne", "con_ext_mne"];

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
		$array = ["cod_mne as id" ,"cod_edi_mne", "cod_pad_mne", "slu_mne", "tit_mne", "tit_mne_ing", "des_mne", "des_mne_ing", "dla_mne", "dla_mne_ing", "img_mne", "adj_mne", "ord_mne", "pla_mne", "ctp_mne", "fon_mne", "con_ext_mne", " (select tit_mne from menueventos as tabla where tabla.cod_mne = menueventos.cod_pad_mne) as menupadre"," (select ano_edi from ediciones as tabla where tabla.cod_edi = menueventos.cod_edi_mne) as edicion"];

		// $ordeerarray=['cod_edi_mne' => 'desc'];
		if ($id == 0) {
			$data = $this->select($array)->orderBy('cod_edi_mne', 'DESC')->orderBy('ord_mne', 'ASC')->findAll();
		} else {
			$data = $this->select($array)->find($id);
		}
		return $data;
	}

	public function guardar($request)
	{

		if(empty($request->getVar('cod_pad_mne'))){
			$cod_pad_mne=0;
		} else {
			$cod_pad_mne=$request->getVar('cod_pad_mne');
		} 

		
		$data = [
			'cod_edi_mne' => $request->getVar('cod_edi_mne'), 'cod_pad_mne' => $cod_pad_mne, 'slu_mne' => mb_url_title($request->getVar('tit_mne')), 'tit_mne' => $request->getVar('tit_mne'), 'tit_mne_ing' => $request->getVar('tit_mne_ing'), 'des_mne' => $request->getVar('des_mne'), 'des_mne_ing' => $request->getVar('des_mne_ing'), 'dla_mne' => $request->getVar('dla_mne'), 'dla_mne_ing' => $request->getVar('dla_mne_ing'), 'img_mne' => $request->getVar('img_mne'), 'adj_mne' => $request->getVar('adj_mne'), 'ord_mne' => $request->getVar('ord_mne'), 'pla_mne' => $request->getVar('pla_mne'), 'ctp_mne' => $request->getVar('ctp_mne'), 'fon_mne' => $request->getVar('fon_mne'), 'con_ext_mne' => $request->getVar('con_ext_mne')

		];

		// print_r($data);

		$id = $this->insert($data);
		return $id;
		// return 1;
	}

	public function edicion($id, $request)
	{
		$data = [
			'cod_mne' => $id,
			'cod_edi_mne' => $request->getVar('cod_edi_mne'), 'cod_pad_mne' => $request->getVar('cod_pad_mne'), 'slu_mne' => $request->getVar('slu_mne'), 'tit_mne' => $request->getVar('tit_mne'), 'tit_mne_ing' => $request->getVar('tit_mne_ing'), 'des_mne' => $request->getVar('des_mne'), 'des_mne_ing' => $request->getVar('des_mne_ing'), 'dla_mne' => $request->getVar('dla_mne'), 'dla_mne_ing' => $request->getVar('dla_mne_ing'), 'img_mne' => $request->getVar('img_mne'), 'adj_mne' => $request->getVar('adj_mne'), 'ord_mne' => $request->getVar('ord_mne'), 'pla_mne' => $request->getVar('pla_mne'), 'ctp_mne' => $request->getVar('ctp_mne'), 'fon_mne' => $request->getVar('fon_mne'), 'con_ext_mne' => $request->getVar('con_ext_mne')

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
		$array = ["cod_mne as value", " (select ano_edi from ediciones as tabla where tabla.cod_edi = menueventos.cod_edi_mne) as edicion" , "tit_mne  as name" ];
		$data = $this->select($array)->orderBy('cod_edi_mne', 'DESC')->orderBy('ord_mne', 'ASC')->findAll();
		$totaldata = [];
		foreach ($data as $item):
			$itemtotal = [ 'value' => $item['value'], 'name' => $item['name']. ' - '. $item['edicion']];
			 array_push($totaldata, $itemtotal);
		endforeach;
		return $totaldata;
	}
}
/* fecha de creacion: 12-12-2022 11:46:38 am */