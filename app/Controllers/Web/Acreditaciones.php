<?php

namespace App\Controllers\web;

use App\Controllers\MyApiRest;
use App\Models\web\ContenidosWebModel;
use App\Models\web\Ediciones;
use App\Models\web\Categorias;

class Acreditaciones extends  MyApiRest
{
    protected $format    = 'json';

    public function __construct()
    {
        // $this->model = $this->setModel(new SliderModel());
        //$this->aliados = new AliadosModel();
    }

    public function index(){
         $contenido = new ContenidosWebModel();
        $array = ['slu_con as slug', 'img_con as fondo', 'tit_con_esp as  titulo', 'des_con_esp as descripcion'];
        $data = $contenido->select($array)->where('slu_con', 'contacto')->find();
        return view('acreditaciones/acreditacion', ['contenido' => $data[0]]);

    }

   
}
