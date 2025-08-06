<?php 

// Prepare new cURL resource
$ch = curl_init('https://api.dropbox.com/oauth2/token');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLINFO_HEADER_OUT, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=refresh_token&refresh_token=od00fBC88yEAAAAAAAAAAdWt_VAE6iGDeY9xZfP3dR_5AGGcyf5ocNxbfwVGmKW-");


// Set HTTP Header for POST request 
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Authorization: Basic MDBmb24xcnlieDllZHZ5OnRyMjJwdDlwcmEwNnZwMA==' , 'Content-Type: application/x-www-form-urlencoded' )
);

//print_r($ch);
// Submit the POST request
$result = curl_exec($ch);

//exit;
$arr = JSON2Array($result);

//print_r($arr['access_token']);
// Close cURL session handle
// exit;
curl_close($ch);
$tokenConsulta = $arr['access_token'];

//exit;

function JSON2Array($data){
    return  (array) json_decode(stripslashes($data));
}

$url= $contenidoDirectorio;
// $url= 'VN/PAC VN/';

//echo "leo".$url;
$data = array(
    'include_deleted' => false,
    'include_has_explicit_shared_members' => false,
    'include_media_info' => false,
    'include_mounted_folders' => false,
    'include_non_downloadable_files' => false,
   'path' => "/".$url,
    'recursive' => false,
    
);


 
$payload = json_encode($data);

// var_dump($payload);
//exit;

$tokenConsulta = "Bearer $tokenConsulta" ;

//echo $tokenConsulta;

//echo "    -------<br>";
//exit;

$ch = curl_init('https://api.dropboxapi.com/2/files/list_folder');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLINFO_HEADER_OUT, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

// Set HTTP Header for POST request 
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    "Authorization: $tokenConsulta" ,"Content-Type: application/json")
);
// Submit the POST request

$result = curl_exec($ch);
$archivos = JSON2Array($result);
// print_r($archivos);
// exit;
curl_close($ch);
$datos = $archivos['entries'];
// var_dump($datos);
// exit;
?>