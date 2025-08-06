<?php

namespace App\Controllers;

// use App\Models\MenusModel;
// use App\Models\SliderModel;
// use App\Models\AliadosModel;
// use App\Controllers\MyApiRest;
// use App\Models\CifrasModel;
// use App\Models\ContenidoModel;
// use App\Models\DocumentosModel;
// use App\Models\EquiposModel;
// use App\Models\PerfilesModel;
// use App\Models\SitioApiModel;



class Home extends  MyApiRest
{
	protected $format    = 'json';

	public function __construct()
	{
		// $this->model = $this->setModel(new SliderModel());
		//$this->aliados = new AliadosModel();
	}

	public function index()
	{
		// $slider['sliderImagen'] = $this->model->where('tip_sli',1)->orderBy('ord_sli')->findAll();
		// $slider['sliderTexto'] = $this->model->where('tip_sli',2)->orderBy('ord_sli')->findAll();
		// return view('home', ['sliders' =>$slider]);
		return view('home');
	}

	// private function tiposlider($tipo = 1, $ruta = '')
	// {
	// 	if ($tipo == 1) $this->model->select(" concat('$ruta',img_sli_esp) as image ");
	// 	if ($tipo == 2) $this->model->select("tex_sli_esp as mensaje ");
	// 	$this->model->where('tip_sli', $tipo);
	// 	$this->model->orderBy('ord_sli', 'ASC');
	// 	$datos = $this->model->findAll();
	// 	return $datos;
	// }

	// private function aliadoHome($ruta = '')
	// {
	// 	$this->aliados->select("nom_ali as nombre , concat('$ruta',img_ali) as logo, url_ali as url  ");
	// 	$this->aliados->where('par_ali', 1);
	// 	$this->aliados->orderBy('ord_ali', 'ASC');
	// 	$datos = $this->aliados->findAll();
	// 	return $datos;
	// }

	// public function getMenu()
	// {
	// 	$menuModel = new MenusModel();
	// 	$menus = $menuModel->listatardatos();
	// 	return view('components/menu', ['menus' => $menus]);
	// }

	// public function getSubMenu($codigoMenu)
	// {
	// 	$menuModel = new MenusModel();
	// 	$submenus = $menuModel->listatardatos($codigoMenu);
	// 	return view('components/submenu', ['submenus' => $submenus]);
	// }


	// public function contenido($slug)
	// {
	// 	$contenidoModel =  new ContenidoModel();
	// 	$contenido = $contenidoModel->getContenido($slug);
	// 	return view('contenido', ['contenido' => $contenido[0]]);
	// }


	// public function getContenidoSeccion($contenido)
	// {
	// 	return view('components/contenidoSecccion', ['contenido' => $contenido]);
	// }


	// public function getBannerSeccion($contenido)
	// {
	// 	return view('components/bannerVal', ['contenido' => $contenido]);
	// }

	// public function getPersonas($tipo)
	// {
	// 	$contenidoModel =  new PerfilesModel();
	// 	$personas = $contenidoModel->listatipoPerfil($tipo);
	// 	return view('secciones/personas', ['personas' => $personas]);
	// }


	// public function getCorporativo()
	// {
	// 	$documentosModel =  new DocumentosModel();
	// 	$documentos = $documentosModel->lista(5);
	// 	return view('secciones/documentos', ['documentos' => $documentos]);
	// }


	// public function getListaCifras($codigoCifa)
	// {
		
	// 	//echo $codigoCifa."+++++++++";
	// 	//exit;
	// 	$cifrasModel =  new CifrasModel();
	// 	$cifras = $cifrasModel->lista($codigoCifa['codigoCifra']);
	// 	//print_r($cifras);
	// 	if(count($cifras)>0){
	// 		return view('secciones/imagenes', ['cifras' => $cifras]);	
	// 	} else {
	// 		return '';
	// 	}
	// }

	// public function getListaImagen($codigoCifa)
	// {
	// 	//  echo " *****";
	// 	//  print_r($codigoCifa);
	// 	$cifrasModel =  new CifrasModel();
	// 	$imagen = $cifrasModel->lista($codigoCifa['codigoCifra']);
	// 	return view('secciones/imagen', ['imagen' => $imagen]);
	// }


	// public function getListaAlidados($codigoMenu)
	// {
	// 	 $AliadosModel =  new AliadosModel();
	// 	 $aliados = $AliadosModel->lista($codigoMenu);
	// 	//  print_r($aliados);
	// 	 return view('secciones/aliados', ['aliados' => $aliados , 'menu' => $codigoMenu]);
	// }

	// public function getListaGente()
	// {
	// 	 $equiposModel =  new EquiposModel();
	// 	 $equipos = $equiposModel->listatardatos();
	// 	//  print_r($equipos);
	// 	 //return '';
	// 	 return view('secciones/nuestraGente', ['equipos' => $equipos ]);
	// }

	// public function getDatosSitio()
	// {
	// 	$sitio = new SitioApiModel();
	// 	$datos = $sitio->listatardatos();
	// 	return view('components/datossitio', ['datos' => $datos]);
	// }


	
}























