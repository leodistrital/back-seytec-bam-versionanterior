<?php

namespace App\Controllers\web;

use App\Models\web\ConcesionariosWebModel;


use App\Controllers\MyApiRest;
use App\Models\web\MenugeneralWebModel;


class Panel extends  MyApiRest
{
	protected $format    = 'json';

	public function index()
	{
		$session = session();
		$concesionarios = new ConcesionariosWebModel();
		$array = ['concesionarios.id', "concat(ciudades.nombre , ' - ', concesionarios.nombre ) as concesionario"];
		$listaconcesionarios = $concesionarios->select($array)->join(
			'ciudades',
			'id_ciudad=ciudades.id'
		)->orderBy('ciudades.nombre')->findAll();
		//var_dump($session->usuario);
		return view('panel', ['datosUsuario' => $session->usuario, 'listaconcesionarios' => $listaconcesionarios, 'menusuperior' => '']);
	}


	public function salir()
	{
		$session = session();
		$session->destroy();
		return redirect()->to('/');
	}


	public function panleNuevos()
	{
		$menusuperior = 'nuevo';
		$tipocontenido = 'inicio';
		$session = session();

		$concesionarios = new ConcesionariosWebModel();
		$array = ['concesionarios.id', "concat(ciudades.nombre , ' - ', concesionarios.nombre ) as concesionario"];
		$listaconcesionarios = $concesionarios->select($array)->join('ciudades', 'id_ciudad=ciudades.id')->orderBy('ciudades.nombre')->findAll();

		$menuGenral = new MenugeneralWebModel();
		$array = ["nom_men as nombre", 'rut_men as ruta', 'cod_men as codigo'];
		$wherearray = ["cod_mod" => 1, 'des_men' => 1];
		$listaMenuNuevos = $menuGenral->select($array)->where($wherearray)->orderBy('ord_men')->findAll();
		// return '';
		return view('panelnuevos', [
			'datosUsuario' => $session->usuario, 'listaconcesionarios' => $listaconcesionarios,
			'menusuperior' => $menusuperior, 'listaMenuNuevos' => $listaMenuNuevos, 'tipocontenido' => $tipocontenido
		]);
		// echo 'leo';
	}


	public function getSubMenu($menu)
	{
		// echo $menu;
		// return '';
		$menuGenral = new MenugeneralWebModel();
		$array = ["nom_men as nombre", 'rut_men as ruta', 'cod_men as codigo'];
		$wherearray = ["pad_men" => $menu, 'des_men' => 1];
		$subMenu = $menuGenral->select($array)->where($wherearray)->orderBy('ord_men')->findAll();
		if (count($subMenu))  return view('components/menugeneral/subMenuNuevos', ['listasubMenu' => $subMenu]);
		else return '';
	}

	public function contenido($codigocontenido)
	{
		// echo $codigocontenido;

		$menusuperior = 'nuevo';
		$tipocontenido = 'rutadirectorio';
		$session = session();

		$concesionarios = new ConcesionariosWebModel();
		$array = ['concesionarios.id', "concat(ciudades.nombre , ' - ', concesionarios.nombre ) as concesionario"];
		$listaconcesionarios = $concesionarios->select($array)->join(
			'ciudades',
			'id_ciudad=ciudades.id'
		)->orderBy('ciudades.nombre')->findAll();

		$menuGenral = new MenugeneralWebModel();
		$array = ["nom_men as nombre", 'rut_men as ruta', 'cod_men as codigo'];
		$wherearray = ["cod_mod" => 1, 'des_men' => 1];
		$listaMenuNuevos = $menuGenral->select($array)->where($wherearray)->orderBy('ord_men')->findAll();


		$array = ["nom_men as nombre", 'rut_men as ruta', 'rut_men as navegacion', 'cod_men as codigo', 'tit_men as titulo', 'ent_men as entredilla'];
		$wherearray = ["cod_men" => $codigocontenido];
		$contenidoDirectorio = $menuGenral->select($array)->where($wherearray)->find();

		$session = session();
		$newdata = $contenidoDirectorio[0];
		$_SESSION['dropbox'] = $newdata;
		// var_dump($_SESSION['dropbox']);

		// return '';
		return view('panelnuevos', [
			'datosUsuario' => $session->usuario, 'listaconcesionarios' => $listaconcesionarios,
			'menusuperior' => $menusuperior, 'listaMenuNuevos' => $listaMenuNuevos, 'tipocontenido' => $tipocontenido, 'contenidoDirectorio' => $contenidoDirectorio[0], 'codigocontenido' => $codigocontenido
		]);
	}


	public function iframe($rutafreame)
	{
		$session = session();
		// var_dump($_SESSION['dropbox']);
		$rutafreame = str_replace('@@@', '/', $rutafreame);
		return view('components/dropbox/iframe/dropbox/dropbox', ['result' => '', 'access_token' => '', 'dir' => '',  'datos' => '', 'contenidoDirectorio' => $rutafreame]);
	}


	public function simplex($img)
	{
		return view('components/dropbox/iframe/dropbox/iconos', ['imgicono' => $img]);
	}

	public function descargar($id)
	{
		$file = $id;
		// Prepare new cURL resource
		$ch = curl_init('https://api.dropbox.com/oauth2/token');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLINFO_HEADER_OUT, true);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=refresh_token&refresh_token=od00fBC88yEAAAAAAAAAAdWt_VAE6iGDeY9xZfP3dR_5AGGcyf5ocNxbfwVGmKW-");
		// // Set HTTP Header for POST request 
		curl_setopt(
			$ch,
			CURLOPT_HTTPHEADER,
			array(
				'Authorization: Basic MDBmb24xcnlieDllZHZ5OnRyMjJwdDlwcmEwNnZwMA==', 'Content-Type: application/x-www-form-urlencoded'
			)
		);

		$result = curl_exec($ch);
		// var_dump($result);
		$arr = $this->JSON2Array($result);
		curl_close($ch);
		$tokenConsulta = $arr['access_token'];
		$tokenConsulta = "Bearer $tokenConsulta";
		$parameters = array('path' => "$file");
		$headers = array(
			"Authorization: $tokenConsulta",
			'Content-Type: application/json'
		);
		$curlOptions = array(
			CURLOPT_HTTPHEADER => $headers,
			CURLOPT_POST => true,
			CURLOPT_POSTFIELDS => json_encode($parameters),
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_VERBOSE => true
		);
		$ch = curl_init('https://api.dropboxapi.com/2/sharing/create_shared_link_with_settings');
		curl_setopt_array($ch, $curlOptions);
		$response = curl_exec($ch);
		$response = curl_exec($ch);
		$inforlink = $this->JSON2Array($response);
		$urlDescarga = $inforlink['url'];
		$urlDescarga =  str_replace("?dl=0", "?dl=1", $urlDescarga);
		curl_close($ch);
		return redirect()->to($urlDescarga);
	}

	public function JSON2Array($data)
	{
		return  (array) json_decode(stripslashes($data));
	}
}