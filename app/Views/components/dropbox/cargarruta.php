<!--Contenido general-->
<div class="gContPage">
    <?php
    $rutaDropbox = $contenidoDirectorio['ruta'];
    echo $rutaDropbox = str_replace('/', '@@@', $rutaDropbox);
    ?>
    <!-- Menu User -->
    <section class="rdiv contMUser">
        <div class="maxW">
            <nav class="menuUser">
                <div class=camp>
                    <span class="campana"></span>
                </div>
                <ul>
                    <li><a
                            href="capacitaciones_vn.php?id_modelos=100000&id_subseccion=Material de comunicación&dir=/CAPACITACION"><span>Capacitaciones</span></a>
                    </li>
                    <li><a href="#"><span>Plataforma</span></a></li>
                </ul>
            </nav>
        </div>
    </section><!-- End Menu User -->
    <article class="rdiv gNIntern">
        <div class="maxW">
            <div class="rdiv contWhite">
                <!--Interna-->
                <article class="gIntern sFour">
                    <div class="content">
                        <h2>E - Reputation / Capacitaciones</h2>
                        <p>En esta sección vas a encontrar todo el material de capacitaciones vigentes para Vehículos
                            Nuevos Renault</p>
                        <br>
                        <iframe frameborder="0" scrolling="no" src="/panel/iframe/files/<?= $rutaDropbox ?>"
                            style="width:100%; border:none; height:500px" onload="resizeIframe(this)"> </iframe>
                    </div>
            </div>
    </article>
    <!--Fin Interna-->
</div>
<!--Fin Contenido general-->