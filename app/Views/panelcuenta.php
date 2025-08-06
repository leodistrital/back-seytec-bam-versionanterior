<?php
echo $this->include("components/cabezote/head");
echo $this->include('components/cabezote/header');
?>
<?php
echo $this->include("components/internas/banner_interno");
?>
<section class="gMSection_interna">
    <?php
    echo $this->include("components/internas/contenidopanel");
    if ($seccion == 'panelusuario' ||  $seccion == 'panelusuariofin' ||  $seccion == 'panelusuariopago') {
        echo $this->include("acreditaciones/panel/panelusuario");
    }
    if ($seccion == 'registro') {
        echo $this->include("acreditaciones/formularios/editarformregistro");
    }

    if ($seccion == 'acreditacion') {

        // echo $paso;
        echo $this->include("acreditaciones/formularios/pasos");
        if ($paso == 1) {
            echo $this->include("acreditaciones/formularios/paso1");
        }
        if ($paso == 2) {
            echo $this->include("acreditaciones/formularios/paso2");
        }
        if ($paso == 3) {
            echo $this->include("acreditaciones/formularios/paso3");
        }
        if ($paso == 4) {
            echo $this->include("acreditaciones/formularios/paso4");
        }
        if ($paso == 5) {
            echo $this->include("acreditaciones/formularios/paso5");
        }
    }

    if ($finacreditacion == 3 || $finacreditacion == 10) {
        // if($_SESSION["id"]=='262b062d6c1db52770f1fa99e5cfcf77'){
            echo $this->include("acreditaciones/panel/guia");
        // }
    }



    ?>
</section>
<?php
echo $this->include('components/footer/foot.php');
?>