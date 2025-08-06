<?php
echo $this->include("components/cabezote/head");
echo $this->include('components/cabezote/header');
?>
<?php
echo $this->include("components/internas/banner_interno");
?>
<section class="gMSection_interna_menu">
    <?php
    echo $this->include("components/ediciones/contenido");
    if($imagenesgaleria){
        echo $this->include("components/ediciones/galeria");
    }
     echo view_cell('App\Controllers\web\Ediciones::categoriasEdicion' ,'edicion='. $codigoultimaEdicion )
    ?>
</section>
<?php
echo $this->include('components/footer/foot.php');
?>