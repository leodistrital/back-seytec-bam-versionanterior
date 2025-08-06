<?php

namespace App\Controllers;

use App\Models\CategoriasModel;
use CodeIgniter\RESTful\ResourceController;

class Categorias extends ResourceController
{

    protected $format    = 'json';

    public function __construct()
    {
        $this->modelName = new CategoriasModel();
    }

    public function index()
    {

        $token = $this->request->getServer('HTTP_X_TOKEN');
        if(empty($token)){
           return $this->respond('error', 404);
           exit;
        }
        
        $data = $this->model->listatardatos();
        return $this->respond($data, 200);
    }


    public function show($id = null)
    {
        $data['procesos'] = $this->model->listatardatos($id);
        return $this->respond(array('data' => $data), 200);
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        // echo "creando..";
        // exit;
        $resp = $this->model->guardar($this->request);
        $info = $this->model->listatardatos($resp);
        $data['resp'] = [
            'codigo' => $resp,
            'status' => 'Ok',
            'info' => $info
        ];
        return $this->respond($data, 200);
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $resp = $this->model->borrar($this->request);
        $data['resp'] = [
            'codigo' => $resp,
            'status' => 'Ok'
        ];
        return $this->respond($data, 200);
    }
}