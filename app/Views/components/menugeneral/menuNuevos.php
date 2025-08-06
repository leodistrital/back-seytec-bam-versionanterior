  <nav id="mainMenu" class="mainMenu">
      <ul>
          <?php foreach ($listaMenuNuevos as $MenuNuevos): ?>
          <li>
              <a
                  href="/panel/vehiculosnuevos/contenido/<?php echo ($MenuNuevos['ruta']!='' ? $MenuNuevos['codigo'] : '#');  ?>">
                  <?=$MenuNuevos['nombre'] ?>
              </a>
              <?php 
                echo view_cell('\App\Controllers\web\Panel::getSubMenu' , "menu=".$MenuNuevos['codigo'] );
              ?>

          </li>
          <?php endforeach ?>
      </ul>

  </nav>