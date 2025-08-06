<div class="gCol col<?= $columna ?> cifras">
    <?php foreach ($cifras as $cifra) :  ?>
        <div class="dosCol">
            <h2><?= $cifra['dato'] ?></h2>
            <h3><?= $cifra['titulo'] ?></h3>
        </div>
    <?php endforeach;  ?>
</div>