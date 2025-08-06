<?php

namespace App\Controllers\web;

use App\Controllers\MyApiRest;
use App\Models\web\ContenidosWebModel;
use App\Models\web\Ediciones;
use App\Models\web\Categoriasconvocatoria;

class Convocatorias extends  MyApiRest
{
    protected $format    = 'json';
    public function mostar($categoria)
    {
       
        $contenido = new ContenidosWebModel();
        $array = ['slu_con as slug', 'img_con as fondo', 'tit_con_esp as  titulo', 'des_con_esp as descripcion'];
        $data = $contenido->select($array)->where('cod_mep_con', 2)->find();

        //buscar todas las categorias  de la conovocatoria 
        $categorias = new categoriasconvocatoria();
        $array = ['cod_cac as codigo', 'nom_cac as nombre', 'slu_cac as slug', 'col_cac as color' , "'$categoria'".' as
        activa' ];
        $listacategoriasEdicion = $categorias->select($array)->orderBy('ord_cac')->find();
        // print_r($listacategoriasEdicion);

        //buscar contenido del categoria activa
        $array = ['nom_cac as nombre', 'tit_cac as titulo', 'des_cac as descripcion', 'img_cac as imagen', 'ad1_cac as adjunto1', 'ad2_cac as adjunto2' ];
        $contenidoCategoria = $categorias->select($array)->where('slu_cac', $categoria)->orderBy('ord_cac')->find();

        return view('convocatorias/convocatorias', ['contenido' => $data[0], 'categorias' => $listacategoriasEdicion, 'contenidoCategoria' => $contenidoCategoria[0]]);
    }
}