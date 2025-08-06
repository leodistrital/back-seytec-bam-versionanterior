 <!--Extra-->
 <div class="maxW">
     <div class="listComite bg2">
         <h2 class="gTitle comiteTit">Comité evaluador</h2>
         <?php foreach ($jurados as $jurado) :  ?>
             <div class="listC">
                 <article class="iComiteLeft">
                 </article>
                 <article class="iComiteRight">
                     <div class="contCom">
                         <figure class="gImg">
                             <img src="<?= $jurado['img_coe'] ?>">
                         </figure>
                         <header class="gDesc">
                             <h5><?= $jurado['nom_coe'] ?></h5>
                             <h3><?= $jurado['pai_coe'] ?></h3>
                             <div><?= $jurado['per_coe'] ?></div>
                         </header>
                     </div>
                 </article>
             </div>
         <?php endforeach;  ?>
     </div>
 </div>
 <!--End Extra-->