 <li>
     <a href="#"><span><?= $menu['nom_mep'] ?></span></a>
     <ul>
         <?php foreach ($submenus as $submenu) : ?>
             <li><a href="/bam/<?= $submenu['slu_con'] ?>"><span><?= $submenu['tit_con_esp'] ?></span></a></li>
         <?php endforeach;  ?>
     </ul>
 </li>