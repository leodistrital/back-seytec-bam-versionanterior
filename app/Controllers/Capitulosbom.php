<?php

namespace App\Controllers;

use App\Models\CapitulosbomModel;
use App\Models\CuerpobomdetalleModel;
use CodeIgniter\RESTful\ResourceController;

class Capitulosbom extends ResourceController
{
    protected $format    = 'json';
    public function __construct()
    {
        $this->modelName = new CapitulosbomModel();
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


    public function listacapitulosbom($codigoBom)
    {
        // echo "-----".$codigoBom;
        //exit;
        $resp = $this->model->listatarCapitulosBomCapitulo($codigoBom);
        foreach($resp as $key=>$res ){	
            $resp[$key]['totalcapitulo']=$this->valorCapitulo($res['cod_cbo']);
		}
        // dd($resp);
        $data = [
            'capitulos' => $resp,
            'status' => 'Ok'
        ];
        return $this->respond($data, 200);
    }



	public function valorCapitulo($codigocapitulo ){

        // print_r($codigocapitulo);
        $valorTotal=0;
		$cuerpobomdetalle =  new CuerpobomdetalleModel();
		$array = ["sum(cos_mat_cub * can_hed_cub) as totalcapitulo"  ];
		// $array = ["cos_mat_cub", "can_hed_cub"  ];
		$data = $cuerpobomdetalle->select($array)->where('cod_hed_cub',$codigocapitulo)->findAll();
       
        // echo "<br>";
        // echo $cuerpobomdetalle->getLastQuery() ;	
        // print_r(count($data[0])); 
        // echo "----";
        // print_r($data[0]['totalcapitulo']); 
        if( !empty($data[0]['totalcapitulo']) ){
            $valorTotal  = number_format($data[0]['totalcapitulo'],0,'.','.');
            // print_r($data[0]['totalcapitulo']); 
        } 
        // print_r($data['totalcapitulo']); 
		// echo  print_r(number_format($data['totalcapitulo'],2,'.',','));
        		// exit();
        return $valorTotal;
	}
}
/* fecha de creacion: 09-06-2022 06:24:15 pm */