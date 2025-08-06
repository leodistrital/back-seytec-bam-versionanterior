<?php
echo $this->include("components/cabezote/head");
echo $this->include('components/cabezote/header');
?>
<?php
echo $this->include("components/internas/banner_interno");
?>
<section class="gMSection gIntern">
    <?php
    echo $this->include("components/internas/contenido");
    // echo $contenido['slug'];

    if ($contenido['slug'] == 'que-es-el-bam') {
        echo view_cell('\App\Controllers\web\Internas::getGaleriaImagenes');
        echo view_cell('\App\Controllers\web\Internas::getCiras');
    }

    if ($contenido['slug'] == 'faq') {
        echo view_cell('\App\Controllers\web\Internas::faq');
    }

    
    if ($contenido['slug'] == 'aliados') {
        echo view_cell('\App\Controllers\web\Internas::aliados');
    }

    if ($contenido['slug'] == 'sedes') {
        echo view_cell('\App\Controllers\web\Internas::sedes');
    }
    if ($contenido['slug'] == 'equipo') {
        echo view_cell('\App\Controllers\web\Internas::equipo');
    }

    ?>
</section>
<?php
echo $this->include('components/footer/foot.php');
?>