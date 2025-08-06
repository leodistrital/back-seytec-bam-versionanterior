<!--Small Section Home-->
<section class="smallHSection">
    <div class="sliderHSection">
        <?php foreach ($textos as $texto) :  ?>
            <div class="gSlide">
                <div class="vAlign">
                    <div><?= $texto['texto']; ?>.</div>
                </div>
            </div>
        <?php endforeach;  ?>
    </div>
</section>
<!--End Small Section Home-->