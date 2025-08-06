<!--Prefooter Section Home-->
<section class="prefooterHSection">
    <div class="prefooterTit">
        <h2>Organizadores</h2>
    </div>
    <div class="sliderPrefooter">
        <?php foreach ($logos as $logo) :  ?>
        <div class="gSlide">
            <div class="vAlign">
                <div>
                    <img src="<?= $logo['imagenban'] ?>" alt="">
                </div>
            </div>
        </div>
        <?php endforeach;  ?>
    </div>
</section>
<!--End Small Section Home-->