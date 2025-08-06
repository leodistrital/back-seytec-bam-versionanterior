<?php
echo $this->include("components/cabezote/head");
echo $this->include('components/cabezote/header');
?>
<?php
echo $this->include("components/internas/banner_interno");
?>
<section class="gMSection">
    <?php
    // var_dump($contenido);
    echo $this->include("components/eventos/contenidoevento");
    
    if ($contenido['pla_mne'] == 0) {
        //echo $this->include("components/eventos/plantilla2");
    }

    if($contenido['pla_mne']==1){
        echo $this->include("components/eventos/plantilla1");
    }
    if ($contenido['pla_mne'] == 2) {
        echo $this->include("components/eventos/plantilla2");
    }

    
    ?>
</section>
<?php
echo $this->include('components/footer/foot.php');
?>