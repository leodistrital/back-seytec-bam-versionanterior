 <!--Extra-->
 <div class="sectExtra nop">
     <div class="maxW">
    
         <?php foreach ($aliados as $aliado) :  ?>
             <div class="listEvento">
                 <article class="iOrgprin">
                     <h2><?= $aliado['categoria'] ?></h2>
                     <img src="<?= $aliado['imagen'] ?>" alt="">
                 </article>
             </div>
         <?php endforeach;  ?>
     </div>
 </div>
 <!--End Extra-->