 <?php foreach ($proyectos as $proyecto) :  ?>
 <article class="itemSMovie">
     <div>
         <figure class="gImg">
             <img src="<?= $proyecto['img_pro'] ?>">
         </figure>
         <header class="gDesc">
             <h1><?= $proyecto['nom_pro'] ?></h1>
             <h2><?= $proyecto['per_pro'] ?></h2>
             <h3><?= $proyecto['gen_pro'] ?></h3>
             <h3><?= $proyecto['dur_pro'] ?></h3>
             <h4><a href='<?= $proyecto['pdc_lin_pro'] ?>' target="_black"><?= $proyecto['pdc_pro'] ?></a></h4>
             <a href="/seleccionado/resumen-proyecto/<?= $proyecto['cod_pro'] ?>" class="openFancy"
                 data-rel="relelenco">
                 <div class="sinop">
                     <div class="desc">
                         <h5>Sinopsis</h5>
                         <p><?= $proyecto['sin_pro'] ?></p>
                     </div>
                 </div>
             </a>
         </header>
     </div>
 </article>
 <?php endforeach;  ?>