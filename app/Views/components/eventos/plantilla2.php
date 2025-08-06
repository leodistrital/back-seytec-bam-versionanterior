<?php
// print_r($eventos);
$class = 'bg2';
$filas  = array_chunk($eventos, 2, true);
// var_dump($filas);
$separador= '';
?>
<!--Extra-->
<div class="sectExtra nop">
    <div class="maxW">
        <?php foreach ($filas as $fila) :  ?>
        <div class="listEvento <?= $class ?>">
            <div class="listE">
                <?php foreach ($fila as $fi) :  
                    if(!empty($fi['fec_ave']) &&  !empty($fi['hora']) ){
                        $separador = '|';
                    }

                    ?>
                <article class="iEvento">
                    <h2><?= $fi['tit_ave'] ?></h2>
                    <h3><?= $fi['fec_ave']  ?> <?=$separador?> <?= $fi['hora'] ?><br><?= $fi['lug_ave'] ?></h3>
                    <?= empty($fi['not_ave']) ? '' : "<h4>" . $fi['not_ave'] . "</h4>" ?>
                    <?= empty($fi['pre_ave']) ?   '' : "<h5>" . $fi['pre_ave'] . "</h5>" ?>
                    <p><?= $fi['des_ave'] ?></p>
                    <?= view_cell('\App\Controllers\Web\Programacion::logoaliados', "codigoevento=" . $fi['cod_ave']); ?>
                </article>
                <?php endforeach; ?>
            </div>
        </div>
        <?php
            $class == '' ? $class = 'bg2' : $class = '';
        endforeach;
        ?>
    </div>
</div>
<!--End Extra-->