<?php

namespace App\Controllers;

use App\Controllers\MyApiRest;
use App\Models\AliadosModel;
use App\Models\CifrasModel;
use App\Models\ContenidoModel;
use App\Models\DocumentosModel;
use App\Models\EnlacesModel;
use App\Models\EquiposModel;
use App\Models\MenusModel;
use App\Models\PerfilesModel;

class Contenido extends  MyApiRest
{
	protected $format    = 'json';

	public function __construct()
	{
		$this->model = $this->setModel(new ContenidoModel());
	}

	public function listarQuienes($menupadre, $param)
	{
		$data = [];
		//buscar nombre menu
		$menuPadreResult = $this->buscarMenu($menupadre);
		//buscar nombre y codigo submenu
		$subMenuResult = $this->buscarMenu($param);
		//buscar contenido  por el codigo del submenu
		$contenidoResut = $this->buscarContenido($subMenuResult[0]['cod_men']);

		$data = $this->datosAdicionales($subMenuResult[0]['cod_men'], $data, $subMenuResult[0]['menupadre']);

		//set respuesta
		$data['miga'] = "RBSAS / " . $menuPadreResult[0]['nombre'] . " / ";
		$data['titulo'] = $contenidoResut[0]['titulo'];
		$data['imagen'] = "/images/contenido/" . $contenidoResut[0]['imagen'];
		$data['mensaje'] = $contenidoResut[0]['descripcion'];
		$data['doctexto'] = $contenidoResut[0]['doctexto'];
		$datos[0] =  $data;
		// print_r($data);
		return $this->genericResponse($datos);
	}

	private function datosAdicionales($idMenu, $data, $idMenuPadre = 0)
	{
		// echo $idMenu . "+++++" . $idMenuPadre;
		($idMenu == 4) ?  $data['perfiles'] = $this->buscarPerfiles(1) : $a = '';
		($idMenu == 5) ?  $data['perfiles'] = $this->buscarPerfiles(2) : $a = '';
		$data['listadoc'] = $this->buscarDocumentos($idMenu);
		if ($idMenuPadre == 8) { // cifras
			$data['cifras'] = $this->buscarCifras($idMenu);
			$data['cifras'][0]['documentos'] = $data['listadoc'];
			unset($data['listadoc']);
			$data['cifras'][0]['enlaces'] = $this->buscarEnlaces($idMenu);
		}

		if ($idMenuPadre == 16) { // Aliados logos

			$data['aliadosprin'] = $this->buscarAliados($idMenu, 1);
			$data['aliadossec'] = $this->buscarAliados($idMenu, 2);
		}
		($idMenu == 25) ?  $data['equipos'] = $this->buscarEquipo() : $a = '';


		// print_r($datos);
		return $data;
	}

	private function buscarEquipo()
	{
		$model = new  EquiposModel();
		$model->select("cod_equ, concat('/images/contenido/', img_equ ) as imagen ,  nom_equ_esp as nombre,  des_equ_esp as desc, obj_equ_esp as objetivo , fec_equ as  fecha");
		$model->orderBy('ord_equ', 'ASC');
		$datos = $model->findAll();
		$i = 0;
		foreach ($datos as &$equipo) {

			$enlacesEquipo = $this->buscarEnlaces($equipo['cod_equ'], $tipo = 2);
			(count($enlacesEquipo) > 0) ? $datos[$i]['enalces'] = $enlacesEquipo : $a = '';
			unset($datos[$i]['cod_equ']);
			$i++;
		}
		return $datos;
	}

	private function buscarAliados($menu, $tipo)
	{
		$model = new AliadosModel();
		$model->select(" concat('/images/aliados/', img_ali ) as img ,  nom_ali as nombre, tip_ali_esp  as tipoalianza, des_ali_esp as desc ");
		$model->orderBy('ord_ali', 'ASC');
		$datos = $model->where(['menu_ali' => $menu, 'par_ali' => $tipo])->findAll();
		return $datos;
	}

	private function buscarEnlaces($menu, $tipo = 1)
	{
		$model = new EnlacesModel();
		$model->select(" nom_enl_esp as nombre, url_enl as link   ");
		$model->orderBy('ord_enl', 'ASC');
		$datos = $model->where(['cod_men_enl' => $menu, 'tip_enl' => $tipo])->findAll();
		return $datos;
	}

	private function buscarCifras($menu)
	{
		$model = new CifrasModel();
		$model->select("concat('/images/site/',img_cif) as imagen, tit_cif_esp  as titulo, fec_cif as fecha, dec_cif_esp  as desc   ");
		$datos = $model->where('cod_men_cif', $menu)->findAll();
		return $datos;
	}

	private function buscarDocumentos($menu)
	{
		$model = new DocumentosModel();
		$model->select("concat('/api/documentos/',url_doc) as link, nom_doc_esp as nombre,  fecha as fecha, des_doc_esp as desc   ");
		$model->orderBy('ord_doc', 'ASC');
		$datos = $model->where('cod_men_doc', $menu)->findAll();
		return $datos;
	}
	private function buscarPerfiles($tipo)
	{
		$model = new PerfilesModel();
		$model->select("concat('/images/contenido/',img_per) as img, nom_per_esp as nombre,  car_per_esp as cargo, des_per_esp as desc");
		$datos = $model->where('tip_per', $tipo)->findAll();
		return $datos;
	}

	private function buscarMenu($slug)
	{
		$menuModel = new MenusModel();
		$menuModel->select('cod_men,  nom_men_esp as nombre , pad_men as menupadre');
		$datos = $menuModel->where('slu_men', $slug)->findAll();
		return $datos;
	}
	private function buscarContenido($idMenu = 0)
	{

		$this->model->select('img_con as imagen, tit_con_esp as titulo,  des_con_esp as descripcion, vid_con as video, doc_con_esp as doctexto');
		$datos = $this->model->where('cod_men_con', $idMenu)->findAll();
		return $datos;
	}
	public function index()
	{
	}
}