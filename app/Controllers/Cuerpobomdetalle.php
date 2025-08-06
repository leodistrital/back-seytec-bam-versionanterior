<?php

namespace App\Controllers;

use App\Models\CuerpobomdetalleModel;
use App\Models\PlantillaitemModel;
use CodeIgniter\RESTful\ResourceController;

class Cuerpobomdetalle extends ResourceController
{
    protected $format    = 'json';
    public function __construct()
    {
        $this->modelName = new CuerpobomdetalleModel();
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

        $request = $this->request;


        if ($request->getVar('codigoPlantilla') > 0) {
            echo 'inserta una plantilla';
            $plantillaItems = new PlantillaitemModel();
            $data = $plantillaItems->listatardatos($request->getVar('codigoPlantilla'));
            print_r($data);
            foreach ($data as $item) {
                // $Material =$item['codigoitem'];
                // $costoMaterial =$item['precio'];
                $resp = $this->model->guardarPlnatilla($this->request ,$item);
                // $plantillaItems->guardarPlantilla($codigoItem ,$this->request );
                // $info = $this->model->listatardatos($resp);
                $data['resp'] = [
                    'codigo' => $resp,
                    'status' => 'Ok'
                ];
            }
            return $this->respond($data, 200);
        }

      
        if ($request->getVar('codigomaterial') > 0) {
            $resp = $this->model->guardar($this->request);
            $info = $this->model->listatardatos($resp);
            $data['resp'] = [
                'codigo' => $resp,
                'status' => 'Ok',
                'info' => $info
            ];
            return $this->respond($data, 200);
        }
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

    public function listaitemsbom($codigoBom, $codigoCapitulo)
    {

        //echo "-----".$codigoBom.$codigoCapitulo;
        //       exit;

        $resp = $this->model->listatarMaterialBomCapitulo($codigoBom, $codigoCapitulo);

        //  $data= [
        //     'materiales' => $resp,
        //     'status' => 'Ok'
        // ];

        return $this->respond($resp, 200);
    }
}
/* fecha de creacion: 06-15-2022 05:11:02 pm */