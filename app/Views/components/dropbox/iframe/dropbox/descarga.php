<?php
// include("include/conexion.php");


set_time_limit(0);

$url = 'https://content.dropboxapi.com/2/files/download';
        
$formData = [
    "path"=> '/PV/T 2 - 2022/01 PRESENTACIÓN Y VIDEOS KIT DE DESPLIEGUE PAC 2 2022/PAC t2 2022 3er corte.mp4'
];

$file='01 PRESENTACIÓN Y VIDEOS KIT DE DESPLIEGUE PAC 2 2022/PAC t2 2022 3er corte.mp4';

$ch = curl_init($url);
$authorization = "Authorization: Bearer sl.BPYaGZAuV8MBpbsBp0ImKCulyKsgp3ZxsC3dOWdts8mJr5CIux1n4eW2c9vdHdk1xxWyCJzUChPw3gJIhpFGH1_GV79jIb0Nh5ENLKJFWKebx_ZF7m5-ee4xf5DSW5Gl61bxO1IL";
$request_data = "Dropbox-API-Arg: ".json_encode($formData);
curl_setopt($ch, CURLOPT_HTTPHEADER, array($authorization, 'Dropbox-Api-Arg: {"path":"/PV/T 2 - 2022/01 PRESENTACIÓN Y VIDEOS KIT DE DESPLIEGUE PAC 2 2022/PAC t2 2022 3er corte.mp4"}','Content-Type: application/octet-stream'));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, 1); 
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_FILE, $file);


// exit;
$result = curl_exec($ch);
var_dump($result);
curl_close($ch);



// $file='Un video de 10 segundos.mp4';

/*
header('Content-Description: File Transfer');
header('Content-Type: application/force-download');
header('Content-Type: application/octet-stream');
header('Content-disposition: attachment; filename='.basename($file));
header('Content-Transfer-Encoding: binary');
*/
// print_r($result);



// include("include/conexion.php");

// echo $file = $_REQUEST['url']; 

// set_time_limit(0);

// $url = 'https://content.dropboxapi.com/2/files/download';
        
// $formData = [
//     "path"=> '$file'
// ];

// //print_r($formData);


// //$file='Un video de 10 segundos.mp4';

// $ch = curl_init($url);
// echo $authorization = $tokenConsulta;
// $request_data = "Dropbox-API-Arg: ".json_encode($formData);
// curl_setopt($ch, CURLOPT_HTTPHEADER, array($authorization, 'Dropbox-Api-Arg: {"path":"/PV/T 3 - 2022/01 PRESENTACIÓN Y VIDEOS KIT DE DESPLIEGUE PAC 3 2022Capsula video accesorios PAC 3 2022.mp4"}','Content-Type: application/octet-stream'));
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// curl_setopt($ch, CURLOPT_POST, 1); 
// curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
// curl_setopt($ch, CURLOPT_FILE, $file);

// $result = curl_exec($ch);
// var_dump($result);
// curl_close($ch);
// // $file='Un video de 10 segundos.mp4';
// // exit;
// // header('Content-Description: File Transfer');
// // header('Content-Type: application/force-download');
// // header('Content-Type: application/octet-stream');
// // header('Content-disposition: attachment; filename='.basename($file));
// // header('Content-Transfer-Encoding: binary');
// print_r($result);
?>


