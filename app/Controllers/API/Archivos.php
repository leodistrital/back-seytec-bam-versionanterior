<?php

namespace App\Controllers\API;

use App\Models\CifrasApiModel;
use App\Models\MenusApiModel;
use CodeIgniter\RESTful\ResourceController;

class Archivos extends ResourceController
{
    protected $format    = 'json';

    protected $extension = array('pdf', 'jpeg', 'png', 'jpg', '');

    public function __construct()
    {
        //$this->modelName = new CifrasApiModel();
        //echo "llego"; 
    }

    public function upload($ruta = '')
    {
        $path = $ruta;
        $file = $this->request->getFile('demo');
        $mirequiest = (array)  $this->request->uri;
        $i = 0;
        foreach ($mirequiest as $key => $val) {
            if ($i == 7) {
                 $path = str_replace('upload', '', $val);
            }
            $i++;
        }

         $ext = $file->guessExtension();

        if (!in_array($ext, $this->extension)) {
            $data['resp'] = [
                'file' => '',
                'status' => 404,
                'mensaje' => 'Archivo No valido'
            ];
            return $this->respond($data, 200);
        }

         $newname = $file->getRandomName();
        if (!$file->hasMoved()) {
            if ($file->move('.' . $path, $newname)) {

                $data['resp'] = [
                    'file' => getenv('urlProduccion') . $path . "/" . $newname,
                    'status' => 200
                ];
                return $this->respond($data, 200);
                // return $this->respond($newname, 200);
            }
        }
    }
}
