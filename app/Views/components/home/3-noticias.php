<!--News-->
<section class="contSNews">
    <div class="maxW">
        <div class="titNews">
            <!-- Titulos no se mueven -->
            <h2 class="noti">- Noticias -</h2>
            <h2 class="noti">- BAM recomienda -</h2>
        </div>
        <!-- este es el contenedor del slider -->
        <div class="sliderNews">
            <?php foreach ($noticias as $noticia) :  ?>
                <article class="gSlide">
                    <figure style="background-image:url(<?= $noticia['imangen'] ?>);">
                        <img src="<?= $noticia['imangen'] ?>" alt="nombre img">
                    </figure>
                    <span class="overlay" style="background-color:<?php //echo $color; 
                                                                    ?>;"></span>
                    <header class="gDesc">
                        <a href="<?= $noticia['url'] ?>" target="_blank" class="btnMore">ver más</a>
                        <h2><?= $noticia['fuente'] ?></h2>
                        <h3><a href="<?= $noticia['url'] ?>" target="_blank"><?= $noticia['titulo'] ?></a></h3>
                        <time class="time" datetime="<?= $noticia['fecha'] ?>"><?= $noticia['fecha'] ?></time>
                        <div class="parrafo"><?= $noticia['estradilla'] ?></div>
                    </header>
                </article>
            <?php endforeach;  ?>
        </div>
        <!-- fin noticia -->
    </div>
</section>
<!--End News-->