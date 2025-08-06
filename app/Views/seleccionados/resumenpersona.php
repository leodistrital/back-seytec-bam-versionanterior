<div class="gFancyT">
    <!--Resumen persona-->
    <div class="cFDetails">
        <button type="button" class="cboxCF btnCF">cerrar</button>

        <!--Slider imgs-->
        <!-- <div class="sliderImg">
            <?php for ($i = 1; $i < 2; $i++) { ?>
                <figure class="gSlide">
                    <img src="/images/site/Alejandro_HOYOS.jpg" alt="nombre img">
                </figure>
            <?php } ?>
        </div> -->

        <div class="sliderImg">

            <figure class="gSlide">
                <img src="<?= $perfil['img_pro'] ?>" alt="nombre img">
            </figure>

        </div>
        <!--End Slider imgs-->

        <div class="cText">
            <h3><?= $perfil['per_pro'] ?></h3>
            <h2><?= $perfil['pdc_pro'] ?></h2>
            <div class="desc"><?= $perfil['sin_pro'] ?></div>
        </div>

    </div>
    <!--End Resumen persona-->
</div>