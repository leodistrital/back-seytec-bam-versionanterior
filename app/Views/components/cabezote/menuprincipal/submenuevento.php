<ul>
    <?php foreach ($submenueventos as $submenuevento) :

        // var_dump($submenuevento);
        if (!empty($submenuevento['adj_mne'])){
            $ruta = $submenuevento['adj_mne'];
            $rutaCompleta = $ruta;
            $target= "_blank";
        }
        else {
            $ruta = $submenuevento['slu_mne'];
            $rutaCompleta = "/programacion/".$edicion."/".$ruta;
        }
    ?>
        <li><a  href="<?= $rutaCompleta?>"><span><?= $submenuevento['tit_mne']?></span></a></li>
    <?php endforeach;  ?>
</ul>