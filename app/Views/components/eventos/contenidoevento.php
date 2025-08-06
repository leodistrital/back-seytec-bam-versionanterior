<div class="maxW">
    <div class="contIntern">
        <div class="gContent">
            <div class="topInfo">
                <h2 class="gTitle"><?= $contenido['tit_mne'] ?></h2>
                <div class="gIntro"><?= $contenido['des_mne'] ?></div>
            </div>
        </div>
    </div>
</div>

<?php 
// echo $contenido['cod_men'];
if($contenido["cod_mne"]==16){


?>
<!--Extra-->
<!-- cada galeria debe tener su carpeta de imágenes -->
<div class="sectExtra galeria">
    <div class="contExt">
        <!--Gallery-->
        <h3>- Galería de imágenes -</h3>
        <div class="sliderGallery">
            <?php for($g=1; $g<6; $g++){ ?>
            <div class="gSlide">
                <figure class="gImg" style="background-image: url(/images/pruebas/galQuienes.jpg);">
                    <a href="/images/pruebas/galQuienes.jpg" class="openImage" data-title="Quienes somos <?=$g;?>"
                        data-rel="gal1">
                        <img src="/images/pruebas/galQuienes-thumb.jpg" alt="Quienes somos">
                    </a>
                </figure>
            </div>
            <?php } ?>
        </div>
        <!--End Gallery-->
    </div>
</div>
<!--End Extra-->
<?php } ?>

<?php
if (!empty($contenido['contenidoExtra'])) {

?>
<div class="sectExtra nop">
    <div class="maxW">
        <div class="listEvento">
            <div class="listE">
                <article class="iEvento">
                    <?= $contenido['contenidoExtra'] ?>
                </article>
                <article class="iEventoRight">
                    <?php if (!empty($contenido['img_mne'])) { ?>
                    <img src="<?= $contenido['img_mne']?>">
                    <?php } ?>
                </article>
            </div>
        </div>
    </div>
</div>
<?php } ?>
<!--Info superior-->