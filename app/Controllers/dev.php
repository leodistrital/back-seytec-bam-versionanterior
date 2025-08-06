<?php

namespace App\Controllers;

class Dev extends BaseController
{
    public function generador()
    {
        $db = \Config\Database::connect();
        //dd($db);
        $query = $db->query("show tables");
        $results = $query->getResultArray();
        $keytalba = array_keys($results[0]);
        $nombrecolumna = $keytalba[0];
        foreach ($results as $row) {
            $talas[] = $row[$nombrecolumna];
        }
        $datos = [
            'tablas' => $talas
        ];

        // print_r($talas);
        return view('dev', $datos);
    }



    public function operaciones($tabla)
    {
        // $db = \Config\Database::connect();
        // //dd($db);
        // $query = $db->query("show tables");
        // $results = $query->getResultArray();
        // $keytalba = array_keys($results[0]);
        // $nombrecolumna = $keytalba[0];
        // foreach ($results as $row) {
        // $talas[] = $row[$nombrecolumna];
        // }
        $datos = [
            'tabla' => $tabla
        ];

        // print_r($talas);
        return view('devoperaciones', $datos);
    }


    public function crearModelo($tabla)
    {

        // print_r($tabla);

        $db = \Config\Database::connect();
        $query = $db->query("SHOW COLUMNS FROM $tabla");
        $results = $query->getResultArray();

        // print_r($results);
        // $keytalba = array_keys($results[0]);
        // $nombrecolumna = $keytalba[0];
        // echo count($results);
        $i = 0;
        foreach ($results as $row) {

            if ($i == 0) {
                $primarykey = $row['Field'];
            }
            if ($i > 0 && $i < count($results) - 3) {
                $campos[] = $row['Field'];
                $camposGuardar[] =  "'" . $row['Field'] . "' => \$request->getVar('" . $row['Field'] . "')\n";
            }

            $i++;
        }

        $datos = [
            'tabla' => $tabla,
            'primarykey' => $primarykey,
            'nombreModelo' => ucfirst($tabla) . "ApiModel",
            'campos' => json_encode($campos),
            'camposGuardar' => implode(",", $camposGuardar)
        ];

        // print_r($datos['camposGuardar']);
        return view('crearModelo', $datos);
    }


    public function crearModeloweb($tabla)
    {

        $confirm = $this->scripttable($tabla);
        $db = \Config\Database::connect();
        $query = $db->query("SHOW COLUMNS FROM $tabla");
        $results = $query->getResultArray();
        $campos = array();
        $camposGuardar = array();
        //  print_r($results);
         //  $keytalba = array_keys($results[0]);
         //  $nombrecolumna = $keytalba[0];
         //  echo count($results);
         //  exit;
         $i = 0;
         foreach ($results as $row) {
             
             if ($i == 0) {
                 $primarykey = $row['Field'];
                }
                if ($i > 0 && $i < count($results) - 3) {
                    $campos[] = $row['Field'];
                    $camposGuardar[] = "'" . $row['Field'] . "' => \$request->getVar('" . $row['Field'] . "')\n";
                }
                $i++;
            }
            
            
        $datos = [
            'tabla' => $tabla,
            'primarykey' => $primarykey,
            'nombreModelo' => ucfirst($tabla) . "WebModel",
            'campos' => json_encode($campos),
            'camposGuardar' => implode(",", $camposGuardar)
        ];

        //print_r($datos['camposGuardar']);
        //exit;
        return view('crearModeloweb', $datos);
    }

    public function crearControlador($tabla)
    {
        $datos = [
            'tabla' => ucfirst($tabla),
            'nombreModelo' => ucfirst($tabla) . "ApiModel",
        ];
        return view('crearControlador', $datos);
    }


    public function scripttable($tabla)  {
         $db = \Config\Database::connect();
         $query = $db->query("SHOW COLUMNS FROM $tabla WHERE Field = 'deleted_at' ");
         if($query->getNumRows() == 0) {
            $query = $db->query("ALTER TABLE $tabla ADD `created_at` DATETIME NULL ");
            $query = $db->query("COMMIT; ");
            $query = $db->query("ALTER TABLE $tabla ADD `updated_at` DATETIME NULL ");
            $query = $db->query("COMMIT; ");
            $query = $db->query("ALTER TABLE $tabla ADD `deleted_at` DATETIME NULL ");
            $query = $db->query("COMMIT; ");
         }
        return 1;
    }

}
    