<?php

namespace App\Controllers\web;

use App\Controllers\MyApiRest;
use App\Models\web\SitioWebModel;
use App\Models\web\Menueventos;
use App\Models\web\Agendaeventos;
use App\Models\web\Alianzaagenda;
use App\Models\web\Speakerseventos;

class Programacion extends  MyApiRest
{
    protected $format    = 'json';

    public function __construct()
    {
        // $this->model = $this->setModel(new SliderModel());
        //$this->aliados = new AliadosModel();
    }

    public function programacion($edicion, $evento)
    {
        // echo $edicion . " - " . $evento;
        $sitio = new SitioWebModel();
        $array = ['con_sit', 'edi_sit'];
        $data = $sitio->select($array)->findAll();
        // print_r($data);
        $edicionActual = $data[0]['edi_sit']; //edicion activa en el sitio
        // echo $edicionActual . "-Edicioon actual";

        /**Busca info  de la descripcion del evento */
        $infoevento = new Menueventos();
        $array = ['cod_mne', 'tit_mne', 'des_mne', 'img_mne', 'pla_mne', 'fon_mne as fondo' , 'ctp_mne as plantillaCotenido', 'con_ext_mne as contenidoExtra' ];
        $arraywhere = ['slu_mne' => $evento, 'cod_edi_mne' => $edicionActual];
        $contenidoEvento = $infoevento->select($array)->where($arraywhere)->find(); 


        $agendaeventos = new Agendaeventos();
        $array = ['cod_ave', 'tit_ave', 'des_ave', 'fec_ave', 'hor_ave', 'not_ave', 'pre_ave', 'vir_ave', 'url_ave', 'lug_ave', 'img_ave', "DATE_FORMAT(fec_ave,'%d') AS fecha", "concat(DAYNAME(fec_ave), ' ', MONTHNAME(fec_ave)   )  as dia", " DATE_FORMAT(hor_ave, '%l:%i %p ') as hora"];
        
        $arraywhere = ['cod_mne_ave' => $contenidoEvento[0]['cod_mne']];
        $eventos = $agendaeventos->select($array)->where($arraywhere)->orderBy('fec_ave , hor_ave', 'ASC' )->findAll();
        // print_r($eventos);

        /**Agenda de eventos */
        return view('programacion/programacion', ['contenido' => $contenidoEvento[0], 'eventos' => $eventos]);
    }

    public function logoaliados($codigoevento)
    {
        // echo $codigoevento;
        $alianzaagenda = new Alianzaagenda();
        $array = ['img_agg'];
        $arraywhere = ['cod_ave_agg' => $codigoevento];
        $logos = $alianzaagenda->select($array)->where($arraywhere)->orderBy('ord_agg')->findAll();
        if (count($logos) > 0)
            return view('components/eventos/logos', ['logos' => $logos]);
        else
            return '';
    }



    public function speakers($codigoevento)
    {
        // echo $codigoevento;
        $speakerseventos = new Speakerseventos();
        $array = ['nom_spe' , 'per_spe' , 'img_spe' ];
        $arraywhere = ['cod_ave_spe' => $codigoevento];
        $speakers = $speakerseventos->select($array)->where($arraywhere)->orderBy('ord_spe')->findAll();
        if (count($speakers) > 0)
            return view('components/eventos/speakers', ['speakers' => $speakers]);
        else
            return '';
    }





    // public function proyectos($edicion, $categoriaSlug)
    // {
    //     // echo $edicion . " - " . $categoriaSlug;
    //     // $categoria slug de la categoria se busca el tipo de plantilla
    //     $categoria = new Categorias();
    //     $array = ['cod_cat', 'nom_cat', 'des_cat', 'fon_cat', 'eva_cat'];
    //     $contenidogocategoria = $categoria->select($array)->where('slu_cat', $categoriaSlug)->find();

    //     //busca el comite evaluador de la categoria
    //     $comiteevaluador = new Comiteevaluador();
    //     $array = ['nom_coe', 'pai_coe', 'img_coe', 'per_coe'];
    //     $jurados = $comiteevaluador->select($array)->where('cod_cat_coe', $contenidogocategoria[0]['cod_cat'])->orderBy('ord_coe')->find();
    //     // print_r(count($jurados));


    //     //busca los datos del proyecto
    //     $proyectos = new Proyectos();
    //     $array = ['cod_pro', 'nom_pro','per_pro','gen_pro','dur_pro','pdc_pro','sin_pro','img_pro'];
    //     $proyectos = $proyectos->select($array)->where('cod_cat_pro', $contenidogocategoria[0]['cod_cat'])->orderBy('ord_pro')->find();
    //     // print_r($proyectos);
    //     // echo count($proyectos);


    //     // print_r($contenidogocategoria[0]);
    //     //seleteccion tipo proyecto //tipo film - tipo perfil

    //     // si es 1 es carga film  - 2 para perfiles  //verificar si la plnatilla des de una serie corto o pelicula

    //     $contenido['fondo'] = $contenidogocategoria[0]['fon_cat'];

    //     if ($contenidogocategoria[0]['eva_cat'] == 1)
    //         return view('seleccionados/films', ['contenidogocategoria' => $contenidogocategoria[0], 'contenido' => $contenido , 'jurados' => $jurados , 'proyectos' => $proyectos]);

    //     if ($contenidogocategoria[0]['eva_cat'] == 2)
    //         return view('seleccionados/profile', ['contenidogocategoria' => $contenidogocategoria[0], 'contenido' => $contenido, 'jurados' => $jurados, 'perfiles' => $proyectos]);
    // }

    // public function resumenproyecto($proyecto)
    // {
    //     // print_r($proyecto);
    //     //busca los datos del proyecto
    //     $proyectos = new Proyectos();
    //     $array = ['cod_pro', 'nom_pro', 'per_pro', 'gen_pro', 'dur_pro', 'pdc_pro', 'sin_pro', 'img_pro'];
    //     $proyecto = $proyectos->select($array)->where('cod_pro', $proyecto)->orderBy('ord_pro')->find();
    //     // print_r($proyecto);
    //     return view('seleccionados/resumenproyecto', ['proyecto' => $proyecto[0]] );
    // }

    // public function resumenpersona($perfil)
    // {
    //     $proyectos = new Proyectos();
    //     $array = ['cod_pro', 'nom_pro', 'per_pro', 'gen_pro', 'dur_pro', 'pdc_pro', 'sin_pro', 'img_pro'];
    //     $proyecto = $proyectos->select($array)->where('cod_pro', $perfil)->orderBy('ord_pro')->find();
    //     return view( 'seleccionados/resumenpersona', ['perfil' => $proyecto[0]]);
    // }
}