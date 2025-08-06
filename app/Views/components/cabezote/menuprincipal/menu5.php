 <li>
     <a href="#"><span><?= $menu['nom_mep'] ?></span></a>
     <ul>
         <li><a href="http://www.cortografias.com/" target="_blank"><span>Cortografías</span></a></li>
         <li><a href="https://bogotamarket.com/docs/ES_CALL-COLOMBIA-INDUSTRY%20ACADEMY_BAM%202023.pdf" target="_blank"><span>COLOMBIA LOCARNO INDUSTRY ACADEMY</span></a></li>
         <?php
         if($menuActivo==1) { ?>
         <li><a href="/regiones"><span><?= $submenus['tit_con_esp'] ?></span></a></li>
         <?php } ?>

     </ul>
 </li>

 