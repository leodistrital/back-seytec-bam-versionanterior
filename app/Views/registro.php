<?php
echo $this->include("components/cabezote/head");
echo $this->include('components/cabezote/header');
?>
<?php
echo $this->include("components/internas/banner_interno");
?>
<section class="gMSection_interna">
    <?php
    echo $this->include("components/internas/contenido");
    if($seccion=='registro'){
        echo $this->include("acreditaciones/formularios/formregistro");
    }
    if($seccion=='activacion'){
        echo $this->include("acreditaciones/formularios/formractivacion");
    }
     if($seccion=='recuperar'){
        echo $this->include("acreditaciones/formularios/formrecuperar");
    }
    ?>
</section>
<?php
echo $this->include('components/footer/foot.php');
?>