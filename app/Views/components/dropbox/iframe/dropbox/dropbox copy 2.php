<?php
// var_dump($_SESSION['dropbox']);
//error_reporting(E_ALL);
//ini_set('display_errors', '1');
// var_dump($contenidoDirectorio);
// exit();
include("include/conexion.php");
include("include/funciones.php");
?>
<!DOCTYPE html>
<html lang="en">
<?php  include("include/head.php");  ?>

<body>
    <section class="container">
        <div class="row">
            <div class="col-xs-12">
                <p>


                </p>
            </div>
        </div>

        <table class="table table-hover">
            <!-- <a href="#">navegar</a> -->

            <thead class="small">
                <tr>
                    <th style="width: 39px;"></th>
                    <th class="no-strong text-left">
                        <a href="#">Nombre de archivo<img style="border:0;" alt="asc"
                                src="/panel/iframe/iconos/arrow_down" /></a>
                    </th>
                    <th class="no-strong text-center hidden-xs" style="width: 156px;"><a href="#">Ultima
                            modificación&nbsp;</a></th>
                    <th class="no-strong text-center" style="width: 97.5px;"><a href="#">Medida&nbsp;</a></th>
                    <th class="no-strong text-center" style="width: 39px;">V</th>
                </tr>
            </thead>

            <tbody>


                <?php
                // echo var_dump($_SESSION['dropbox']['ruta']);
                // echo $url.'----';
                  //echo $_REQUEST['raiz']."   +  +  ".$url;  
                  if($_SESSION['dropbox']['ruta']!=$url){  ?>
                <tr>
                    <td><img alt="dir" src="/panel/iframe/iconos/folder-home"></td>
                    <td class='text-left'><a onclick='history.back()' href='#'>...</a></td>
                    <td class="hidden-xs"></td>
                    <td></td>
                    <td></td>
                </tr>
                <?php  }

                  ?>
                <!-- <td class="text-left"><a onclick='alert(10)' href='#'  >...</a></td> -->



                <?php 
              
               	foreach ($datos as &$valor) {
   					    // print_r($valor);
   					    $contenido = (array) $valor;
   					    //print_r($contenido['name']);
   					    explorer($contenido);
   					    //echo "<br><hr>";
					    }
               ?>
            </tbody>
        </table>
    </section>
</body>



</html>