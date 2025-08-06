<?php

namespace App\Controllers\web;

use App\Controllers\MyApiRest;
use App\Models\web\ContenidosWebModel;
use App\Models\web\Galeriaimagenesdetalle;
use App\Models\web\Participanbam;
use App\Models\web\RegionesbamWebModel;

class Regiones extends  MyApiRest
{
    protected $format    = 'json';

    public function contenidos()
    {
        $contenido = new ContenidosWebModel();
        $array = ['slu_con as slug', 'img_con as fondo', 'tit_con_esp as titulo', 'des_con_esp as descripcion' ,
        'img2_con_esp as logos' , 'cod_gal_con'];
        $data = $contenido->select($array)->where('slu_con', 'regiones')->find();
         $logos =$data[0]['logos'];
         $codigoGaleria =$data[0]['cod_gal_con'];
        //  d($codigoGaleria);

        $regiones = new RegionesbamWebModel();
        $array = ['slu_reg', 'nom_reg', 'fec_reg' , 'IF(dat_reg < CURDATE(), "cat1" , "cat2" ) as vencido' , 'cod_reg' ];
        $regioneslista = $regiones->select($array)->orderBy('ord_reg', 'asc')->limit(6)->find();

        $galeria = new Galeriaimagenesdetalle();
        $array = ['img_dal as imagengal', 'des_dal as descripcion' ];
        $img = $galeria->select($array)->where('sec_dal', $codigoGaleria)->findAll();

         $participantes = new Participanbam();
         $array = ['tit_par', 'des_par', 'img_par' ];
         $listaparticipantes = $participantes->select($array)->orderBy('ord_par')->findAll();

        
        
        return view('regiones/regiones', ['contenido' => $data[0] , 'regioneslista' =>$regioneslista ,'imagenes' =>
        $img , 'listaparticipantes' => $listaparticipantes , 'logos' =>$logos ]);
    }

    public function getContenidodos()
    {
        $contenido = new ContenidosWebModel();
        $array = ['slu_con as slug', 'img_con as fondo', 'tit_con_esp as titulo', 'des_con_esp as descripcion'];
        $data = $contenido->select($array)->where('cod_con', '36')->find();
        return view('components/internas/contenido', ['contenido' => $data[0]] );
    }



    
}