 <!--Cont center-->
 <div class="gCCenter">
     <div class="maxW">

         <!--List projects-->
         <div class="headerListMovies">
             <h1>Seleccionados</h1>
         </div>
         <div class="gListMovies">
             <?php foreach ($perfiles as $perfile) :  ?>
             <article class="itemSMovie noStyle">
                 <div>
                     <figure class="gImg personaje">
                         <img src="<?= $perfile['img_pro'] ?>">
                     </figure>
                     <header class="gDesc persona">
                         <h1><?= $perfile['per_pro'] ?></h1>
                         <h2><?= $perfile['nom_pro'] ?></h2>
                         <h3><?= $perfile['dur_pro'] ?></h3>
                         <h3><?= $perfile['gen_pro'] ?></h3>
                         <a href="/seleccionado/resumen-persona/<?= $perfile['cod_pro'] ?>" class="openFancy"
                             data-rel="relelenco">
                             <div class="sinop personajes">
                                 <div class="desc">
                                     <h5>Perfil</h5>
                                     <p><?= $perfile['sin_pro'] ?></p>
                                 </div>
                             </div>
                         </a>
                     </header>
                 </div>
             </article>
             <?php endforeach;  ?>


         </div>
         <!--End List projects-->
     </div>
 </div>
 <!--End Cont center-->