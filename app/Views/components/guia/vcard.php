<?php
/*
text/x-vcard

*/

$nombre =$vcard['nombre'];
$apellido =$vcard['apellido'];
$correopublicacion =$vcard['correopublicacion'];
$telefonopublicacion =$vcard['telefonopublicacion'];
$indicativo =$vcard['indicativo'];
$fileName = $nombre.'-'.$apellido."-vcard.vcf";

// header("Cache-Control: public");
// header("Content-Description: File Transfer");
// header("Content-Disposition: attachment; filename=$fileName");
// header("Content-Type: text/x-vcard");
// header("Content-Transfer-Encoding: binary");
        
header('Cache-Control: public');
header('Content-Description: File Transfer');
header('Content-Disposition: attachment; filename=archivo.vcard');
header('Content-Type: text/x-vcard');
echo"
BEGIN:VCARD
VERSION:3.0
FN;CHARSET=UTF-8:
N:$nombre;$apellido;
TEL;TYPE=CELL:$telefonopublicacion
EMAIL:$correopublicacion
COUNTRY:$indicativo
END:VCARD
";
?>