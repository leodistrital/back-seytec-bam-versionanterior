 <!--Fin Main Menu-->
 <nav class="menuRightBottom">
     <ul>
         <li>
             <div class="usuario_info" id="nombreUsuario" onclick="openForm()&closePreg()">
                 <b><?= $datosUsuario['nombre'] ?></b>
             </div>
         </li>
         <li>
             <div class="concesionario_info" id="nombreUsuario" onclick="openForm()&closePreg()">
                 <?= $datosUsuario['nombreConcesionario'] ?>
             </div>
         </li>
         <li>
             <a href="./" class="btnCot ">SALIR</a>
         </li>
     </ul>
 </nav>
 <!--Fin Main Menu-->
 <?php echo  $this->include('components/formularios/usuario'); ?>
 <?php echo $this->include('components/formularios/preguntas'); ?>