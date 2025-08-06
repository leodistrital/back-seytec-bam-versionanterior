<?php 

function fileOrFolderIcon($tipo,$extension ,$nombreDelArchivo){
    $url =  $_SERVER["REQUEST_URI"] . "/".$nombreDelArchivo ;

if($tipo=='folder'){
	echo "<td><a href='$url'><img alt='folder' src='/panel/iframe/iconos/folder'></td>";
} 
if($tipo=='file'){
	echo "<td><img alt='mp4' src='/panel/iframe/iconos/".$extension."'></td>";
} 
} 


function descargar($tipo,$ruta){
	if($tipo!='folder'){
	 echo "<td class='download'><img src='/panel/iframe/iconos/browser_download' alt='descargar'></td>";
	} else {
	 echo "<td class='download'  ></td>";
	}
} 


function formatBytes($size, $precision = 2)
{
    if(!empty($size)){
    $base = log($size, 1024);
    $suffixes = array('', 'KB', 'MB', 'G', 'T');   
    return round(pow(1024, $base - floor($base)), $precision) .' '. $suffixes[floor($base)];
    }
}


 function accionArchivo($tipo,$extension ,$nombreDelArchivo ,$idDelArchivo){

   // echo $url = $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
//    echo $nombreDelArchivo= str_replace('/','@@@',$nombreDelArchivo);
//    echo '++++';
   $url =  $_SERVER["REQUEST_URI"] . "@@@".$nombreDelArchivo ;
   //echo "<br>";
   if($tipo=='folder'){
      echo "<td class='text-left'><a href='$url'>".$nombreDelArchivo."</a></td>";
   } 
   if($tipo=='file'){
      echo "<td class='text-left'><a href='/panel/iframe/descargar/$idDelArchivo' target='_blank' >".$nombreDelArchivo."</a></td>";
   } 
} 



function explorer($data){

	//var_dump($data['id']);
	//echo "<br>";
	$nombreDelArchivo = $data['name'];
	$idDelArchivo = $data['id'];
	$nombreDelArchivo = htmlcode($nombreDelArchivo);
	if (isset($data['size'])) {
    	// echo "The 'first' element is in the array";
		$tamano = formatBytes($data['size']);
	} else {
		$tamano ='';
	}

	if (isset($data['server_modified'])) {
    	$fecha = substr($data['server_modified'], 0, 10);
	} else {
		$fecha ='';
	}


	// $tamano = formatBytes($data['size']);
	// $fecha = substr($data['server_modified'], 0, 10);
	$extension = pathinfo($nombreDelArchivo, PATHINFO_EXTENSION);
	$tipo = $data['.tag'];
	echo "<tr>";
	fileOrFolderIcon($tipo, $extension ,$nombreDelArchivo);
	accionArchivo($tipo,$extension ,$nombreDelArchivo , $idDelArchivo);
	echo "<td class='hidden-xs'>".$fecha."</td>";
	echo "<td>".$tamano."</td>";
	descargar($tipo,$extension);
	//htmlcode($nombreDelArchivo);
	echo "</tr>";
}

function htmlcode($nombreDelArchivo){


	$caracteres[1] = array('original'=>'u00bf' , 'html' =>'¿');
	$caracteres[2] = array('original'=>'u00c0' , 'html' =>'À');
	$caracteres[3] = array('original'=>'u00c1' , 'html' =>'Á');
	$caracteres[4] = array('original'=>'u00c2' , 'html' =>'Â');
	$caracteres[5] = array('original'=>'u00c3' , 'html' =>'Ã');
	$caracteres[6] = array('original'=>'u00c4' , 'html' =>'Ä');
	$caracteres[7] = array('original'=>'u00c5' , 'html' =>'Å');
	$caracteres[8] = array('original'=>'u00c7' , 'html' =>'Ç');
	$caracteres[9] = array('original'=>'u00c8' , 'html' =>'È');
	$caracteres[10] = array('original'=>'u00c9' , 'html' =>'É');
	$caracteres[11] = array('original'=>'u00ca' , 'html' =>'Ê');
	$caracteres[12] = array('original'=>'u00cb' , 'html' =>'Ë');
	$caracteres[13] = array('original'=>'u00cc' , 'html' =>'Ì');
	$caracteres[14] = array('original'=>'u00cd' , 'html' =>'Í');
	$caracteres[15] = array('original'=>'u00ce' , 'html' =>'Î');
	$caracteres[16] = array('original'=>'u00cf' , 'html' =>'Ï');
	$caracteres[17] = array('original'=>'u00d1' , 'html' =>'Ñ');
	$caracteres[18] = array('original'=>'u00d2' , 'html' =>'Ò');
	$caracteres[19] = array('original'=>'u00d3' , 'html' =>'Ó');
	$caracteres[20] = array('original'=>'u00d4' , 'html' =>'Ô');
	$caracteres[21] = array('original'=>'u00d5' , 'html' =>'Õ');
	$caracteres[22] = array('original'=>'u00d6' , 'html' =>'Ö');
	$caracteres[23] = array('original'=>'u00d7' , 'html' =>'×');
	$caracteres[24] = array('original'=>'u00d9' , 'html' =>'Ù');
	$caracteres[25] = array('original'=>'u00da' , 'html' =>'Ú');
	$caracteres[26] = array('original'=>'u00db' , 'html' =>'Û');
	$caracteres[27] = array('original'=>'u00dc' , 'html' =>'Ü');
	$caracteres[28] = array('original'=>'u00e0' , 'html' =>'à');
	$caracteres[29] = array('original'=>'u00e1' , 'html' =>'á');
	$caracteres[30] = array('original'=>'u00e2' , 'html' =>'â');
	$caracteres[31] = array('original'=>'u00e3' , 'html' =>'ã');
	$caracteres[32] = array('original'=>'u00e4' , 'html' =>'ä');
	$caracteres[33] = array('original'=>'u00e5' , 'html' =>'å');
	$caracteres[34] = array('original'=>'u00e8' , 'html' =>'è');
	$caracteres[35] = array('original'=>'u00e9' , 'html' =>'é');
	$caracteres[36] = array('original'=>'u00ea' , 'html' =>'ê');
	$caracteres[37] = array('original'=>'u00eb' , 'html' =>'ë');
	$caracteres[38] = array('original'=>'u00ec' , 'html' =>'ì');
	$caracteres[39] = array('original'=>'u00ed' , 'html' =>'í');
	$caracteres[40] = array('original'=>'u00f1' , 'html' =>'ñ');
	$caracteres[41] = array('original'=>'u00f2' , 'html' =>'ò');
	$caracteres[42] = array('original'=>'u00f3' , 'html' =>'ó');
	$caracteres[43] = array('original'=>'u00f9' , 'html' =>'ù');
	$caracteres[44] = array('original'=>'u00fa' , 'html' =>'ú');
	$caracteres[45] = array('original'=>'u00fb' , 'html' =>'û');
	$caracteres[46] = array('original'=>'u00fc' , 'html' =>'ü');



	for ($i=1; $i <47 ; $i++) { 
		$pos = strpos($nombreDelArchivo, $caracteres[$i]['original']);
		if ($pos != false) {
		   $str = str_replace( $caracteres[$i]['original'] , $caracteres[$i]['html'], $nombreDelArchivo );
		   //echo $str."<br>";
		   return $str;
		}
	}

	return $nombreDelArchivo;

}