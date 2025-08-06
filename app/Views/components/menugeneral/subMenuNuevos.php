  <ul>
      <?php foreach ($listasubMenu as $subMenu): ?>
      <li>
          <a href="/panel/vehiculosnuevos/contenido/<?=$subMenu['codigo']?>"><?=$subMenu['nombre']?></a>
      </li>
      <?php endforeach ?>
  </ul>