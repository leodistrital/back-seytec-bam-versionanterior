<!--Extra-->
<?php
// print_r($imagenes);
?>
<div class="sectExtra galeria">
    <div class="contExt">
        <!--Gallery-->
        <h3>- Galería de imágenes -</h3>
        <div class="sliderGallery">
            <?php foreach ($imagenes as $imagene) :  ?>
                <div class="gSlide">
                    <figure class="gImg" style="background-image: url(<?= $imagene['imagengal'] ?>);">
                        <a href="<?= $imagene['imagengal'] ?>" class="openImage" data-title="<?= $imagene['descripcion'] ?>" data-rel="gal1">
                            <img src="<?= $imagene['imagengal'] ?>" alt="<?= $imagene['descripcion'] ?>">
                        </a>
                    </figure>
                </div>
            <?php endforeach;  ?>
        </div>
        <!--End Gallery-->
    </div>
</div>
<!--End Extra-->