<?php
echo $this->include("components/cabezote/head"); // se ejecuta celda
echo $this->include('components/cabezote/header');  // se ejecuta celda
?>
<?php
echo view_cell('\App\Controllers\web\Home::getBanners') ;
echo view_cell('\App\Controllers\web\Home::getTexts');
echo view_cell('\App\Controllers\web\Home::getNoticiaRecomienda');
echo view_cell('\App\Controllers\web\Home::getVideo');
echo view_cell('\App\Controllers\web\Home::getDestacados');
echo view_cell('\App\Controllers\web\Home::getLogos');
?>
<?php 
echo $this->include('components/footer/foot'); // se ejecuta celda
?>