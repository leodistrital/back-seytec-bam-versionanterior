<?php
// print_r($eventos);
$class = 'bg2';
?>
<!--Extra-->
<div class="sectExtra nop">
    <div class="maxW">
        <?php foreach ($eventos as $evento) :  ?>
        <?php
            // var_dump($evento); 
            ?>
        <div class="listEvento <?= $class ?>">
            <div class="listE">
                <article class="iEvento">
                    <h2><?= $evento['tit_ave'] ?></h2>
                    <h3>
                        <?= $evento['fec_ave']  ?> | <?= $evento['hora'] ?>
                        <br>
                        <?php if($evento['vir_ave'] == 1) echo  "VIRTUAL";  ?>
                        <?php if($evento['vir_ave'] == 2) echo $evento['lug_ave']; ?>
                    </h3>
                    <?= empty($evento['not_ave']) ?   '' : "<h4>" . $evento['not_ave'] . "</h4>" ?>
                    <?= empty($evento['pre_ave']) ?   '' : "<h5>" . $evento['pre_ave'] . "</h5>" ?>
                    <p><?= $evento['des_ave'] ?></p>
                    <?= empty($evento['url_ave']) ?   '' : "<h4><a href='" . $evento['url_ave'] . "' target='_blank'>Link al evento virtual</a></h4>" ?>
                    <?= view_cell('\App\Controllers\Web\Programacion::logoaliados', "codigoevento=" . $evento['cod_ave']); ?>
                </article>
                <article class="iEventoRight">
                    <img src="<?= $evento['img_ave'] ?>" alt="">
                    <?= view_cell('\App\Controllers\Web\Programacion::speakers', "codigoevento=" . $evento['cod_ave']); ?>
                </article>
            </div>
        </div>
        <?php
            $class == '' ? $class = 'bg2' : $class = '';
        endforeach;
        ?>
    </div>
</div>
<!--End Extra-->