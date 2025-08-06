<!--Videos-->
<section class="contHVideos">
    <div class="maxW">
        <!--Featured-->
        <article class="iVideo bigVideo">
            <figure class="gImg" style="background-image: url(<?= $video['imagen'] ?>);">
                <a href="https://www.youtube.com/embed/<?= $video['youtube'] ?>?autoplay=1&rel=0&showinfo=0&color=white" class="openVideo" data-rel="videohome" data-title="Todo sobre el BAM">
                    <img src="<?= $video['imagen'] ?>" alt="Todo sobre el BAM">
                    <i class="icoVideo"></i>
                </a>
            </figure>
            <header class="gDesc">
                <h3><?= $video['subtitulo'] ?></h3>
                <h4><?= $video['titulo'] ?></h4>
                <div class="desc"><?= $video['entradilla'] ?></div>
            </header>
        </article>
        <!--End Featured-->
    </div>
</section>
<!--End Videos-->