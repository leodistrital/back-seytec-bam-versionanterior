<!--Main Banner-->
<?php
 empty($contenido['fondo']) ? $fondo = 'https://bogotamarket.com/images/site/banner_forum.jpg' :
 $fondo=$contenido['fondo'];
?>
<section class="contMBannerInt">
    <h2 class="gHidden">Destacados</h2>
    <div class="sliderBanner">
        <article class="gSlide">
            <figure class="gImg" style="background-image: url(<?= $fondo ?>);">
                <img src="<?= $fondo ?>" alt="Nombre img">
            </figure>
        </article>
    </div>
</section>
<!--End Main Banner-->