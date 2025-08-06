<?php

namespace App\Controllers\web;

use App\Controllers\MyApiRest;
use App\Models\web\ContenidosWebModel;
use App\Models\web\Ediciones;
use App\Models\web\Categorias;

class Contacto extends  MyApiRest
{
    protected $format    = 'json';

    public function __construct()
    {
        // $this->model = $this->setModel(new SliderModel());
        //$this->aliados = new AliadosModel();
    }

    public function contenidos()
    {
        // $this->seccion = $seccion;
        // echo $this->seccion;
        $contenido = new ContenidosWebModel();
        $array = ['slu_con as slug', 'img_con as fondo', 'tit_con_esp as  titulo', 'des_con_esp as descripcion'];
        $data = $contenido->select($array)->where('slu_con', 'contacto')->find();
        return view('contacto/contacto', ['contenido' => $data[0]]);
    }

    // public function categoria($categoria = 0)
    // {

    //     echo " llego por la categoria";
    // //     $data = ['categoria' => $categoria];
    // // //    echo $categoria;
    // //     return view('convocatorias/convocatorias');
    // }
}
