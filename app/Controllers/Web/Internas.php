<?php

namespace App\Controllers\web;

use App\Controllers\MyApiRest;

use App\Models\web\ContenidosWebModel;
use App\Models\web\Galeriaimagenesdetalle;
use App\Models\web\Cifra;
use App\Models\web\Faq;
use App\Models\web\Aliados;
use App\Models\web\Sedes;
use App\Models\web\Equipo;


class Internas extends  MyApiRest
{
	protected $format    = 'json';

	// public function __construct($seccion)
	// {
	// $this->model = $this->setModel(new SliderModel());
	// $this->seccion = $seccion;
	// }


	public function contenidos($seccion)
	{
		$this->seccion = $seccion;
		// echo $this->seccion;
		$contenido = new ContenidosWebModel();
		$array = ['slu_con as slug', 'img_con as fondo', 'tit_con_esp as titulo', 'des_con_esp as descripcion'];
		$data = $contenido->select($array)->where('slu_con', $seccion)->find();
		// print_r($data[0]);
		return view('menu1Contenidos', ['contenido' => $data[0]]);
	}


	public function getGaleriaImagenes()
	{
		$galeria = new Galeriaimagenesdetalle();
		$array = ['img_dal as imagengal', 'des_dal as descripcion'];
		$data = $galeria->select($array)->where('sec_dal', 1)->findAll();
		return view('components/general/franjagaleria', ['imagenes' => $data]);
	}

	public function getCiras()
	{
		$cifras = new Cifra();
		$array = ['tit_cif as titulo', 'dat_cif as dato',   'tip_cif as tipo'];
		$datpcifras = $cifras->select($array)->orderBy('ord_cif')->findAll();
		$tablahtml = '';
		for ($i = 0; $i < count($datpcifras); $i++) {
			if ($datpcifras[$i]['tipo'] == 2) {
				$tabla = array_slice($datpcifras, $i, 2);
				$html = view('components/internas/filacifra', ['cifras' => $tabla, 'columna' => 2]);
				$i++;
			} else {
				$tabla = array_slice($datpcifras, $i, 4);
				$html = view('components/internas/filacifra', ['cifras' => $tabla, 'columna' => 4]);
				$i = $i + 3;
			}
			$tablahtml .= $html;
		}
		return view('components/internas/bamcifras', ['tablahtml' => $tablahtml]);
	}


	public function faq()
	{
		$faqs = new Faq();
		$array = ['pre_fac as pregunta', 'res_fac as respuesta'];
		$data = $faqs->select($array)->orderBy('ord_faq')->findAll();
		// return '';
		return view('components/internas/preguntasfrecuentes', ['faqs' => $data]);
	}

	public function aliados()
	{
		$aliados = new Aliados();
		$array = ['cat_ali as categoria', 'img_ali as imagen'];
		$data = $aliados->select($array)->orderBy('ord_ali')->findAll();
		return view('components/internas/listaaliados', ['aliados' => $data]);
	}

	public function sedes()
	{
		$sedes = new Sedes();
		$array = ['nom_sed as nombre',  'dir_sed as direccion', 'des_sed as descripcion',  'img_sed as imagen'];
		$data = $sedes->select($array)->orderBy('ord_sed')->findAll();
		return view('components/internas/listasedes', ['sedes' => $data]);
	}

	public function equipo()
	{
		$equipo = new Equipo();
		$array = ['nom_equ as nombre',  'car_equ as cargo',   'img_equ as imagen'];
		$data = $equipo->select($array)->orderBy('ord_equ')->findAll();
		return view('components/internas/listaequipo', ['perfiles' => $data]);
	}
}