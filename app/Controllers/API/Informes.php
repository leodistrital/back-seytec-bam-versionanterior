<?php

namespace App\Controllers\API;
//https://bogotamarket.com/api/informes/acreditados
use App\Models\Acr_registoApiModel;
use App\Models\web\Acr_registoWebModel;
use CodeIgniter\RESTful\ResourceController;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class Informes extends ResourceController
{
    protected $format    = 'json';

    // public function __construct()
    // {
    //     $this->modelName = new TarifasacreditacionApiModel();
    // }

    public function descargar($nombreinforme)
    {


        if ($nombreinforme == 'acreditados') {
            // $filename = 'Informe*acreditados*general.xlsx';
            // header("Content-Type: application/vnd.ms-excel;charset=utf-8");
            // header("Content-disposition: attachment; filename=" . $filename . " " . date("Y-m-d") . ".txt");
            // header("Content-Type: application/vnd.ms-excel");

            $acreditados = new Acr_registoApiModel();
            $arrayselect = [
                'cod_reg as id', "nom_reg", "ape_reg", "mai_reg", "divpaso1", "formPart", "nombre", "apellido", "tipodocumento", "numdocumento", "paisresidencia", "ciudadresidencia", "dirresidencia", "nacionalidad", "localidad", "estrato", "sexo", "identidad", "nacimientofecha", "grupoetnia", "divpaso2", "indicativo", "telefono", "mailcontacto", "confMail", "idioma", "partifiporegiones", "ciudadparticipo", "indicativopublicacion", "telefonopublicacion", "correopublicacion", "sectoractividad", "intereses", "otrointeres", "territorio", "mencionepaises", "perfilinteres", "divpaso3", "nombreempresa", "nit", "cargoempresa", "direccionempresa", "indicativoempresa", "telefonoempresa", "correoempresa", "paisempresa", "ciudadempresa", "actividad", "otraactividad", "webempresa", "divpaso4", "fotoacreditacion", "certificadovinculo", "certificadoexistencia", "finacreditacion", 'acr_registo.updated_at as fregistro', 'valorasi', 'nota', 'wompi', 'descuento', 'sec_coa', " (SELECT nom_op_para FROM parametros WHERE nom_para = 'estadoacreditacion' and val_op_para=finacreditacion)    as estadoacreditacion", "(SELECT nom_op_para FROM parametros WHERE nom_para = 'sino' and val_op_para=partifiporegiones)    as participaregionesparametro", " (SELECT nom_tar FROM tarifasacreditacion where cod_tar=valorasi) as tarifaasignada", "(SELECT nom_op_para FROM parametros WHERE nom_para = 'localidad' and val_op_para=localidad)  as localidadparametro", "(SELECT nom_op_para FROM parametros WHERE nom_para = 'estratos' and val_op_para=estrato)  as estratoparametro", "(SELECT nom_op_para FROM parametros WHERE nom_para = 'sexo' and val_op_para=sexo)  as sexoparametro", "(SELECT nom_op_para FROM parametros WHERE nom_para = 'identidadgen' and val_op_para=identidad)  as identidadgenparametro", "(SELECT nom_op_para FROM parametros WHERE nom_para = 'etnia' and val_op_para=grupoetnia)  as etniaparametro", "(SELECT nom_op_para FROM parametros WHERE nom_para = 'profesional' and val_op_para=sectoractividad)  as sectoractividadparametro", " ' '  as interesesparametro", " ' '  as territorioparametros", " ' '  as empresaactividadesparametros" ,'acr_registo.updated_at as fecha'
            ];

            $estados = ['1', '2', '3', '4', '5', '10'];

            $data = $acreditados->select($arrayselect)->select("(select nom_op_para from parametros where nom_para='tipoacreditado' and val_op_para=formPart limit 1) as tipoacreditacion")->select("(select nom_op_para from parametros where nom_para='estadoacreditacion' and val_op_para=finacreditacion limit 1) as estado")->whereIn('finacreditacion', $estados)->join('codigosacreditacion', 'cod_coa = descuento', 'left')->orderby('acr_registo.updated_at', 'DESC')->limit(2000)->find();

        }

        $cabeceras = [
            'fecha',
        'usuario'
        ,'nombre'
        ,'apellido'
        ,'participacion'
        ,'estado'
        ,'regiones'
        ,'valor asignado'
        ,'nota'
        ,'documento'
        ,'pais residencia'
        ,'ciudad'
        ,'direccion'
        ,'nacionalidad'
        ,'localidad'
        ,'estrato'
        ,'sexo'
        ,'genero'
        ,'f nacimiento'
        ,'grupo etnico'
        ,'contacto indicativo'
        ,'contacto telefono'
        ,'contacto email'
        ,'publicacion telefono'
        ,'publicacion email'
        ,'actividad profesional'
        ,'intereses'
        , 'otros intereses'
        , 'territorios'
        , 'otros territorios' 
        ];
        


         // return view('informes/acreditados', ['registros' => $data, 'cabeceras' => $cabeceras]);
        $filename = 'Informe-acreditados-general.xlsx';

        $spreadsheet = new Spreadsheet();
        $activeWorksheet = $spreadsheet->getActiveSheet();
        $activeWorksheet->setCellValue('A1', 'usuario');
        $activeWorksheet->setCellValue('B1', 'nombre');
        $activeWorksheet->setCellValue('C1', 'apellido');
        $activeWorksheet->setCellValue('D1', 'participacion');
        $activeWorksheet->setCellValue('E1', 'estado');
        $activeWorksheet->setCellValue('F1', 'regiones');
        $activeWorksheet->setCellValue('G1', 'valor asignado');
        $activeWorksheet->setCellValue('H1', 'nota');

        $activeWorksheet->setCellValue('I1', 'documento');
        $activeWorksheet->setCellValue('J1', 'pais residencia');
        $activeWorksheet->setCellValue('K1', 'ciudad');
        $activeWorksheet->setCellValue('L1', 'direccion');
        $activeWorksheet->setCellValue('M1', 'nacionalidad');
        $activeWorksheet->setCellValue('N1', 'localidad');
        $activeWorksheet->setCellValue('O1', 'estrato');
        $activeWorksheet->setCellValue('P1', 'sexo');
        $activeWorksheet->setCellValue('Q1', 'genero');
        $activeWorksheet->setCellValue('R1', 'f nacimiento');
        $activeWorksheet->setCellValue('S1', 'grupo etnico');

        $activeWorksheet->setCellValue('T1', 'contacto indicativo');
        $activeWorksheet->setCellValue('U1', 'contacto telefono');
        $activeWorksheet->setCellValue('V1', 'contacto email');
        $activeWorksheet->setCellValue('W1', 'publicacion telefono');
        $activeWorksheet->setCellValue('X1', 'publicacion email');
        $activeWorksheet->setCellValue('Y1', 'actividad profesional');
        $activeWorksheet->setCellValue('Z1', 'intereses');
        $activeWorksheet->setCellValue('AA1', 'otros intereses');
        $activeWorksheet->setCellValue('AB1', 'territorios');
        $activeWorksheet->setCellValue('AC1', 'otros territorios');
        $fila=1;

        foreach($data as $item){
            $fila++;
            $activeWorksheet->setCellValue('A'.$fila, $item['mai_reg']); 
            $activeWorksheet->setCellValue('B'.$fila, $item['nombre']); 
            $activeWorksheet->setCellValue('C'.$fila, $item['apellido']); 
            $activeWorksheet->setCellValue('D'.$fila, $item['tipoacreditacion']); 
            $activeWorksheet->setCellValue('E'.$fila, $item['estadoacreditacion']); 
            $activeWorksheet->setCellValue('F'.$fila, $item['participaregionesparametro']); 
            $activeWorksheet->setCellValue('G'.$fila, $item['tarifaasignada']); 
            $activeWorksheet->setCellValue('H'.$fila, $item['nota']); 
            $activeWorksheet->setCellValue('I'.$fila, $item['numdocumento']); 
            $activeWorksheet->setCellValue('J'.$fila, $item['paisresidencia']); 
            $activeWorksheet->setCellValue('K'.$fila, $item['ciudadresidencia']); 
            $activeWorksheet->setCellValue('L'.$fila, $item['dirresidencia']); 
            $activeWorksheet->setCellValue('M'.$fila, $item['nacionalidad']); 
            $activeWorksheet->setCellValue('N'.$fila, $item['localidadparametro']); 
            $activeWorksheet->setCellValue('O'.$fila, $item['estratoparametro']); 
            $activeWorksheet->setCellValue('P'.$fila, $item['sexoparametro']); 
            $activeWorksheet->setCellValue('Q'.$fila, $item['identidadgenparametro']); 
            $activeWorksheet->setCellValue('R'.$fila, $item['nacimientofecha']); 
            $activeWorksheet->setCellValue('S'.$fila, $item['etniaparametro']); 

            $activeWorksheet->setCellValue('T'.$fila, $item['indicativo']); 
            $activeWorksheet->setCellValue('U'.$fila, $item['telefono']); 
            $activeWorksheet->setCellValue('W'.$fila, $item['mailcontacto']); 
            $activeWorksheet->setCellValue('X'.$fila, $item['telefonopublicacion']); 
            $activeWorksheet->setCellValue('Y'.$fila, $item['correopublicacion']); 
            $activeWorksheet->setCellValue('Z'.$fila, $item['sectoractividadparametro']); 
            $activeWorksheet->setCellValue('AA'.$fila, $item['interesesparametro']); 
            $activeWorksheet->setCellValue('AB'.$fila, $item['otrointeres']); 
            $activeWorksheet->setCellValue('AC'.$fila, $item['territorioparametros']); 
            $activeWorksheet->setCellValue('AD'.$fila, $item['mencionepaises']); 
            $activeWorksheet->setCellValue('AE'.$fila, $item['nombreempresa']); 
            $activeWorksheet->setCellValue('AF'.$fila, $item['nit']); 
            $activeWorksheet->setCellValue('AG'.$fila, $item['cargoempresa']); 
            $activeWorksheet->setCellValue('AH'.$fila, $item['direccionempresa']); 
            // echo $item['mencionepaises'];

        }
        
        $writer = new Xlsx($spreadsheet);
        $writer->save('./informes/'.$filename , );
        return $this->response->download($filename, null)->setFileName('datos.xlsx');
        

    }


    public function generarInfAcreditados()
    {
        // acreditados.php
        //    echo  $filename = 'leo';
        // header("Content-disposition: attachment; filename=" . $filename . " " . date("Y-m-d") . ".xls");
        // header("Content-Type: application/vnd.ms-excel");
        // return view('informes/acreditados');



        // return view('dev');


        //         echo "<table>
        //   <tr>
        //     <th>Company</th>
        //     <th>Contact</th>
        //     <th>Country</th>
        //   </tr>
        //   <tr>
        //     <td>Alfreds Futterkiste</td>
        //     <td>Maria Anders</td>
        //     <td>Germany</td>
        //   </tr>
        //   <tr>
        //     <td>Centro comercial Moctezuma</td>
        //     <td>Francisco Chang</td>
        //     <td>Mexico</td>
        //   </tr>
        // </table>";

    }
}