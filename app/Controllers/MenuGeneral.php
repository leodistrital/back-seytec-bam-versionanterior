<?php

namespace App\Controllers;

use App\Controllers\MyApiRest;
use App\Models\MenusModel;

class MenuGeneral extends  MyApiRest
{
    protected $format    = 'json';

    public function __construct()
    {
        $this->model = $this->setModel(new MenusModel());
    }

    public function index()
    {
        $data = [];
        $this->model->select('cod_men, slu_men as id , nom_men_esp as nombre , rut_men');
        $this->model->where('pad_men', 0);
        $this->model->orderBy('ord_men', 'ASC');
        foreach ($this->model->findAll() as $menu) {
            $submenu = $this->subMenu($menu);
            count($submenu) > 0 ? $menu['submenu'] = true : $menu['submenu'] = false;
            $menu['items'] =  $submenu;
            if ($menu['cod_men'] == 27) {
                $menu['ruta'] = $menu['rut_men'];
            } else {
                $menu['ruta'] = '/' . $menu['rut_men'];
            }
            unset($menu['cod_men']);
            array_push($data, $menu);
        }
        $datos[0] = array('menu' => $data);
        return $this->genericResponse($datos);
    }

    private function subMenu($menuPadre = [])
    {
        $ruta = $menuPadre['id'];
        $this->model->select("slu_men as sid , nom_men_esp as snombre , concat('/','$ruta','/',slu_men)  as sruta ");
        $this->model->where('pad_men', $menuPadre['cod_men']);
        $this->model->orderBy('ord_men', 'ASC');
        $datos = $this->model->findAll();
        return $datos;
    }
}