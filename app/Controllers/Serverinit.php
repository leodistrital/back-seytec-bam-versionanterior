<?php

namespace App\Controllers;

use App\Models\UsuarioModel;
use CodeIgniter\RESTful\ResourceController;
use App\Libraries\SeguridadLibrary;
use App\Models\DominiosModel;





class Serverinit extends ResourceController
{

    protected $format = 'json';



    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->autenticacion = new SeguridadLibrary();
    }


    public function index()
    {


        //echo "llego -1";
        // echo var_dump($_SERVER);

        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ipcliente = $aud = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $aud = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ipcliente = $aud = $_SERVER['REMOTE_ADDR'];
        }

        $aud .= @$_SERVER['HTTP_USER_AGENT'];

        $ipcliente = $this->request->getServer('REMOTE_ADDR');
        

        $dominios = new DominiosModel();
        $data['dominios'] = $dominios->where('nom_dom', $ipcliente)->findAll();



        if (count($data['dominios']) > 0) {
            $usuario = $this->request->getVar('email');
            $password = $this->request->getVar('password');
            $usuario = $this->buscarUsuario($usuario, $password);
            if (count($usuario) > 0) {
                $tokenGenerado =  $this->autenticacion->SignIn($usuario);
                return $this->genericResponse($usuario, 'ok', 200, $tokenGenerado);
            } else {
                return $this->genericResponse($usuario, 'Error de autenticacion', 401);
            }
        } else {
            return $this->genericResponse('Usuario no valido', 'Error de autenticacion', 401);
        }

        //print_r($this->db->showLastQuery());

    }


    private static function Aud()
    {
        $aud = '';

        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $aud = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $aud = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $aud = $_SERVER['REMOTE_ADDR'];
        }

        $aud .= @$_SERVER['HTTP_USER_AGENT'];
        $aud .= gethostname();

        return sha1($aud);
    }


    private function genericResponse($data, $msj, $code, $token = '')
    {
        if ($code == 200) {
            return $this->respond(array(
                "data" => $data,
                "code" => $code,
                "token" => $token,
            )); //, 404, "No hay nada"
        } else {
            return $this->respond(array(
                "msj" => $msj,
                "code" => $code
            ));
        }
    }

    private function buscarUsuario($user = '', $pass = '')
    {
        $user = hash_hmac('md5', $user, $this->autenticacion->getsecret_key());
        $pass = hash_hmac('sha256', $pass, $user);
        $usuarios = new UsuarioModel();
        $array = ['use_usu' => $user, 'pas_usu' => $pass];
        $data['login'] = $usuarios->select('cod_usu as id , nom_usu as name ,mai_usu as email,  tip_usu as perfil')->where($array)->findAll();
        // print_r($this->db->showLastQuery());
        if (count($data) == 1) {
            return  $data['login'];
        } else {
            return  [];
        }
    }
}
