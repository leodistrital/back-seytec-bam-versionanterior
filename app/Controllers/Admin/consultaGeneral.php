<?php
$db = new Database();

$sql = "select * from $tabla where cod_usu=$codigoregistro";

$db->query($sql);
$db->next_row();


//Paso 1
$titori = $db->titori;
$titeng = $db->titeng;
$titesp = $db->titesp;
$pais = $db->pais;
$paises = $db->paises;
$dire = $db->dire;
$yearf = $db->yearf;
$gene = $db->gene;
$direbio = $db->direbio;
$direbioEn = $db->direbio_en;
$sinoeng = $db->sinoeng;
$sinoesp = $db->sinoesp;
$prem = $db->prem;
$prem_fest = $db->prem_fest;


$premio1 = $db->premio1;
$premio2 = $db->premio2;
$premio3 = $db->premio3;
$premio4 = $db->premio4;
$premio5 = $db->premio5;
$premio6 = $db->premio6;

$genero1 = $db->genero1;
$genero2 = $db->genero2;

$genero3 = $db->genero3;

$otro_gene = $db->otro_gene;







//Paso 2
$comp = $db->comp;
$prod = $db->prod;
$proexe = $db->proexe;
$guion = $db->guion;
$edit = $db->edit;
$dirfoto = $db->dirfoto;
$music = $db->music;
$cast = $db->cast;

//Paso 3
$dinter = $db->dinter;
$diname = $db->diname;
$dicont = $db->dicont;
$diemail = $db->diemail;
$ditel = $db->ditel;
$dilogo = $db->dilogo;
$diterri = $db->diterri;
$dcotro = $db->dcotro;
$dcname = $db->dcname;
$dcemail = $db->dcemail;
$dctel = $db->dctel;
$dclogo = $db->dclogo;
$desname = $db->desname;
$descontact = $db->descontact;
$dcotro1 = $db->dcotro1;
$dcname1 = $db->dcname1;
$dccont1 = $db->dccont1;
$dcemail1 = $db->dcemail1;
$dctel1 = $db->dctel1;
$descpais = $db->descpais;
$desctel = $db->desctel;
$descemail = $db->descemail;
$descont = $db->descont;
$dcolom = $db->dcolom;

$reparto1 = $db->reparto1;
$reparto2 = $db->reparto2;
$reparto3 = $db->reparto3;
$reparto4 = $db->reparto4;
$reparto5 = $db->reparto5;
$reparto6 = $db->reparto5;

//Paso 4
$files = $db->files;
$trailer = $db->trailer;

$tipmate = $db->tipo_trailler;

if ($tipmate == "Youtube") {
	$youtube = $db->url_trailer;
	$vimeo = "";
	$div_activo_vimeo = "";
	$div_activo_youtube = "active";
}

if ($tipmate == "Vimeo") {
	$youtube = "";
	$vimeo = $db->url_trailer;
	$div_activo_vimeo = "active";
	$div_activo_youtube = "";
}

$afiche_alta= $db->afiche_alta;


//echo $youtube."  -  ".$vimeo."  -  ".$div_activo_vimeo."  -  ".$div_activo_youtube."***".$tipmate;


//Paso5
$time = $db->time;

$format = $db->format;
$dcpesp = $db->dcpesp;
$dcpasp = $db->dcpasp;
$kdm = $db->kdm;
$numbob = $db->numbob;
$audio = $db->audio;
$color = $db->color;
$idifilm = $db->idifilm;
$subcop = $db->subcop;
$idisub = $db->idisub;
$spotlist = $db->spotlist;
$subele = $db->subele;
$term = $db->term;
$spolist = $db->spolist;
$trad_pel = $db->trad_pel;

$otro_formato = $db->otro_formato;
$ospolist = $db->ospolist;
$oidisub = $db->oidisub;
$osubele = $db->osubele;
$spot_pel = $db->spot_pel;


?>
