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
    echo $this->include("components/convocatorias/categorias");
    ?>
</section>
<?php
echo $this->include('components/footer/foot.php');
?>