<!--News-->
<section class="contSAlerts">
    <div class="maxW">

        <!-- este es el contenedor del slider -->
        <div class="sliderAlerts">
            <?php foreach ($noticias as $noticia) :  ?>
                <article class="gSlide">
                    <figure style="background-image:url(<?= $noticia['imangen'] ?>);">
                        <img src="<?= $noticia['imangen'] ?>" alt="nombre img">
                    </figure>
                    <span class="overlay" style="background-color:<?php //echo $color; 
                                                                    ?>;"></span>
                    <header class="gDesc">
                        <a href="<?= $noticia['url'] ?>" class="btnMore">ver más</a>
                        <h2><?= $noticia['fuente'] ?></h2>
                        <h3><a href="<?= $noticia['url'] ?>"><?= $noticia['titulo'] ?></a></h3>
                        <time class="time"><?= $noticia['fecha'] ?></time>
                        <div class="parrafo"><?= $noticia['estradilla'] ?></div>
                    </header>
                </article>
            <?php endforeach;  ?>

        </div>

        <!-- fin noticia -->
    </div>
</section>
<!--End News-->