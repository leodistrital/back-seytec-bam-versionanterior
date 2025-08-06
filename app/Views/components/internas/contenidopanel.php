 <div class="maxW">
     <div class="contIntern">
         <div class="gContent">
             <div class=topInfo>
                 <h2 class="gTitle"><?= $contenido['titulo'] ?>
                     <?php 
                        // printcho $_SESSION['name'];
                        //  print_r($_SESSION);
                    
                        if($seccion=='panelusuario' ||  $seccion=='panelusuariofin' || $seccion=='panelusuariopago' ) echo $_SESSION['name']; ?>

                 </h2>
                 <div class="gIntro">
                     <?= $contenido['descripcion'] ?>
                     <?php
                        // if($finacreditacion==1){
                        //     echo " Su solicitud de acreditación ha sido enviada y se tramitará lo antes posible. Le agredecemos por su paciencia, el tiempo de aprobación podrá tardar hasta 5 días hábiles. Le comunicaremos por correo electrónico si su solicitud ha sido aceptada.";
                        // }
                     ?>
                 </div>
             </div>
         </div>
     </div>
 </div>