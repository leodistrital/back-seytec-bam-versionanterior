<?php

namespace App\Libraries;

use App\Models\web\SitioWebModel;
use App\Models\web\Menuprincipal;
use App\Models\web\ContenidosWebModel;
use App\Models\web\EdicionesModel;
use App\Models\web\Categorias;
use App\Models\web\Categoriasconvocatoria;
use App\Models\web\Menueventos;

class ViewSitio
{

    public function getKeyWords()
    {
        $sitio = new SitioWebModel();
        $array = ['key_sit'];
        $data = $sitio->select($array)->findAll();
        return view('components/cabezote/keywords', ['keywords' => $data[0]['key_sit']]);
    }


    public function getRedes()
    {
        $sitio = new SitioWebModel();
        $array = ['fac_sit as facebook', 'twt_sit as twitter', 'ins_sit as instagram', 'you_sit as youtube'];
        $data = $sitio->select($array)->findAll();
        return view('components/cabezote/social-networks', ['redes' => $data[0]]);
    }

    public function getBotonAcreditacion()
    {
        $sitio = new SitioWebModel();
        $array = ['acr_sit'];
        $data = $sitio->select($array)->findAll();
        // print_r($data);
        if($data[0] ['acr_sit'] ==1)
            return view('acreditaciones/formularios/botonacreditacion');
        return '';
    }


    public function getLogin()
    {
        $sitio = new SitioWebModel();
        $array = ['acr_sit'];
        $data = $sitio->select($array)->findAll();
        // print_r($data);
        if($data[0] ['acr_sit'] ==1)
            return view('acreditaciones/formularios/login');
        return '';
    }

    public function getCuenta()
    {
        return view('acreditaciones/formularios/micuenta');
    }


     public function getLeyendaHeader()
    {
        $sitio = new SitioWebModel();
        $array = ['ley_sit leyenda'];
        $data = $sitio->select($array)->findAll();
        echo $data[0]['leyenda'];
        return '' ;
    }


    public function getFooter()
    {
        $sitio = new SitioWebModel();
        $array = ['dir_sit as direccion', 'mai_sit as correo', 'tel_sit as telefono'];
        $data = $sitio->select($array)->findAll();
        return view('components/footer/datosFooter', ['footerDatos' => $data[0]]);
    }

    public function getAnallitycs()
    {
        $sitio = new SitioWebModel();
        $array = ['ana_sit'];
        $data = $sitio->select($array)->findAll();
        return $data[0]['ana_sit'];
    }


    public function getMenu1()
    {
        $menu = new Menuprincipal();
        $array = ['nom_mep'];
        $data = $menu->select($array)->where('cod_mep', 1)->findAll();

        $submenu = new ContenidosWebModel();
        $array = ['slu_con', 'tit_con_esp'];
        $submenudata = $submenu->select($array)->where('cod_mep_con', 1)->findAll();
        return view('components/cabezote/menuprincipal/menu1', ['menu' => $data[0], 'submenus' => $submenudata]);
    }


    public function getMenuConvocatorias($menuBloque)
    {
        $sitio = new SitioWebModel();
        $array = ['con_sit', 'edi_sit', 'sel_sit'];
        $data = $sitio->select($array)->findAll();
        $edicionActual = $data[0]['edi_sit']; //edicion activa en el sitio

        $ediciones = new EdicionesModel();
        $array = ['tit_edi', 'ano_edi'];
        $submenudata = $ediciones->select($array)->where('cod_edi', $edicionActual)->findAll(); //submenu de la edicion

        $menu = new Menuprincipal(); // nombre del menu
        $array = ['nom_mep'];
        $menuprincupal = $menu->select($array)->where('cod_mep', $menuBloque['menu'])->findAll();

        // categoria inicial  de la edicion
        if ($menuBloque['menu'] == 2) { // para traer solo un resultado para convocatoria
            $categorias = new Categoriasconvocatoria();
            $array = ['slu_cac', 'nom_cac'];
            $caodigocategoria = $categorias->select($array)->orderby('ord_cac')->limit(1)->find();
            // var_dump($caodigocategoria);
            // return '';
            if ($data[0]['con_sit'] == 2)   return ''; // verifica si se debe mostar el menu
            return view('components/cabezote/menuprincipal/menu2', ['menu' => $menuprincupal[0], 'submenus' => $submenudata[0], 'categoriainicial' =>  $caodigocategoria[0]]);
        } else {  // para traer solo un resultado para convocatoria
            if ($data[0]['sel_sit'] == 2)   return ''; // verifica si se debe mostar el menu
            $categoria = new Categorias();
            $array = ['slu_cat', 'nom_cat'];
            $selesccionCategorias = $categoria->select($array)->where('edi_cat', 1)->orderby('ord_cat')->findAll();
            // print_r($selesccionCategorias);
            //return '';
            return view('components/cabezote/menuprincipal/menu3', ['menu' => $menuprincupal[0],  'selesccionCategorias' =>  $selesccionCategorias]);
        }
    }

    public function menuagendaeventos()
    {

        $sitio = new SitioWebModel();
        $array = ['edi_sit', 'pro_sit'];
        $dataedicion = $sitio->select($array)->findAll();
        $edicionActual = $dataedicion[0]['edi_sit']; //edicion activa en el sitio
        $menuactivo = $dataedicion[0]['pro_sit']; //edicion activa en el sitio
        // print_r($menuactivo);

        if ($menuactivo == 2)   return ''; // verifica si se debe mostar el menu


        $menu = new Menuprincipal();
        $array = ['nom_mep'];
        $data = $menu->select($array)->where('cod_mep', 4)->findAll();

        $ediciones = new EdicionesModel();
        $array = ['ano_edi'];
        $anoEdicion = $ediciones->select($array)->where('cod_edi', $edicionActual)->findAll(); //submenu de la edicion
        // print_r($anoEdicion[0]['ano_edi']);
        // echo "++++";
        $menueventos = new Menueventos();

        // buscar si tiene submenu de la edicion //countAll
        $array = ['cod_mne',  'slu_mne', 'tit_mne', '( SELECT COUNT(*) from menueventos as menu where cod_pad_mne=menueventos.cod_mne ) as submenutotal'];
        $arraywhere = ['cod_edi_mne' => $edicionActual, 'cod_pad_mne' => '0'];
        $menueventos = $menueventos->select($array)->where($arraywhere)->orderby('ord_mne')->findAll();
        // print_r($menueventos);

        // echo "++++";
        return view('components/cabezote/menuprincipal/menu4', ['menu' => $data[0], 'menueventos' => $menueventos, 'anoEdicion' => $anoEdicion[0]['ano_edi']]);

        // return '';
    }

    public function submenuagendaeventos($menu, $edicion)
    {
        // print_r($edicion);
        $menueventos = new Menueventos();
        $array = ['cod_mne',  'slu_mne', 'tit_mne', 'adj_mne'];
        $arraywhere = ['cod_pad_mne' => $menu];
        $submenueventos = $menueventos->select($array)->where($arraywhere)->orderby('ord_mne')->findAll();
        // print_r($submenueventos);
        // echo "++++";
        // echo count($submenueventos);
        if (count($submenueventos) >= 1)
            return view('components/cabezote/menuprincipal/submenuevento', ['submenueventos' => $submenueventos, 'edicion' => $edicion]);
        else
            return '';
    }

    public function otroProgramas($menuid)
    {
        $sitio = new SitioWebModel();
        $array = ['reg_sit'];
        $data = $sitio->select($array)->findAll();
        $menuActivo = $data[0]['reg_sit']; //menu de regiones activo

        $menu = new Menuprincipal(); // nombre del menu
        $array = ['nom_mep'];
        $menuprincupal = $menu->select($array)->where('cod_mep', $menuid)->findAll();
        // print_r($menuprincupal);
        $submenu = new ContenidosWebModel();
        $array = ['slu_con', 'tit_con_esp'];
        $submenudata = $submenu->select($array)->where('cod_mep_con', $menuid)->orderby('cod_con')->limit(1)->find();
        // var_dump($submenudata[0]);
        return view('components/cabezote/menuprincipal/menu5', ['menu' => $menuprincupal[0], 'submenus' => $submenudata[0], 'menuActivo' => $menuActivo]);
    }


    public function prensaAnterioes($menuid)
    {
        $sitio = new SitioWebModel();
        $array = ['his_reg'];
        $data = $sitio->select($array)->findAll();
        $menuActivo = $data[0]['his_reg']; //menu de regiones activo
        // echo "leo+".$menuActivo;
     
        $menu = new Menuprincipal(); // nombre del menu
        $array = ['nom_mep'  ];
        $menuprincupal = $menu->select($array)->where('cod_mep', $menuid)->findAll();
        // print_r($menuprincupal);
        $submenu = new ContenidosWebModel();
        $array = ['slu_con', 'tit_con_esp as nombre', 'men_con as menu' ,'cod_con'];
        
        if($menuActivo==1){
            $arraywhere = ['cod_mep_con' => $menuid];
        } else {
          $arraywhere = ['cod_mep_con' => $menuid , 'cod_con!=' =>37 ];

        }
        $submenudata = $submenu->select($array)->where($arraywhere)->orderby('cod_con')->find();
        // $query = $submenu->getLastQuery();
// echo ($query);
        // print_r($submenudata);
        return view('components/cabezote/menuprincipal/menu6', ['menu' => $menuprincupal[0], 'submenus' => $submenudata, 'menuActivo' => $menuActivo]);
    }
}