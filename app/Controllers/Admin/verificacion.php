<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
?>

<?
ini_set('display_errors', 0);
include("../mb-conexion/lib/database.php");
include("../mb-conexion/js/funciones.php");
$respuestaCaso = 0;
$caso = intval(decode_get2_base($_REQUEST['reg1']));


if ($caso != 20) {
	$caso = $caso - 217;
}
$codigo_edicion = intval(decode_get2_base($_REQUEST['reg2']));



///para el materia//
if ($_REQUEST['tipmate'] == 1) {
	$link_material = $_REQUEST['youtube'];
	$tipo_material = 'Youtube';
}

if ($_REQUEST['tipmate'] == 2) {
	$link_material = $_REQUEST['vimeo'];
	$tipo_material = 'Vimeo';
}
///para el materia//

//echo $caso."---".$codigo_edicion;

if ($codigo_edicion != 0) {
	switch ($caso) {
		case 1:
			$compos = " titori='" . correcion_html_utf8($_REQUEST['titori']) . "' , titeng='" . correcion_html_utf8($_REQUEST['titeng']) . "', titesp='" . correcion_html_utf8($_REQUEST['titesp']) . "', 	pais='" . $_REQUEST['pais'] . "' , paises='" . correcion_html_utf8($_REQUEST['paises']) . "', dire='" . correcion_html_utf8($_REQUEST['dire']) . "' , yearf='" . $_REQUEST['yearf'] . "' , gene='" . correcion_html_utf8($_REQUEST['gene']) . "' , direbio='" . correcion_html_utf8($_REQUEST['direbio']) . "', direbio_en='" . correcion_html_utf8($_REQUEST['direbioEn']) . "', sinoeng='" . correcion_html_utf8($_REQUEST['sinoeng']) . "' , sinoesp='" . correcion_html_utf8($_REQUEST['sinoesp']) . "' , prem= '" . correcion_html_utf8($_REQUEST['prem']) . "', prem_fest= '" . $_REQUEST['premf'] . "' , premio1= '" . correcion_html_utf8($_REQUEST['premio1']) . "' , premio2= '" . correcion_html_utf8($_REQUEST['premio2']) . "' , premio3= '" . correcion_html_utf8($_REQUEST['premio3']) . "' , premio4= '" . correcion_html_utf8($_REQUEST['premio4']) . "' , premio5= '" . correcion_html_utf8($_REQUEST['premio5']) . "' , premio6= '" . correcion_html_utf8($_REQUEST['premio6']) . "'  , genero1= '" . $_REQUEST['genero1'] . "'  , genero2= '" . $_REQUEST['genero2'] . "'  , genero3= '" . $_REQUEST['genero3'] . "'  , otro_gene= '" . $_REQUEST['otro_gene'] . "'  ";  //
			$respuesta = editar_registro("paso1", $compos, "cod_usu", $codigo_edicion, $interfaz);
			$campos_inscripcion = " cod_pas_est='2'";
			editar_registro("paso_inscripcion", $campos_inscripcion, "cod_usu_est", $codigo_edicion, $interfaz);
			echo $respuestaCaso = 1;
			break;

		case 2:
			$compos = " comp='" . correcion_html_utf8($_REQUEST['comp']) . "', prod='" . correcion_html_utf8($_REQUEST['prod']) . "', proexe='" . correcion_html_utf8($_REQUEST['proexe']) . "', guion='" . correcion_html_utf8($_REQUEST['guion']) . "' , edit='" . correcion_html_utf8($_REQUEST['edit']) . "', dirfoto='" . correcion_html_utf8($_REQUEST['dirfoto']) . "' , music='" . correcion_html_utf8($_REQUEST['music']) . "' , cast='" . correcion_html_utf8($_REQUEST['cast']) . "'

, reparto1='" . correcion_html_utf8($_REQUEST['reparto1']) . "' , reparto2='" . correcion_html_utf8($_REQUEST['reparto2']) . "' , reparto3='" . correcion_html_utf8($_REQUEST['reparto3']) . "' , reparto4='" . correcion_html_utf8($_REQUEST['reparto4']) . "' , reparto5='" . correcion_html_utf8($_REQUEST['reparto5']) . "' , reparto6='" . correcion_html_utf8($_REQUEST['reparto6']) . "'
			";
			$respuesta = editar("paso2", $compos, "cod_usu", $codigo_edicion, $interfaz);
			$campos_inscripcion = " cod_pas_est='3'";
			editar_registro("paso_inscripcion", $campos_inscripcion, "cod_usu_est", $codigo_edicion, $interfaz);
			echo $respuestaCaso = 1;
			break;

		case 3:
		//if($_FILES['dilogo']['name']!=""){
			if ($_REQUEST['dilogo'] != "") {
			//$nombre_archivo_dilogo=subir_imagen($_FILES['dilogo'],"../adjuntos/",$valor_edicion);	
			//$nombre_archivo_dilogo = " ,dilogo='".$nombre_archivo_dilogo."' ";
				$nombre_archivo_dilogo = " ,dilogo='" . $_REQUEST['dilogo'] . "' ";
			}

		//if($_FILES['dclogo']['name']!=""){
			if ($_REQUEST['dclogo'] != "") {
			//$nombre_archivo_dclogo=subir_imagen($_FILES['dclogo'],"../adjuntos/",$valor_edicion);	
			//$nombre_archivo_dclogo = " ,dclogo='".$nombre_archivo_dclogo."' ";
				$nombre_archivo_dclogo = " ,dclogo='" . $_REQUEST['dclogo'] . "' ";
			}

			
			
			
			 $compos = " dinter='" . correcion_html_utf8($_REQUEST['dinter']) . "' , diname='" . correcion_html_utf8($_REQUEST['diname']) . "', dicont='" . correcion_html_utf8($_REQUEST['dicont']) . "',  descontact='" . correcion_html_utf8($_REQUEST['descontact']) . "', diemail='" . correcion_html_utf8($_REQUEST['diemail']) . "' , ditel='" . correcion_html_utf8($_REQUEST['ditel']) . "' , diterri='" . correcion_html_utf8($_REQUEST['diterri']) . "' , dcotro='" . correcion_html_utf8($_REQUEST['dcotro']) . "' , dcname='" . correcion_html_utf8($_REQUEST['dcname']) . "' , dccont='" . correcion_html_utf8($_REQUEST['dccont']) . "' , dcemail='" . $_REQUEST['dcemail'] . "' , dctel= '" . $_REQUEST['dctel'] . "', desname='" . correcion_html_utf8($_REQUEST['desname']) . "'  ,descemail='" . $_REQUEST['descemail'] . "' , desctel='" . $_REQUEST['desctel'] . "' , descpais='" . $_REQUEST['descpais'] . "'  , dcotro1='" . correcion_html_utf8($_REQUEST['dcotro1']) . "' , dcname1='" . correcion_html_utf8($_REQUEST['dcname1']) . "' , dccont1='" . correcion_html_utf8($_REQUEST['dccont1']) . "' , dctel1='" . $_REQUEST['dctel1'] . "' , dcemail1='" . $_REQUEST['dcemail1'] . "', dcolom='" . correcion_html_utf8($_REQUEST['dcolom']) . "'   " . $nombre_archivo_dilogo . "   " . $nombre_archivo_dclogo . "   ";
			$respuesta = editar("paso3", $compos, "cod_usu", $codigo_edicion, $interfaz);
			$campos_inscripcion = " cod_pas_est='4'";
			editar_registro("paso_inscripcion", $campos_inscripcion, "cod_usu_est", $codigo_edicion, $interfaz);
			echo $respuestaCaso = 1;
			break;

		case 4:
			$compos = " files='" . $_REQUEST['files'] . "' , trailer='" . $_REQUEST['trailer'] . "' , tipo_trailler='" . $tipo_material . "' , url_trailer='" . $link_material . "' , afiche_alta='" . $_REQUEST['afiche_alta'] . "' ";
			$respuesta = editar("paso4", $compos, "cod_usu", $codigo_edicion, $interfaz);
			$campos_inscripcion = " cod_pas_est='5'";
			
			editar_registro("paso_inscripcion", $campos_inscripcion, "cod_usu_est", $codigo_edicion, $interfaz);
			echo $respuestaCaso = 1;
			break;

		case 5:

			$compos = " time='" . $_REQUEST['time'] . "' , format='" . correcion_html_utf8($_REQUEST['format']) . "', dcpesp='" . correcion_html_utf8($_REQUEST['dcpesp']) . "', dcpasp='" . correcion_html_utf8($_REQUEST['dcpasp']) . "' , kdm='" . correcion_html_utf8($_REQUEST['kdm']) . "', numbob='" . correcion_html_utf8($_REQUEST['numbob']) . "' , audio='" . correcion_html_utf8($_REQUEST['audio']) . "' , color='" . correcion_html_utf8($_REQUEST['color']) . "' , idifilm='" . correcion_html_utf8($_REQUEST['idifilm']) . "' , subcop='" . correcion_html_utf8($_REQUEST['subcop']) . "' , spolist='" . correcion_html_utf8($_REQUEST['spolist']) . "' , subele= '" . correcion_html_utf8($_REQUEST['subele']) . "' , idisub= '" . correcion_html_utf8($_REQUEST['idisub']) . "' , spotlist= '" . correcion_html_utf8($_REQUEST['spotlist']) . "', trad_pel= '" . correcion_html_utf8($_REQUEST['trad_pel']) . "'  , otro_formato= '" . correcion_html_utf8($_REQUEST['otro_formato']) . "' , ospolist= '" . correcion_html_utf8($_REQUEST['ospolist']) . "' , oidisub= '" . correcion_html_utf8($_REQUEST['oidisub']) . "' , osubele= '" . correcion_html_utf8($_REQUEST['osubele']) . "'  , spot_pel= '" . $_REQUEST['spot_pel'] . "'   ";


			//osubele
			$respuesta = editar("paso5", $compos, "cod_usu", $codigo_edicion, $interfaz);
			$campos_inscripcion = " cod_pas_est='6'";
			editar_registro("paso_inscripcion", $campos_inscripcion, "cod_usu_est", $codigo_edicion, $interfaz);
			echo $respuestaCaso = 1;
			break;

		case 6:
			$compos = " acepto='terminado'  ";
			$respuesta = editar("paso5", $compos, "cod_usu", $codigo_edicion, $interfaz);
			$campos_inscripcion = " cod_pas_est='7'  ";
			editar_registro("paso_inscripcion", $campos_inscripcion, "cod_usu_est", $codigo_edicion, $interfaz);

			$to = "luisfelipe.r@biff.co";
			$subject = "Cierre del procesos pelicula ".$codigo_edicion;
			$message = "Cierre del procesos pelicula ".$codigo_edicion;
			mail($to, $subject, $message);
			echo $respuestaCaso = 1;
			break;

		case 7:
			
			echo $respuestaCaso = 1;
			break;

		case 11:
			if ($_FILES['fot_par']['name'] != "") {
				$nombre_archivo_dilogo = subir_imagen($_FILES['fot_par'], "adjuntos/", $valor_edicion);
				$nombre_archivo_dilogo = " ,fot_par='" . $nombre_archivo_dilogo . "' ";
			}
			$compos = " nom_par='" . correcion_html_utf8($_REQUEST['nom_par']) . "', ape_par='" . correcion_html_utf8($_REQUEST['ape_par']) . "', com_par='" . correcion_html_utf8($_REQUEST['com_par']) . "', tit_par='" . correcion_html_utf8($_REQUEST['tit_par']) . "', fec_par='" . $_REQUEST['fec_par'] . "', email_par='" . $_REQUEST['email_par'] . "', dir_par='" . correcion_html_utf8($_REQUEST['dir_par']) . "', pai_par='" . $_REQUEST['pais'] . "', tel_par='" . correcion_html_utf8($_REQUEST['tel_par']) . "', doc_par='" . correcion_html_utf8($_REQUEST['doc_par']) . "', web_par='" . correcion_html_utf8($_REQUEST['web_par']) . "', mot_par='" . correcion_html_utf8($_REQUEST['mot_par']) . "', per_par='" . correcion_html_utf8($_REQUEST['per_par']) . "', cod_per_par='" . $_REQUEST['perfil'] . "'   $nombre_archivo_dilogo   ";
			$respuesta = editar("participantes", $compos, "cod_par", $codigo_edicion, $interfaz);
			echo $respuestaCaso = 1;
			break;



		case 20:
			$compos = " cod_tip_sm='" . $_REQUEST['tipmate'] . "' , link_sm='" . $_REQUEST['youtube'] . "', vim_sm='" . $_REQUEST['video'] . "'  ";
		//echo $codigo_edicion;
			$respuesta = editar_registro("subir_material", $compos, "cod_usu_sm", $codigo_edicion, $interfaz);

			echo $respuestaCaso = 1;
			break;
	}
}
?>
