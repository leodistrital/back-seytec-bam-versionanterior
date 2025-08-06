 <li>
     <a href="#"><span><?= $menu['nom_mep']  ?></span></a>
     <ul>
         <?php foreach ($menueventos as $menuevento) :
                if ($menuevento['submenutotal'] > 0)
                    $ruta = "#";
                else
                    $ruta = "/programacion/" . $anoEdicion . "/" . $menuevento['slu_mne'];
            ?>
             <li>
                 <a href="<?= $ruta ?>"><span><?= $menuevento['tit_mne'] ?></span></a>
                 <?php
                    $codmenu = $menuevento['cod_mne'];
                    echo view_cell('\App\Libraries\ViewSitio::submenuagendaeventos', "menu=$codmenu, edicion=$anoEdicion");

                    ?>
             </li>
         <?php endforeach;  ?>


     </ul>
 </li>