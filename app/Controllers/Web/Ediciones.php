<?php

namespace App\Controllers\web;

use App\Controllers\MyApiRest;
use App\Models\web\Categorias;
use App\Models\web\EdicionesModel;
use App\Models\web\Galeriaimagenesdetalle;
use App\Models\web\Proyectos;

class Ediciones extends  MyApiRest
{
    protected $format    = 'json';



    public function contenidos($edicion = 0)
    {

        // dd($edicion);
        $anoEdicion = new EdicionesModel();
        //buscar la ultima editacion  hostorico
        $array = ['ano_edi', 'cod_edi'];
        if ($edicion == 0) {
            $edicion = $anoEdicion->select($array)->where('act_edi!=', '1')->orderBy('ano_edi', 'DESC')->limit(1)->find();
        } else {
            $edicion = $anoEdicion->select($array)->where('ano_edi', $edicion)->orderBy('ano_edi', 'DESC')->limit(1)->find();
        }

        if (isset($edicion[0]['ano_edi'])) {
            $ultimaEdicion = $edicion[0]['ano_edi'];
            $codigoultimaEdicion = $edicion[0]['cod_edi'];
        } else {
            return redirect()->to('./');
        }

        // busca todos los años de las ediciones
        $edicionAnt = $anoEdicion->select($array)->where('act_edi!=', '1')->orderBy('ano_edi', 'DESC')->find();



        //busca el contenido de la edicion
        $array = [
            'img_edi as imagen', 'tit_edi as titulo', 'des_edi as descripcion', 'sti_edi as subtitulo', 'pro_edi
        as programacion', 'gal_edi', "ad1_edi", "ad2_edi", "ad3_edi", "ad4_edi", "ad5_edi", "im1_edi",
            "im2_edi", "im3_edi", "im4_edi", "im5_edi"
        ];
        $contenido = $anoEdicion->select($array)->where('ano_edi', $ultimaEdicion)->orderBy('ano_edi', 'DESC')->find();

        //busca la galeria si hay dato
        $imagenesgaleria = [];
        if ($contenido[0]['gal_edi'] != 0) {
            $galeria = new Galeriaimagenesdetalle();
            $array = ['img_dal as imagengal', 'des_dal as descripcion'];
            $imagenesgaleria = $galeria->select($array)->where('sec_dal', $contenido[0]['gal_edi'])->findAll();
        }

        return view('ediciones/ediciones', [
            'contenido' => $contenido[0], 'imagenesgaleria' => $imagenesgaleria,
            'codigoultimaEdicion' => $codigoultimaEdicion, 'edicionAnt' => $edicionAnt , 'edicionseleccionada' =>$ultimaEdicion
        ]);
    }


    public function categoriasEdicion($edicion)
    {
        // d($edicion);
        $categorias = new Categorias();
        $array = ['nom_cat as nombrecategoria', 'cod_cat as codigoCategoria', 'eva_cat as tipo'];
        $listaCategorias = $categorias->select($array)->where('edi_cat', $edicion)->orderBy('ord_cat')->findAll();
        // d($listaCategorias);
        if (count($listaCategorias) > 0)
            return view('components/ediciones/historico', ['listaCategorias' => $listaCategorias]);
        else
            return '';
    }

    public function seleccionados($categoria, $tipo)
    {
        // d($categoria);
        // d($tipo);
        //busca los datos del proyecto
        $proyectos = new Proyectos();
        $array = ['cod_pro', 'nom_pro', 'per_pro', 'gen_pro', 'dur_pro', 'pdc_pro', 'sin_pro', 'img_pro', 'pdc_lin_pro'];
        $proyectos = $proyectos->select($array)->where('cod_cat_pro', $categoria)->orderBy('ord_pro')->find();
        // d($proyectos);
        if ($tipo == 1)  return view('components/ediciones/proyectofilm', ['proyectos' => $proyectos]);
        if ($tipo == 2) return view('components/ediciones/proyectoperfil', ['perfiles' => $proyectos]);
    }
}