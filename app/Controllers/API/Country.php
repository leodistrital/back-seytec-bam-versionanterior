<?php

namespace App\Controllers\API;

use App\Models\CountryApiModel;
use CodeIgniter\RESTful\ResourceController;

class Country extends ResourceController
{
    protected $format    = 'json';

    public function __construct()
    {
        $this->modelName = new CountryApiModel();
    }

    public function index()
    {
        
        $data = $this->model->listatardatos();
        return $this->respond($data, 200);
    }

    public function show($id = null)
    {
        $data = $this->model->listatardatos($id);
        return $this->respond(array('data' => $data), 200);
    }

    public function create()
    {
        
exit;
        $resp = $this->model->guardar($this->request);
        // $info = $this->model->listatardatos($resp);
        $info = 'dsdds';
        

        $data['resp'] = [
            'codigo' => $resp,
            'status' => 'Ok',
            'info' => $info
        ];
        return $this->respond($data, 200);
    }

    public function update($id = null)
	{
		$resp = $this->model->edicion($id, $this->request);
		return $this->respond($resp, 200);
	}

    public function delete($id = null)
    {
        $resp = $this->model->borrar($id);
        $data['resp'] = [
            'codigo' => $resp,
            'status' => 'Ok'
        ];
        return $this->respond($data, 200);
    }
}
/* fecha de creacion: 01-27-2023 03:53:49 pm */