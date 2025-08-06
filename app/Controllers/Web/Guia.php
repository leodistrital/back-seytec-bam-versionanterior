<?php

namespace App\Controllers\web;

use App\Controllers\MyApiRest;
use App\Models\web\Acr_registoWebModel;
use App\Models\web\ContenidosWebModel;
use App\Models\web\FavoritosguiaWebModel;
use App\Models\web\ListafavoritosWebModel;
use App\Models\web\ParametrosWebModel;


class Guia extends  MyApiRest
{
    protected $format    = 'json';
    public $totalRegstrosGlobal = 0;
    public $resultadosporPagina = 20;


    public function index($tipoguia = 'participantes')
    {
        $formFiltros = $this->getFiltros($this->request);
        // print_r($formFiltros);
        $seccion = 'guiaindustria';

        if ($tipoguia == 'participantes') {
            $filtros['actividades'] = $this->getActividades('profesional');
            $filtros['abecedario'] = $this->getAbecedario('participantes');
            $filtros['cards'] = $this->getCards('participantes', $formFiltros);
        }

        

        if ($tipoguia == 'empresas') {
            $filtros['actividades'] = $this->getActividades('actividadempresa');
            $filtros['abecedario'] = $this->getAbecedario('empresas');
            $filtros['cards'] = $this->getCardsEmpresas('empresas', $formFiltros);
        }


         if ($tipoguia == 'favoritos') {
            $filtros['actividades'] = $this->getActividades('profesional');
            $filtros['abecedario'] = $this->getAbecedario('participantes');
            $filtros['cards'] = $this->getCardsfavoritos('participantes', $formFiltros);
        }


        

        $filtros['paises'] = $this->getPaises();
        // print_r($filtros['cards']);
        $contenido = new ContenidosWebModel();
        $array = ['slu_con as slug', 'img_con as fondo', 'tit_con_esp as titulo', 'des_con_esp as descripcion'];
        $data = $contenido->select($array)->where('slu_con', $seccion)->find();

        return view('panelguia', ['contenido' => $data[0], 'seccion' => $seccion, 'tipoguia' => $tipoguia, 'filtros' => $filtros, 'formFiltros' => $formFiltros, 'totalRegstrosGlobal' => $this->totalRegstrosGlobal, 'resultadosporPagina' => $this->resultadosporPagina]);
        return '';
    }


    public function getActividades($tipo)
    {
        $actividades = new  ParametrosWebModel();
        return $actividades->listataParametro($tipo);
    }


    public function getPaises()
    {
        $usuarios = new Acr_registoWebModel();
        $array = ['nom_op_para as dato', 'val_op_para as valor'];
        $wherearray = [3, 10, 2];
        return $usuarios->select($array)->join('parametros', 'paisresidencia=val_op_para')->whereIn('finacreditacion', $wherearray)->where('nom_para', 'paises')->groupBy('paisresidencia')->find();
    }


    public function getAbecedario($tipo)
    {
        $usuarios = new Acr_registoWebModel();
        $array = ['UPPER(LEFT(apellido , 1)) as letra'];
        $wherearray = [3, 10, 2];
        // $wherearray =['apellido' ];
        if ($tipo == 'participantes') {
            $array = ['UPPER(LEFT(apellido , 1)) as letra'];
            return $usuarios->select($array)->where('apellido!=', ' "" ')->whereIn('finacreditacion', $wherearray)->orderby('apellido', 'ASC')->groupBy('letra')->find();
        }

        if ($tipo == 'empresas') {
            $array = ['UPPER(LEFT(nombreempresa , 1)) as letra'];
            return $usuarios->select($array)->where('nombreempresa!=', ' "" ')->whereIn('finacreditacion', $wherearray)->where('formPart', 1)->orderby('nombreempresa', 'ASC')->groupBy('letra')->find();
        }
    }

    public function getCardsEmpresas($tipo, $formFiltros)
    {
        $usuarios = new Acr_registoWebModel();
        $usuariostotales = new Acr_registoWebModel();
        $array = ['*', 'UPPER(LEFT(nombreempresa , 1)) as letra', '(SELECT nom_op_para FROM parametros WHERE nom_para="actividadempresa"  and val_op_para=actividad ) as sectoractividadparametro', '(SELECT nom_op_para FROM parametros WHERE nom_para="indicativo"  and val_op_para=indicativoempresa ) as indicativotel'];
        $wherearray = [3, 10];
        $cardempresa = [];
        $wherearrayadicionales = ['excluir' => 0, 'act_req' => 1];

        $arrayfiltroswhere = ['nombreempresa!=' => 'Null'];

        if (!empty($formFiltros['sector'])) {
            // echo $formFiltros['sector']."===";
            $arrayfiltroswhere += ['actividad' => $formFiltros['sector']];
        }
        if (!empty($formFiltros['paisform'])) {
            // echo $formFiltros['sector']."===";
            $arrayfiltroswhere += ['paisempresa' => $formFiltros['paisform']];
        }

        if (!empty($formFiltros['textoform'])) {
            $usuarios->like('nombreempresa', $formFiltros['textoform'], 'match');
            $usuariostotales->like('nombreempresa', $formFiltros['textoform'], 'match');
        }


        if (!empty($formFiltros['porganizar'])) {
            if ($formFiltros['porganizar'] == 'pais') {
                $usuarios->orderBy('paisempresa', 'ASC');
                $usuariostotales->orderBy('paisempresa', 'ASC');
            }
        }

        if (!empty($formFiltros['letra'])) {
            $usuarios->like('nombreempresa', $formFiltros['letra'], 'after');
            $usuariostotales->like('nombreempresa', $formFiltros['letra'], 'after');
        }

        $totalRegistros = $usuariostotales->select($array)->whereIn('finacreditacion', $wherearray)->where($arrayfiltroswhere)->where($wherearrayadicionales)->where('formPart', 1)->orderby('nombreempresa', 'ASC')->find();

        $this->totalRegstrosGlobal = count($totalRegistros);

        if (!empty($formFiltros['pagina'] > 1)) {
            $usuarios->limit($this->resultadosporPagina, ($formFiltros['pagina'] - 1) * $this->resultadosporPagina);
        } else {
            $usuarios->limit($this->resultadosporPagina);
        }

        if (!empty($formFiltros['letra'])) {
            $usuarios->like('nombreempresa', $formFiltros['letra'], 'after');
        }

        $totalRegistros = $usuarios->select($array)->where($wherearrayadicionales)->whereIn('finacreditacion', $wherearray)->where($arrayfiltroswhere)->where('formPart', 1)->orderby('nombreempresa', 'ASC')->groupBy('nombreempresa')->find();
        // echo "+++++";
        // echo $usuarios->getLastQuery() ;
        // exit();
        $i = 0;

        if (count($totalRegistros) > 0) {
            foreach ($totalRegistros as $item) :
                $item['interanarepresentantes'] = $this->getRepresentantes($item['nombreempresa']);
                $i++;
                $cardempresa[$i] = $item;
            // var_dump($item);
            endforeach;
        }
        return $cardempresa;
        // return '';
    }


    public function getRepresentantes($empresa)
    {
        $usuarios = new Acr_registoWebModel();
        $usuariostotales = new Acr_registoWebModel();
        $array = ['*', 'UPPER(LEFT(apellido , 1)) as letra', '(SELECT nom_op_para FROM parametros WHERE nom_para="profesional"  and val_op_para=sectoractividad ) as sectoractividadparametro', '(SELECT nom_op_para FROM parametros WHERE nom_para="indicativo"  and val_op_para=indicativo ) as indicativotel'];
        $wherearray = [3, 10];
        $arrayfiltroswhere = ['nombreempresa' => $empresa];
        $totalRegistros = $usuarios->select($array)->whereIn('finacreditacion', $wherearray)->where($arrayfiltroswhere)->orderby('apellido', 'ASC')->find();
        // echo $usuarios->getLastQuery() ;
        return $totalRegistros;
    }


    

 public function getCardsfavoritos($tipo, $formFiltros)
    {
        $usuarios = new Acr_registoWebModel();
        $usuariostotales = new Acr_registoWebModel();
        $userpropietariofav = $this->session->get('id');
        $array = ['*', 'UPPER(LEFT(apellido , 1)) as letra', '(SELECT nom_op_para FROM parametros WHERE nom_para="profesional"  and val_op_para=sectoractividad ) as sectoractividadparametro', '(SELECT nom_op_para FROM parametros WHERE nom_para="indicativo"  and val_op_para=indicativo ) as indicativotel', 'seleccionado', 'categoriaseleccion', '(SELECT ico_cac FROM categoriasconvocatoria WHERE categoriaseleccion=cod_cac   ) as icocategoria' ,"(SELECT cod_fav from favoritosguia where usu_fav=usu_reg and pro_fav='$userpropietariofav' limit 1) as mifavorito"];
        $wherearray = [3, 10];
        $wherearrayadicionales = ['excluir' => 0, 'pro_fav' => $userpropietariofav, ];

        $arrayfiltroswhere = [];

        if (!empty($formFiltros['sector'])) {
            // echo $formFiltros['sector']."===";
            $arrayfiltroswhere += ['sectoractividad' => $formFiltros['sector']];
        }
        if (!empty($formFiltros['paisform'])) {
            // echo $formFiltros['sector']."===";
            $arrayfiltroswhere += ['paisresidencia' => $formFiltros['paisform']];
        }

        if (!empty($formFiltros['textoform'])) {
            $usuarios->like('nombre', $formFiltros['textoform'], 'match');
            $usuarios->orLike('apellido', $formFiltros['textoform'], 'match');

            $usuariostotales->like('nombre', $formFiltros['textoform'], 'match');
            $usuariostotales->orLike('apellido', $formFiltros['textoform'], 'match');
        }


        if (!empty($formFiltros['porganizar'])) {
            if ($formFiltros['porganizar'] == 'pais') {
                $usuarios->orderBy('paisresidencia', 'ASC');
            }
        }

        if (!empty($formFiltros['letra'])) {
            $usuarios->like('apellido', $formFiltros['letra'], 'after');
            $usuariostotales->like('apellido', $formFiltros['letra'], 'after');
        }

        $totalRegistros1 = $usuariostotales->select($array)->join('favoritosguia', 'favoritosguia.usu_fav = acr_registo.usu_reg')->whereIn('finacreditacion', $wherearray)->where($arrayfiltroswhere)->where($wherearrayadicionales)->orderby('apellido', 'ASC')->find();
        // $totalRegistros1= array();

        $this->totalRegstrosGlobal = count($totalRegistros1);

        if (!empty($formFiltros['pagina'] > 1)) {
            $usuarios->limit($this->resultadosporPagina, ($formFiltros['pagina'] - 1) * $this->resultadosporPagina);
        } else {
            $usuarios->limit($this->resultadosporPagina);
        }

        $totalRegistros = $usuarios->select($array)->join('categoriasconvocatoria', 'categoriasconvocatoria.cod_cac = acr_registo.categoriaseleccion', 'left')->join('favoritosguia', 'favoritosguia.usu_fav = acr_registo.usu_reg')->whereIn('finacreditacion', $wherearray)->where($arrayfiltroswhere)->where($wherearrayadicionales)->orderby('apellido', 'ASC')->find();
        //  echo $usuarios->getLastQuery() ;

        return $totalRegistros;
    }

    public function getCards($tipo, $formFiltros)
    {
        $usuarios = new Acr_registoWebModel();
        $usuariostotales = new Acr_registoWebModel();
        $userpropietariofav = $this->session->get('id');
        $array = ['*', 'UPPER(LEFT(apellido , 1)) as letra', '(SELECT nom_op_para FROM parametros WHERE nom_para="profesional"  and val_op_para=sectoractividad ) as sectoractividadparametro', '(SELECT nom_op_para FROM parametros WHERE nom_para="indicativo"  and val_op_para=indicativo ) as indicativotel', 'seleccionado', 'categoriaseleccion', '(SELECT ico_cac FROM categoriasconvocatoria WHERE categoriaseleccion=cod_cac   ) as icocategoria' ,"(SELECT cod_fav from favoritosguia where usu_fav=usu_reg and pro_fav='$userpropietariofav' limit 1) as mifavorito"];
        $wherearray = [3, 10];
        $wherearrayadicionales = ['excluir' => 0, 'act_req' => 1];

        $arrayfiltroswhere = [];

        if (!empty($formFiltros['sector'])) {
            // echo $formFiltros['sector']."===";
            $arrayfiltroswhere += ['sectoractividad' => $formFiltros['sector']];
        }
        if (!empty($formFiltros['paisform'])) {
            // echo $formFiltros['sector']."===";
            $arrayfiltroswhere += ['paisresidencia' => $formFiltros['paisform']];
        }

        if (!empty($formFiltros['textoform'])) {
            $textoform = $formFiltros['textoform'];
            $sql = "(nombre LIKE '%$textoform%' ESCAPE '!' OR apellido LIKE '%$textoform%' ESCAPE '!' )"; 
            
            $usuarios->where($sql);
            $usuariostotales->where($sql);
        }


        if (!empty($formFiltros['porganizar'])) {
            if ($formFiltros['porganizar'] == 'pais') {
                $usuarios->orderBy('paisresidencia', 'ASC');
            }
        }

        if (!empty($formFiltros['letra'])) {
            $usuarios->like('apellido', $formFiltros['letra'], 'after');
            $usuariostotales->like('apellido', $formFiltros['letra'], 'after');
        }

        $totalRegistros1 = $usuariostotales->select($array)->whereIn('finacreditacion', $wherearray)->where($arrayfiltroswhere)->where($wherearrayadicionales)->orderby('apellido', 'ASC')->find();
        // $totalRegistros1= array();

        $this->totalRegstrosGlobal = count($totalRegistros1);

        if (!empty($formFiltros['pagina'] > 1)) {
            $usuarios->limit($this->resultadosporPagina, ($formFiltros['pagina'] - 1) * $this->resultadosporPagina);
        } else {
            $usuarios->limit($this->resultadosporPagina);
        }

        $totalRegistros = $usuarios->select($array)->join('categoriasconvocatoria', 'categoriasconvocatoria.cod_cac = acr_registo.categoriaseleccion', 'left')->whereIn('finacreditacion', $wherearray)->where($arrayfiltroswhere)->where($wherearrayadicionales)->orderby('apellido', 'ASC')->find();
         // echo $usuarios->getLastQuery() ;

          // exit();

        return $totalRegistros;
    }


    public function getFiltros($request)
    {
        $datos['sector'] = $request->getVar('sector');
        $datos['paisform'] = $request->getVar('paisform');
        $datos['textoform'] = $request->getVar('textoform');
        $datos['porganizar'] = $request->getVar('porganizar');
        $datos['pagina'] = $request->getVar('pagina');
        $datos['letra'] = $request->getVar('letra');
        return $datos;
    }


    public function vcard($tipo, $id)
    {

        $usuarios = new Acr_registoWebModel();

        if ($tipo == 'participantes') {
            $selectArray = [];
        }

        if ($tipo == 'participantes') {
            $selectArray = ['nombre', 'apellido', 'correopublicacion', 'telefonopublicacion', 'indicativo', 'usu_reg as usuario'];
        }

        if ($tipo == 'empresas') {
            $selectArray = ['nombreempresa as nombre', '"" as apellido', 'correoempresa as correopublicacion', 'telefonoempresa as telefonopublicacion', 'paisempresa as indicativo', 'usu_reg as usuario'];
        }


        $vcard = $usuarios->select($selectArray)->where('usu_reg', $id)->find();
        return view('components/guia/vcard', ['vcard' => $vcard[0]]);
    }

    public function listafavoritos($tipo, $user)
    {

       $borrado = $this->eliminarfavorito($user);

        $favoritoslista = new ListafavoritosWebModel();
        $listasdata = $favoritoslista->buscarlistas($this->session->get('id'));
        $data['listasdata'] = $listasdata;
        $data['usuario'] = $user;
        $data['tipo'] = $tipo;
        $data['borrado'] = $borrado;
        

        return view('components/favoritos/listafavoritos', ['data' => $data]);
        return '';
    }

    public function guadarfavoritos()
    {

        $request = $this->request;
        // echo 'entro al post';
        // echo $tipo;
        // exit;
        // print_r($this->request);
        $nombrelista = trim($request->getVar('nombrelista'));
        $listado = trim($request->getVar('milistafavoritos'));
        $favorito = trim($request->getVar('fav'));
        $tipo = trim($request->getVar('tipo'));
        $iduser = $this->session->get('id');

        if (!empty($nombrelista)) {
            $idlista = $this->crealista($iduser, $nombrelista);
            // echo 'setea creando';
        } else {
            $idlista = $listado;
            // echo 'setea del listado';
        }
        // echo $idlista;
        $data = ['lif_fav' => $idlista, 'usu_fav' => $favorito, 'tip_cif' => $tipo , 'pro_fav' => $iduser];
        // print_r($data);
        // echo $idlista.'**********';
        $favoritos = new FavoritosguiaWebModel();
        $favoritos->guardar($data);
        return 'card-'.$favorito;
    }


    public function crealista($iduser, $nombrenuevalista)
    {
        $listafavoritos = new ListafavoritosWebModel();
        $idnnuevalista = $listafavoritos->guardar($iduser, $nombrenuevalista);
        return $idnnuevalista;
    }

    public function eliminarfavorito($user){
        $favoritos = new FavoritosguiaWebModel();
        $whereArray = ['usu_fav' => $user, 'pro_fav' => $this->session->get('id')];
        $totalencontrado = $favoritos->where($whereArray)->countAllResults();
        if($totalencontrado){
            $favoritos->where($whereArray)->delete();
            return 1;
        }
        return 0;
    }

}