<!--Main Banner-->
<section class="contMBanner">
    <h2 class="gHidden">Destacados</h2>
    <div class="sliderBanner">
        <?php foreach ($banners as $banner) : ?>
        <article class="gSlide">
            <a href="<?= $banner['link'] ?>" target="_blank">
                <figure class=" gImg" style="background-image: url(<?= $banner['imagenban'] ?>);">
                    <img src="<?= $banner['imagenban'] ?>" alt="Nombre img">
                </figure>
            </a>
        </article>
        <?php endforeach;    ?>
    </div>
</section>
<!--End Main Banner-->