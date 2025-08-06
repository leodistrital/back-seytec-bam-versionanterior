<?php

namespace App\Controllers\web;

use App\Controllers\MyApiRest;
use App\Models\web\AgendaeventosregionesModel;
use App\Models\web\ContenidosWebModel;
use App\Models\web\Galeriaimagenesdetalle;
use App\Models\web\Participanbam;
use App\Models\web\RegionesbamWebModel;
use App\Models\web\Speakerseventos;

class Region extends  MyApiRest
{
    protected $format    = 'json';

    public function contenidos($slug)
    {
        // d($slug);
        $contenido = new ContenidosWebModel();
        $array = [
            'slu_con as slug', 'img_con as fondo', 'tit_con_esp as titulo', 'des_con_esp as descripcion',
            'img2_con_esp as logos'
        ];
        $data = $contenido->select($array)->where('slu_con', 'regiones')->find();
        // dd($data);


        $regiones = new RegionesbamWebModel();
        $array = ['slu_reg', 'nom_reg', 'fec_reg', 'IF(dat_reg < CURDATE(), "cat1" , "cat2" ) as vencido' , 'cod_reg' ];
        // $regioneslista = $regiones->select($array)->orderBy('cod_reg', 'asc')->findAll();
        $regioneslista = $regiones->select($array)->orderBy('ord_reg', 'asc')->limit(6)->find();

        // dd($regioneslista);

        $array = ['cod_reg as codigoRegion', 'tit_reg as titulo', 'sit_reg as subtitulo', 'des_reg as desc', 'log_reg as logos', 'acr_reg as linkacreditacion', 'ade_reg as agendadesc', 'apd_reg as pdfage', 'ter_reg as terminosdesc', 'tpd_reg as pdftyc', 'log_reg as logos', 'gal_reg'];
        $regioncontenido = $regiones->select($array)->where('slu_reg', $slug)->find();
        $codigoRegion = $regioncontenido[0]['codigoRegion'];
        // echo $regiones->getLastQuery();
        // dd($codigoRegion);
        //mesas redondas


        $mesas = new AgendaeventosregionesModel();
        $array = ['tit_ave as titulo', 'fec_ave as fecha', 'nom_reg as region', 'img_ave as imagen', 'fec_ave as
        fecha', 'hor_ave as hora', 'lug_ave as lugar', 'des_ave as descripcion'];
        $wherearray = ['tip_eve_ave' => 1, 'cod_reg_ave' => $codigoRegion ];
        $mesasredondas = $mesas->select($array)->join(
            'regionesbam',
            'regionesbam.cod_reg=cod_reg_ave'
        )->where($wherearray)->orderBy('cod_reg', 'asc')->findAll();


        $array = [
            'cod_ave', 'tit_ave as titulo', 'fec_ave as fecha', 'nom_reg as region', 'img_ave as imagen',
            'fec_ave as fecha', 'hor_ave as hora', 'lug_ave as lugar', 'des_ave as descripcion', 'not_ave as nota', 'url_ave
        as url', 'log_ave as logo', 'pre_ave as previo'
        ];
         $wherearray = ['tip_eve_ave' => 2, 'cod_reg_ave' => $codigoRegion ];
        $eventos = $mesas->select($array)->join('regionesbam', 'regionesbam.cod_reg=cod_reg_ave')->where($wherearray)->orderBy('cod_reg', 'asc')->findAll();


        //tallerres

        $imagenesgaleria = [];
        if ($regioncontenido[0]['gal_reg'] != 0) {
            $galeria = new Galeriaimagenesdetalle();
            $array = ['img_dal as imagengal', 'des_dal as descripcion'];
            $imagenesgaleria = $galeria->select($array)->where('sec_dal', $regioncontenido[0]['gal_reg'])->findAll();
        }
        // echo "++++";
        //  var_dump($regioncontenido[0]['gal_reg']);
        //  var_dump($imagenesgaleria);



        $galeria = new Galeriaimagenesdetalle();
        $array = ['img_dal as imagengal', 'des_dal as descripcion'];
        $img = $galeria->select($array)->where('sec_dal', 2)->findAll();

        $participantes = new Participanbam();
        $array = ['tit_par', 'des_par', 'img_par'];
        $listaparticipantes = $participantes->select($array)->orderBy('ord_par')->findAll();

        $logos = $data[0]['logos'];

        return view('region/region', [
            'contenido' => $data[0], 'regioneslista' => $regioneslista, 'regioncontenido' =>
            $regioncontenido[0], 'imagenes' => $img, 'listaparticipantes' => $listaparticipantes, 'logos' => $logos,
            'imagenesgaleria' => $imagenesgaleria, "mesasredondas" => $mesasredondas, 'eventos' => $eventos
            ,'codigoRegion' =>$codigoRegion
        ]);
    }

    public function getContenidodos()
    {
        $contenido = new ContenidosWebModel();
        $array = ['slu_con as slug', 'img_con as fondo', 'tit_con_esp as titulo', 'des_con_esp as descripcion'];
        $data = $contenido->select($array)->where('cod_con', '36')->find();
        return view('components/internas/contenido', ['contenido' => $data[0]]);
    }


    public function speakers($codigoevento, $imagen)
    {
        $speakerseventos = new Speakerseventos();
        $array = ['nom_spe as nombre', 'per_spe as perfil', 'img_spe as imagen'];
        $arraywhere = ['cod_ave_spe' => $codigoevento];
        $speakers = $speakerseventos->select($array)->where($arraywhere)->orderBy('ord_spe')->findAll();

        if (count($speakers) > 0)
            return view('components/region/speaker', [
                'speakers' => $speakers[0], 'imagen' => $imagen
            ]);
        else
            return '';
    }
}