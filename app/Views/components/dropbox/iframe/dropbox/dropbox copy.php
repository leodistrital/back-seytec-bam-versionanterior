<?php


//error_reporting(E_ALL);
//ini_set('display_errors', '1');


include("include/conexion.php");

include("include/funciones.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <title>explorer</title>
    <style>
        /* Fonts from Google Fonts */
        <blade import|%20url(https%3A%2F%2Ffonts.googleapis.com%2Fcss%3Ffamily%3DSource%2BSans%2BPro%3A400%2C400italic%2C700%2C700italic)%3B><blade font|-face%20%7B>font-family: 'NouvelR';
        src: url('../../fonts/NouvelR-Light.woff2') format('woff2');
        font-weight: 200;
        font-style: normal;
        }

        <blade font|-face%20%7B>font-family: 'NouvelR';
        src: url('../../fonts/NouvelR-Book.woff2') format('woff2');
        font-weight: 300;
        font-style: normal;
        }

        <blade font|-face%20%7B>font-family: 'NouvelR';
        src: url('../../fonts/NouvelR-Regular.woff2') format('woff2');
        font-weight: 400;
        font-style: normal;
        }

        <blade font|-face%20%7B>font-family: 'NouvelR';
        src: url('../../fonts/NouvelR-Semibold.woff2') format('woff2');
        font-weight: 600;
        font-style: normal;
        }

        <blade font|-face%20%7B>font-family: 'NouvelR';
        src: url('../../fonts/NouvelR-Bold.woff2') format('woff2');
        font-weight: 700;
        font-style: normal;
        }

        <blade font|-face%20%7B>font-family: 'NouvelR';
        src: url('../../fonts/NouvelR-Extrabold.woff2') format('woff2');
        font-weight: 800;
        font-style: normal;
        }

        <blade font|-face%20%7B>font-family: 'NouvelRVariable';
        src: url('../../fonts/NouvelR-Variable.woff2') format('woff2');
        font-weight: 800;
        font-style: normal;
        }

        <blade import|%20url(%2F%2Ffonts.googleapis.com%2Fcss%3Ffamily%3DUbuntu%3A300%2C400%2C500%2C700%2C300italic%2C400italic%2C500italic%2C700italic%26subset%3Dlatin%2Clatin-ext)%3B><blade import|%20url(%2F%2Ffonts.googleapis.com%2Fcss%3Ffamily%3DUbuntu%2BMono%3A400%2C700%2C400italic%2C700italic%26subset%3Dlatin%2Clatin-ext)%3B><blade import|%20url(%2F%2Ffonts.googleapis.com%2Fearlyaccess%2Fnanumgothic.css)%3B><blade import|%20url(%2F%2Ffonts.googleapis.com%2Fearlyaccess%2Fnanumgothiccoding.css)%3B>

        /* Some elements from Apaxy */
        * {
            /*margin:0;
         padding:0;*/
        }

        html {
            min-height: 100%;
            padding-top: 1em;
            padding-bottom: 1em;
            /*border-top: 10px solid #eee;
         border-bottom: 10px solid #eee;*/
            color: #61666c;
            line-height: 10px;
        }

        .font-monospace {
            font-family: 'NouvelR';
            font-weight: 400;
        }

        .font-sans-serif {
            font-family: 'NouvelR';
            font-weight: 500;
        }

        strong,
        .strong {
            font-weight: 500;
        }

        .no-strong {
            font-weight: 300;
        }

        .transparent {
            border: 0px;
        }

        .container {
            width: 100%;
        }

        a:link {
            text-decoration: none;
            color: #61666c;
        }

        a:visited {
            color: #61666c;
        }

        a:hover {
            color: #2d2d2d;
        }

        a:active {
            color: #2d2d2d;
        }

        a:focus {
            color: #2d2d2d;
        }

        table {
            table-layout: fixed;
        }

        tr {
            height: 39px;
            text-align: center;
        }

        th {
            white-space: nowrap;
        }

        td {
            word-wrap: break-word;
        }

        td a:link {
            display: block;
        }

        .btn {
            font-weight: 300;
        }

        .btn-file {
            position: relative;
            overflow: hidden;
        }

        .btn-file input[type=file] {
            position: absolute;
            top: 0;
            right: 0;
            min-width: 100%;
            min-height: 100%;
            font-size: 100px;
            text-align: right;
            filter: alpha(opacity=0);
            opacity: 0;
            background: red;
            cursor: inherit;
            display: block;
        }

        input[readonly] {
            background-color: white !important;
            cursor: text !important;
        }
    </style>
</head>

<body>
    <section class="container">
        <div class="row">
            <div class="col-xs-12">
                <p>
                    <!-- <a href="?dir=/#simplex">/ T 3 - 2022 </a>  -->
                    <!--  <a href="?dir=/01%20PRESENTACIO%CC%81N%20Y%20VIDEOS%20KIT%20DE%20DESPLIEGUE%20PAC%203%202022/#simplex">
                    <?=$_REQUEST['dir']?></a> -->
                </p>
            </div>
        </div>

        <table class="table table-hover">

            <thead class="small">
                <tr>
                    <th style="width: 39px;"></th>
                    <th class="no-strong text-left">
                        <a href="#">Nombre de archivo<img style="border:0;" alt="asc"
                                src="simplex.php?img=arrow_down" /></a>
                    </th>
                    <th class="no-strong text-center hidden-xs" style="width: 156px;"><a href="#">Ultima
                            modificación&nbsp;</a></th>
                    <th class="no-strong text-center" style="width: 97.5px;"><a href="#">Medida&nbsp;</a></th>
                    <th class="no-strong text-center" style="width: 39px;">V</th>
                </tr>
            </thead>

            <tbody>


                <?php
                  //echo $_REQUEST['raiz']."   +  +  ".$url;  
                  if($_REQUEST['raiz']!=$url){  ?>
                <tr>
                    <td><img alt="dir" src="simplex.php?img=folder-home"></td>
                    <td class='text-left'><a onclick='history.back()' href='#'>...</a></td>
                    <td class="hidden-xs"></td>
                    <td></td>
                    <td></td>
                </tr>
                <?php  }

                  ?>
                <!-- <td class="text-left"><a onclick='alert(10)' href='#'  >...</a></td> -->



                <?php 
             //  print_r($datos);
              //   echo "+++++";
               	foreach ($datos as &$valor) {
   					    //print_r($valor);
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

<script type="text/javascript">
    function cambiarlocation(nombrecarpeta) {
        console.log(location.href, nombrecarpeta)
        let rutaCompoleta = location.href + "/" + nombrecarpeta
        // return false;
        location.href = rutaCompoleta;

    }


    function descargarArvhivo(archivo) {
        let urldescarga = 'descarga.php?url=' + '<?=$url?>' + archivo;
        console.log(urldescarga)
        window.open(urldescarga, "_blank");

    }
</script>

</html>