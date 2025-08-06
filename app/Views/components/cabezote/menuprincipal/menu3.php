 <li>
     <a href="#"><span><?= $menu['nom_mep']  ?></span></a>
     <ul>
         <?php foreach ($selesccionCategorias as $selesccionCategoria) :  ?>
             <li><a href="/seleccionados/<?= $submenus['ano_edi'] ?>/<?= $selesccionCategoria['slu_cat'] ?>"><span><?= $selesccionCategoria['nom_cat'] ?></span></a></li>
         <?php endforeach;  ?>

     </ul>
 </li>