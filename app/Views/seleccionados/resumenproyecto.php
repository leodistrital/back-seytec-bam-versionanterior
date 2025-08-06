<div class="gFancyT">
    <!--Resumen proyecto-->
    <div class="cFDetails">
        <button type="button" class="cboxCF btnCF">cerrar</button>

        <!--Slider imgs-->
        <!-- <div class="sliderImg">
            <?php for ($i = 1; $i < 2; $i++) { ?>
                <figure class="gSlide">
                    <img src="/images/site/filmProjects_1.jpg" alt="nombre img">
                </figure>
            <?php } ?>
        </div> -->

        <div class="sliderImg">
            <figure class="gSlide">
                <img src="<?= $proyecto['img_pro'] ?>" alt="nombre img">
            </figure>
        </div>
        <!--End Slider imgs-->

        <div class="cText">
            <h3><?= $proyecto['nom_pro'] ?></h3>
            <div class="desc">
                <?= $proyecto['con_pro'] ?>
            </div>
        </div>

    </div>
    <!--End Resumen proyecto-->
</div>