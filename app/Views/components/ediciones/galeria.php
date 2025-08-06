 <!--Extra-->
 <div class="sectExtra galeria">
     <div class="contExt">
         <!--Gallery-->
         <h3>- Galería de imágenes -</h3>
         <div class="sliderGallery">

             <?php foreach ($imagenesgaleria as $imagen) :  ?>
             <div class="gSlide">
                 <figure class="gImg" style="background-image: url(<?=$imagen['imagengal']?>);">
                     <a href="<?=$imagen['imagengal']?>" class="openImage" data-title="<?=$imagen['descripcion']?>"
                         data-rel="gal1">
                         <img src="<?=$imagen['imagengal']?>" alt="<?=$imagen['descripcion']?>">
                     </a>
                 </figure>
             </div>
             <?php endforeach;  ?>
         </div>
         <!--End Gallery-->
     </div>
 </div>
 <!--End Extra-->