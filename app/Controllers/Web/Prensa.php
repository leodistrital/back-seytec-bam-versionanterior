<?php

namespace App\Controllers\web;

use App\Controllers\MyApiRest;
use App\Models\web\ContenidosWebModel;
use App\Models\web\PrensaWebModel;

class Prensa extends  MyApiRest
{
    protected $format    = 'json';

    public function contenidos()
    {
        $contenido = new ContenidosWebModel();
        $array = ['slu_con as slug', 'img_con as fondo', 'tit_con_esp as  titulo', 'des_con_esp as descripcion'];
        $data = $contenido->select($array)->where('slu_con', 'prensa')->find();
        $prensa = new PrensaWebModel();
        $array = ['lin_pre', 'tit_pre', 'sti_pre', 'des_pre', 'fec_pre'];
        $newslatters = $prensa->select($array)->where('tip_pre', 1)->orderBy('cod_pre', 'desc')->findAll();
        $comunicados = $prensa->select($array)->where('tip_pre', 2)->orderBy('cod_pre', 'desc')->findAll();

        return view('prensa/prensa', ['contenido' => $data[0], 'newslatters' => $newslatters, 'comunicados' => $comunicados]);
    }
}