<?php

namespace App\Controllers\API;

use App\Models\AliadosacreditacionApiModel;
use App\Models\CodigosacreditacionApiModel;
use CodeIgniter\RESTful\ResourceController;

class Aliadosacreditacion extends ResourceController
{
    protected $format    = 'json';

    public function __construct()
    {
        $this->modelName = new AliadosacreditacionApiModel();
    }

    public function index()
    {

        $data = $this->model->listatardatos();
        return $this->respond($data, 200);
    }

    public function show($id = null)
    {
        $data = $this->model->listatardatos($id);
        $data['listacodigos'] = $this->getCodigos($id);
        return $this->respond(array('data' => $data), 200);
    }

    public function create()
    {
        $resp = $this->model->guardar($this->request);
        $info = $this->model->listatardatos($resp);
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


    public function getCodigos($idaliado)
    {
        // echo $idaliado;
        $cods = '';
        $codigos = new CodigosacreditacionApiModel();
        $array = ["sec_coa"];
        $wherearray = ["cod_ali_coa" => $idaliado];
        $data = $codigos->select($array)->where($wherearray)->find();
        foreach ($data as $row) {
            $cods .=  $row['sec_coa'].'             ';
        }
        return $cods;
    }
}
/* fecha de creacion: 05-22-2023 01:41:45 pm */