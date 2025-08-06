<?php

namespace App\Controllers\web;

use App\Controllers\MyApiRest;
use App\Models\web\Categorias;
use App\Models\web\Comiteevaluador;
use App\Models\web\Ediciones;
use App\Models\web\Proyectos;

class Seleccionados extends  MyApiRest
{
    protected $format    = 'json';

    public function __construct()
    {
        // $this->model = $this->setModel(new SliderModel());
        //$this->aliados = new AliadosModel();
    }

    public function proyectos($edicion, $categoriaSlug)
    {
        // echo $edicion . " - " . $categoriaSlug;

        $ediciones = new Ediciones();
        $ediciondb = $ediciones->select('cod_edi')->where('ano_edi', $edicion)->find();
        $edicionActual  = $ediciondb[0]['cod_edi'];

        // $categoria slug de la categoria se busca el tipo de plantilla
        $categoria = new Categorias();
        $array = ['cod_cat', 'nom_cat', 'des_cat', 'fon_cat', 'eva_cat'];
        $selectArray = ['slu_cat' => $categoriaSlug , 'edi_cat' => $edicionActual];
        // $selectArray = ['slu_cat' => $categoriaSlug ];
        $contenidogocategoria = $categoria->select($array)->where($selectArray)->find();
        // d($contenidogocategoria);

        //busca el comite evaluador de la categoria
        $comiteevaluador = new Comiteevaluador();
        $array = ['nom_coe', 'pai_coe', 'img_coe', 'per_coe'];
        $jurados = $comiteevaluador->select($array)->where('cod_cat_coe', $contenidogocategoria[0]['cod_cat'])->orderBy('ord_coe')->find();

        // print_r(count($jurados));


        //busca los datos del proyecto
        $proyectos = new Proyectos();
        $array = ['cod_pro','cod_cat_pro', 'nom_pro','per_pro','gen_pro','dur_pro','pdc_pro','sin_pro','img_pro' , 'pdc_lin_pro'];
        $proyectos = $proyectos->select($array)->where('cod_cat_pro', $contenidogocategoria[0]['cod_cat'])->orderBy('ord_pro')->find();
        // var_dump($proyectos->getLastQuery() );
        // print_r($proyectos);
        // echo count($proyectos);


        // print_r($contenidogocategoria[0]);
        //seleteccion tipo proyecto //tipo film - tipo perfil

        // si es 1 es carga film  - 2 para perfiles  //verificar si la plnatilla des de una serie corto o pelicula
        
        $contenido['fondo'] = $contenidogocategoria[0]['fon_cat'];
        
        if ($contenidogocategoria[0]['eva_cat'] == 1)
            return view('seleccionados/films', ['contenidogocategoria' => $contenidogocategoria[0], 'contenido' => $contenido , 'jurados' => $jurados , 'proyectos' => $proyectos]);

        if ($contenidogocategoria[0]['eva_cat'] == 2)
            return view('seleccionados/profile', ['contenidogocategoria' => $contenidogocategoria[0], 'contenido' => $contenido, 'jurados' => $jurados, 'perfiles' => $proyectos]);
    }

    public function resumenproyecto($proyecto)
    {
        // print_r($proyecto);
        //busca los datos del proyecto
        $proyectos = new Proyectos();
        $array = ['cod_pro', 'nom_pro', 'per_pro', 'gen_pro', 'dur_pro', 'pdc_pro', 'con_pro', 'img_pro'];
        $proyecto = $proyectos->select($array)->where('cod_pro', $proyecto)->orderBy('ord_pro')->find();
        // print_r($proyecto);
        return view('seleccionados/resumenproyecto', ['proyecto' => $proyecto[0]] );
    }

    public function resumenpersona($perfil)
    {
        $proyectos = new Proyectos();
        $array = ['cod_pro', 'nom_pro', 'per_pro', 'gen_pro', 'dur_pro', 'pdc_pro', 'sin_pro', 'img_pro'];
        $proyecto = $proyectos->select($array)->where('cod_pro', $perfil)->orderBy('ord_pro')->find();
        return view( 'seleccionados/resumenpersona', ['perfil' => $proyecto[0]]);
    }
}