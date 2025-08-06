 <h5>SPEAKER</h5>
 <?php foreach ($speakers as $speaker) :  ?>
 <div class="infoEvento">
     <?php 
            $imagen = !empty($speaker['img_spe']) ? $speaker['img_spe'] : '/images/site/defaultperfil.jpeg'
        ?>
     <img src="<?= $imagen ?>">

     <div class='p-reset'>
         <h5><?= $speaker['nom_spe'] ?></h5>
         <?= $speaker['per_spe'] ?>
     </div>

 </div>
 <?php endforeach; ?>