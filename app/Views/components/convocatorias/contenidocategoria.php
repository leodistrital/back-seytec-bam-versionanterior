<div class="listConv">
    <div class="listC">
        <article class="iConv">
            <h2><?= $contenidoCategoria['nombre'] ?></h2>
            <article class="iConvLeft">
                <img src="<?= $contenidoCategoria['imagen'] ?>" alt="">
            </article>
            <article class="iConvRight">
                <h3><?= $contenidoCategoria['titulo'] ?></h3>
                <p><?= $contenidoCategoria['descripcion'] ?></p>
            </article>
            
            <article class="iConvRight menuIns">
                <ul>
                    <li class="btnComo"><a target="_blank" href="<?= $contenidoCategoria['adjunto1'] ?>">¿CÓMO PARTICIPO?</a></li>
                    <li class="btnPost"><a target="_blank" href="<?= $contenidoCategoria['adjunto2'] ?>">ME QUIERO POSTULAR</a></li>
                <ul>
            </article>
        </article>
        </article>
    </div>
</div>