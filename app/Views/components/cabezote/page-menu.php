<ul>
    <?php
    echo view_cell('\App\Libraries\ViewSitio::getMenu1');
    ?>
    <li>
        <a href="/infoacreditacion"><span class="icomenu ico6">acreditaciones</span></a>
    </li>
    <?php
    echo view_cell('\App\Libraries\ViewSitio::getMenuConvocatorias', 'menu=2');
    echo view_cell('\App\Libraries\ViewSitio::getMenuConvocatorias', 'menu=3');
    echo view_cell('\App\Libraries\ViewSitio::menuagendaeventos');
    echo view_cell('\App\Libraries\ViewSitio::otroProgramas', 'menu=5');
    echo view_cell('\App\Libraries\ViewSitio::prensaAnterioes', 'menu=6');
    ?>
    <li>
        <a href="/contacto"><span class="icomenu ico6">Contacto</span></a>
    </li>
</ul>