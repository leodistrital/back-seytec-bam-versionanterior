 <!--Extra-->
 <div class="sectExtra nop">
     <div class="maxW">
         <?php
            $fondo = '';
        ?>
         <?php foreach ($sedes as $sede) :
                $fondo = $fondo == '' ? 'bg2' : '';
            ?>
             <div class="listSedes <?= $fondo ?>">
                 <div class="listS">
                     <article class="iSedes">
                         <h2><?= $sede['nombre'] ?></h2>
                         <?= $sede['direccion'] ?>
                         <article class="iSedesLeft">
                             <img src="<?= $sede['imagen'] ?>" alt="">
                         </article>
                         <article class="iSedesRight">
                             <p><?= $sede['descripcion'] ?></p>
                         </article>
                     </article>

                 </div>
             </div>
         <?php endforeach;  ?>
     </div>
 </div>
 <!--End Extra-->