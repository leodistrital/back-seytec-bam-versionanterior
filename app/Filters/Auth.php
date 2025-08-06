<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\RESTful\ResourceController;
use App\Libraries\SeguridadLibrary;

use CodeIgniter\API\ResponseTrait;
use CodeIgniter\Session\Session;

class Auth implements FilterInterface
{

    use ResponseTrait;

    function __construct()
    {
        $this->autenticacion = new SeguridadLibrary();
        $this->respuesta = new ResourceController;
        $session = Session();
    }

    public function before(RequestInterface $request, $arguments = null)
    {
        // echo "entro ......";
        // exit;
        // echo var_dump($request);
        $dominioPermitido = "http://localhost:3000/";
        // $dominioPermitido = "*";
        // header("Access-Control-Allow-Origin: $dominioPermitido");
        // header('Access-Control-Allow-Origin: *');
        // header("Access-Control-Allow-Headers: x-token ,X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Authorization");
        header("Access-Control-Allow-Headers: Content-Type , x-token");
        header("Access-Control-Allow-Methods: GET, POST, DELETE");
        header('X-Powered-By: mottif.com');
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method == "OPTIONS") {
            die();
        }

        $token = $request->getServer('HTTP_X_TOKEN');

        if ($this->autenticacion->Check($token)) {
            $infoUser = $this->autenticacion->GetData($token);
            $_SESSION['seguro'] = $infoUser[0]->id;
        } else {
            header('HTTP/1.1 401 Unauthorized', true, 401);
            die(json_encode(['code' => 401, 'data' => array('msg' => 'Error de autenticacion',  'code' => 401)]));
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        session_destroy();
    }


    private function genericResponse($data, $msj, $code, $token = '')
    {
        if ($code == 200) {
            return $this->respuesta->respond(array(
                "data" => $data,
                "code" => $code,
                "token" => $token,
            )); //, 404, "No hay nada"
        } else {
            return $this->respuesta->respond(array(
                "data" => [],
                "code" => 401,
                "token" => '',
            ));
        }
    }
}