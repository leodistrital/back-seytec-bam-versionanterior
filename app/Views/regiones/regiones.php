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
  echo $this->include("components/regiones/listaregiones");
  echo $this->include("components/regiones/galeria");
  echo view_cell('\App\Controllers\web\Regiones::getContenidodos');
  echo $this->include("components/regiones/participan");
  echo $this->include("components/regiones/notacreditacion");
  
  echo $this->include("components/regiones/logos");
  ?>
</section>

<?php
echo $this->include('components/footer/foot.php');
?>