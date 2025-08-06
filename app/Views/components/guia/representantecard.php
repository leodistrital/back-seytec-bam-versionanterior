<?php
// print_r(count($cards));
if (count($cards) > 0) {
?>
<div class="accordion-itemGuia itemGuia">
    <p class="accordion-headerGuia"> Representantes | <?= count($cards) ?>
        <span class="arrowGuia leftGuia"></span>
    </p>
</div>

<div class="accordion-text">
    <!-- <div class="bloquePers"> -->
    <?php

            $cargo = '';
            $webempresa = '';
            foreach ($cards as $item) :

                if (empty($item['fotoacreditacion'])) {
                    $fotopefil = './images/guia/fotonoperfil.jpg';
                } else {
                    $fotopefil = $item['fotoacreditacion'];
                }
                $cargo = explode("/", $item['sectoractividadparametro']);
                if (!empty($item['webempresa'])) {
                    if (str_contains($item['webempresa'], "https://")) {
                        $webempresa = $item['webempresa'];
                    } else {
                        $webempresa = 'https://' . $item['webempresa'];
                    }
                }

                if (!empty($item['indicativotel'])) {
                    $indicativo = explode("-", $item['indicativotel']);
                }

            ?>
    <div class="bloquePers">
        <section class="fichaPers">
            <div class="contFotoGuia">
                <img src="<?= $fotopefil ?>" alt="<?= $item['nombre'] . ' ' . $item['apellido'] ?>">
            </div>
            <div class="contBl1Guia">
                <h2>
                    <?= $item['nombre'] ?>
                    <br>
                    <span style=" text-transform: uppercase;">
                        <?= strtoupper($item['apellido']) ?>
                    </span>
                </h2>
                <h3><?= $cargo[0] ?></h3>
                <h4><a href="<?= $webempresa ?>" target="_blank"><?= $item['nombreempresa'] ?> </a></h4>
                <br>
                <br>
                <h3><?= $item['indicativo'] ?></h3>
            </div>
            <div class="contBl2Guia">
                <div class="datosGuia">
                    <img src="/images/site/ico_tel_guia.png" alt="">
                    <h5>(+<?= $indicativo[1] ?>) <?= $item['telefonopublicacion'] ?></h5>
                </div>
                <div class="datosGuia">
                    <img src="/images/site/ico_mail_guia.png" alt="">
                    <h6><a href="mailto:<?= $item['correopublicacion'] ?>"><?= $item['correopublicacion'] ?></a></h6>
                </div>
            </div>
            <div class=iconosGuia>
                <div class="datosGuia2">
                    <a href="/panel/listafovortos/participantes/<?= $item['usu_reg'] ?>"
                        id='card-<?= $item['usu_reg'] ?>' class="openFancy favoff">
                        <?php if ( !empty($item['mifavorito'])) { ?>
                        <img src="/images/site/ico_estrella_guia_on.png" alt="">
                        <?php } else { ?>
                        <img src="/images/site/ico_estrella_guia_off.png" alt="">
                        <?php } ?>

                    </a>
                </div>
                <div class="datosGuia2">
                    <img src="/images/site/ico_vcard.png" alt="">
                </div>
            </div>
        </section>
    </div>
    <!-- <hr> -->
    <?php endforeach; ?>

    <!-- </div> -->
</div>

<?php } ?>