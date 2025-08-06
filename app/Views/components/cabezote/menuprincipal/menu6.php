 <li>
     <a href="#"><span><?= $menu['nom_mep'] ?></span></a>
     <ul>
         <?php foreach ($submenus as $submenu) :  ?>
         <li><a href="/<?= $submenu['slu_con'] ?>"><span><?= $submenu['menu'] ?></span></a></li>
         <?php endforeach;  ?>
     </ul>
 </li>