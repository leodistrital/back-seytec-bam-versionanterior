<?php

namespace App\Controllers\web;

use App\Controllers\MyApiRest;
use App\Models\web\ConcesionariosWebModel;
use App\Models\web\UsuariosWebModel;

// use App\Models\web\BannerWebModel;

class Login extends MyApiRest
{
	protected $format    = 'json';
	protected $session;


	function __construct()
	{
		// $this->session = \Config\Services::session();
		// $this->session->start();
	}


	public function index()
	{
		return view('login');
	}

	public function nuevo()
	{
		$concesionarios = new ConcesionariosWebModel();
		$array = ['concesionarios.id', "concat(ciudades.nombre , ' - ', concesionarios.nombre ) as concesionario"];
		$listaconcesionarios = $concesionarios->select($array)->join('ciudades', 'id_ciudad=ciudades.id')->orderBy('ciudades.nombre')->findAll();
		// dd($data);
		return view('registrosNuevo', ['listaconcesionarios' => $listaconcesionarios]);
	}

	public function autenticacion()
	{

		// var_dump( $this->request);
		$data = [
			'ok' => 0
		];
		$login = $this->request->getVar('usuario');
		$pass = $this->request->getVar('password');

		$usuarios = new  UsuariosWebModel();
		$array = ['usuarios.id as userid', 'usuarios.nombre as username', 'id_concesionario', 'id_perfil',
		'concesionarios.nombre as nombreConcesionario', 'password' , 'identificacion' ,'email' ];
		$whereArray = ['md5(login)' => $login, 'estado' => 'aprobado'];
		$usuario = $usuarios->select($array)->join('concesionarios', 'id_concesionario=concesionarios.id')->where($whereArray)->find();
		// echo var_dump($usuario[0]['password']);
		// echo $usuarios->getLastQuery();
		if (count($usuario) == 0) {
			return $this->respond($data, 200);
		}

		if ($usuario[0]['password'] == $pass) {
			$session = session();
			$newdata = array(
				'id' => $usuario[0]['userid'],
				'nombre' => $usuario[0]['username'],
				'identificacion' => $usuario[0]['identificacion'],
				'email' => $usuario[0]['email'],
				'id_concesionario' => $usuario[0]['id_concesionario'],
				'id_perfil' => $usuario[0]['id_perfil'],
				'nombreConcesionario' => $usuario[0]['nombreConcesionario']
			);
			// $this->session->set($newdata);
			$_SESSION['usuario'] = $newdata;
			// echo $session->get("nombre");
			// echo $session->id;
			$data = [
				'ok' => 1
			];
		}

		return $this->respond($data, 200);
	}
}