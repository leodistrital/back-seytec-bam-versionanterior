<?php

namespace App\Controllers;

use App\Models\SitioModel;
use App\Controllers\MyApiRest;
// use App\Models\SliderModel;

class Sitio extends  MyApiRest
{
	protected $format    = 'json';

	public function __construct()
	{
		$this->model = $this->setModel(new SitioModel());
		// $this->slider = new SliderModel();
	}

	public function index()
	{
		$this->model->select('fac_sit as facebook , twt_sit as twitter , lla_sit as tullave , dir_sit as direccion , ciu_sit ciudad , log_sit as logo , nom_sit as nombre');
		$datos = $this->model->findAll();
		return $this->genericResponse($datos);
		// var_dump(get_object_vars($this->model->getLastQuery()->db));
		// var_dump(get_class_methods($this->model->getLastQuery()));
		// var_dump(get_class_methods($this));
		// var_dump(get_class_methods($this->model->getLastQuery()));
		// echo "------------------------------------";
		// var_dump(get_object_vars($this->model->getLastQuery()));
		// var_dump($this->model->getLastQuery()->getOriginalQuery());
		// return $this->genericResponse($datos2);

		// $this->slider->where('cod_sli', 2);
		// $resultado = $this->slider->delete(3);
		// print_r($resultado);
		// $datos = $this->slider->get()->getResult();
		// $datos = $slider->where('cod_sli', 1);
		// print_r($datos);
		// print_r($datos2);
		// $data = array_merge($datos, $datos2);
	}
}