<?php
ini_set("memory_limit","512M");
// include("include/conexion.php");
// echo $tokenConsulta;
$file = $id;
// Prepare new cURL resource
$ch = curl_init('https://api.dropbox.com/oauth2/token');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLINFO_HEADER_OUT, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=refresh_token&refresh_token=od00fBC88yEAAAAAAAAAAdWt_VAE6iGDeY9xZfP3dR_5AGGcyf5ocNxbfwVGmKW-");


// // Set HTTP Header for POST request 
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Authorization: Basic MDBmb24xcnlieDllZHZ5OnRyMjJwdDlwcmEwNnZwMA==' , 'Content-Type: application/x-www-form-urlencoded' )
);

$result = curl_exec($ch);
$arr = JSON2Array($result);

curl_close($ch);
$tokenConsulta = $arr['access_token'];


function JSON2Array($data){
    return  (array) json_decode(stripslashes($data));
}


$tokenConsulta = "Bearer $tokenConsulta" ;


$parameters = array('path' => "$file");
// print_r($parameters);
$headers = array("Authorization: $tokenConsulta",
                 'Content-Type: application/json');

$curlOptions = array(
        CURLOPT_HTTPHEADER => $headers,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => json_encode($parameters),
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_VERBOSE => true
    );

$ch = curl_init('https://api.dropboxapi.com/2/sharing/create_shared_link_with_settings');
curl_setopt_array($ch, $curlOptions);
 // print_r($ch);
$response = curl_exec($ch);
 // print_r($response);
$response = curl_exec($ch);
// $response = curl_exec($ch);
$inforlink = JSON2Array($response);
// print_r($inforlink['url']);
// exit;
// echo $urlDescarga = $inforlink['error']->shared_link_already_exists->metadata->url; // codigo anterior
// echo " ++++ ";
$urlDescarga =$inforlink['url'];
echo $urlDescarga =  str_replace("?dl=0","?dl=1",$urlDescarga);
curl_close($ch);
exit;
// echo $urlDescarga;
// header("Location: $urlDescarga"); 
// $this->response->download('/path/to/photo.jpg', null);
// var_dump($this->response);
// var_dump($this);

return redirect()->to('https://www.dropbox.com/s/1hxdh7stop2qf9h/AF%20Backing_PAC3_Sin%20Oferta_TBB_Stepway%20200%20x%20200%20Cms%20Informe.txt?dl=1');
?>


<script type="text/javascript">
// window.location.href = '<?=$urlDescarga?>';
// window.close();
</script>