<?php
$ltraactiva = '';
$webempresa = '';
$cargo = '';
$indicativo ='';
foreach ($filtros['cards'] as $item) :

if($item['excluir']==0) {


    if ($ltraactiva != $item['letra']) {
        echo "<h2>" . $item['letra'] . "<h2>";
        // echo "<div class='bloquePers'>";
    }

    // echo $item['indicativotel'];
    $cargo='';
    // $cargo = explode("/", $item['sectoractividadparametro']);
    if(!empty ($item['indicativotel'])){
         $indicativo = explode("-", $item['indicativotel']);
        //  print_r($indicativo);
        // $indicativo =$item['indicativotel'];
    }
    
    if (!empty($item['webempresa'])) {
        if (str_contains($item['webempresa'], "https://")) {
            $webempresa= $item['webempresa'];
        } else {
            $webempresa='https://'.$item['webempresa'];
        }
    }

    if(empty($item['fotoacreditacion'])){
        $fotopefil = './images/guia/fotonoperfil.jpg';
    } else {
        $fotopefil = $item['fotoacreditacion'];

    }

?>
<div class="bloquePers">
    <section class="fichaPers">
        <div class="contFotoGuia">
            <img loading="lazy" src="<?= $fotopefil ?>" alt="<?= $item['nombre'] . ' ' . $item['apellido'] ?>">
        </div>
        <div class="contBl1Guia">
            <h2>
                <?= $item['nombre'] ?>
                <br>
                <span style=" text-transform: uppercase;">
                    <?= strtoupper($item['apellido']) ?>
                </span>
            </h2>

            <h4><a href="<?= $webempresa ?>" target="_blank"><?= $item['nombreempresa'] ?> </a></h4>
            <br>
            <br>
            <h3><?= $item['indicativo'] ?></h3>
        </div>
        <div class="contBl2Guia">
            <div class="datosGuia">
                <img src="/images/site/ico_tel_guia.png" alt="">
                <h5>(+<?=$indicativo[1]?>) <?= $item['telefonopublicacion'] ?></h5>
            </div>
            <div class="datosGuia">
                <img src="/images/site/ico_mail_guia.png" alt="">
                <h6><a href="mailto:<?= $item['correopublicacion'] ?>"><?= $item['correopublicacion'] ?></a></h6>
            </div>
        </div>
        <div class=iconosGuia>
            <div class="datosGuia2">
                <a href="/panel/listafovortos/participantes/<?= $item['usu_reg'] ?>" id='card-<?= $item['usu_reg'] ?>'
                    class="openFancy favoff">
                    <?php if ( !empty($item['mifavorito'])) { ?>
                    <img src="/images/site/ico_estrella_guia_on.png" alt="">
                    <?php } else { ?>
                    <img src="/images/site/ico_estrella_guia_off.png" alt="">
                    <?php } ?>

                </a>
            </div>
            <div class="datosGuia2">
                <a href="/panel/vcard/participantes/<?= $item['usu_reg'] ?>" target="_blank">
                    <img src="/images/site/ico_vcard.png" alt="">
                </a>
            </div>
            <?php if ($item['seleccionado'] == 1) : ?>
            <div class="datosGuia2">
                <img src="<?=$item['icocategoria']?>" alt="Seleccionado">
            </div>
            <?php endif ?>
        </div>
    </section>
    <?php
        if ($ltraactiva != $item['letra']) {
            // echo '</div>';
            $ltraactiva = $item['letra'];
        } else {
            // echo "<hr>";
        }
    ?>
</div>
<?php } endforeach ?>