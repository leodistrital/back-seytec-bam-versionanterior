<?php
$clase = 1;
?>
<div class="listConv">
    <div class="listC">
        <article class="iConv">
            <ul>
                <?php foreach ($categorias as $categoria) : ?>
                <li class="cat<?= $clase ?>  <?php if($categoria['slug']==$categoria['activa']) echo 'active';  ?> ">
                    <a style="background-color: <?= $categoria['color'] ?>;"
                        href="/convocatorias/<?= $categoria['slug'] ?>"><?= $categoria['nombre'] ?></a>
                </li>
                <?php $clase++;
                endforeach;  ?>
            </ul>
        </article>
    </div>
</div>