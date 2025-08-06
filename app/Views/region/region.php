<?php
echo $this->include("components/cabezote/head");
echo $this->include('components/cabezote/header');
?>
<?php
echo $this->include("components/internas/banner_interno");
?>
<section class="gMSection gIntern">
    <?php
  echo $this->include("components/regiones/listaregiones");
  echo $this->include("components/region/contenido");
  if($imagenesgaleria){
    // echo 'si llego ';
    echo $this->include("components/region/galeria");
  }
  echo $this->include("components/region/mesaredonda");
  echo $this->include("components/region/eventos");
  echo $this->include("components/region/terminos");
  echo $this->include("components/region/logos");
  echo $this->include("components/regiones/logos");
  ?>
</section>

<?php
echo $this->include('components/footer/foot.php');
?>