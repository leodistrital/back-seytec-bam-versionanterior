<?php
$ltraactiva = '';
$webempresa = '';
$cargo = '';
$indicativo ='';
foreach ($filtros['cards'] as $item) :

     if($item['excluir']==0) {

    $webempresa='';
    if ($ltraactiva != $item['letra']) {
        echo "<h2>" . $item['letra'] . "<h2>";
    }

    if(!empty ($item['indicativotel'])){
         $indicativo = explode("-", $item['indicativotel']);
    }
   
    if (!empty($item['webempresa'])) {
        if (str_contains($item['webempresa'], "https://")) {
            $webempresa= $item['webempresa'];
        } else {
            $webempresa='https://'.$item['webempresa'];
        }
    }
     $fotopefil = '/images/guia/logonoperfil.jpg';

$represetante = $item['interanarepresentantes'];
?>
<div class='bloqueEmp'>
    <section class="fichaEmp">
        <!-- <div class="contLogoGuia">
            <img src="<?=$fotopefil?>" alt="<?=$item['nombreempresa']?>">
        </div> -->
        <div class="contBl3Guia">
            <h2 style=" text-transform: uppercase;"><?=$item['nombreempresa']?></h2>
            <h3><?=$item['sectoractividadparametro']?></h3>
            <h4><a href="<?= $webempresa ?>" target="_blank"><?= $webempresa ?> </a></h4>
            <h5><?=$item['direccionempresa']?></h5>
            <h5><?=$item['ciudadempresa']?> | <?=$item['paisempresa']?></h5>
        </div>
        <div class=iconosGuia>
            <!-- <div class="datosGuia2">
                <a href="menu_favoritos.php" class="openFancy">
                    <img src="/images/site/ico_estrella_guia_off.png" alt="">
                </a>
            </div> -->
        </div>
    </section>
    <section class="fichaEmpDatos">
        <div class="contBl4Guia">
            <!-- <div class="contLogoGuia">
            </div> -->
            <div class="datosEmpGuia">
                <img src="/images/site/ico_tel_guia.png" alt="">
                <h5>(+<?=$indicativo[1]?>) <?= $item['telefonoempresa'] ?></h5>
            </div>
            <div class="datosEmpGuia">
                <img src="/images/site/ico_mail_guia.png" alt="">
                <h6><a href="mailto:<?= $item['correoempresa'] ?>"><?= $item['correoempresa'] ?></a></h6>
            </div>
            <div class="datosGuia2">
                <a href="/panel/vcard/empresas/<?= $item['usu_reg'] ?>" target="_blank">
                    <img src="/images/site/ico_vcard.png" alt="">
                </a>

            </div>
        </div>
    </section>
    <div class="accordion-wrapGuia">
        <?= view("components/guia/representantecard" , ['cards' => $item['interanarepresentantes'] ]  ) ?>
    </div>


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