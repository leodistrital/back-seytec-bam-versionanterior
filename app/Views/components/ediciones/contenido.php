 <div class="maxW">
     <div class="contIntern noBtm">
         <div class="gContent noBtm">
             <div class="topInfo">
                 <h2 class="gTitle"><?= $contenido['titulo'] ?>
                     <span><?= $contenido['subtitulo'] ?></span>
                     <select name="select" id="ediactiva">
                         <?php foreach ($edicionAnt as $edicion) : ?>
                         <option value="<?= $edicion['ano_edi']  ?>"
                             <?php  if($edicionseleccionada==$edicion['ano_edi'])  echo "selected";  ?>>
                             <?= $edicion['ano_edi']  ?></option>
                         <?php endforeach;  ?>
                     </select>
                 </h2>
                 <div class="gIntro"><?= $contenido['descripcion'] ?></div>
             </div>
             <img src="<?= $contenido['imagen'] ?>" alt="">
             <div class="listRegiones bg2 top">
                 <div class="listR">
                     <article class="iRegionesLeft">
                         <h2>Programación</h2>
                     </article>
                     <?php if (!empty($contenido['ad1_edi'])) { ?>
                     <article class="iRegionesRight programaciones">
                         <a target="_blank" href="<?= $contenido['ad1_edi'] ?>">
                             <img src="<?= $contenido['im1_edi'] ?>" alt="">
                         </a>
                     </article>
                     <?php } ?>
                     <?php if (!empty($contenido['ad2_edi'])) { ?>
                     <article class="iRegionesRight programaciones">
                         <a target="_blank" href="<?= $contenido['ad2_edi'] ?>">
                             <img src="<?= $contenido['im2_edi'] ?>" alt="">
                         </a>
                     </article>
                     <?php } ?>
                     <?php if (!empty($contenido['ad3_edi'])) { ?>
                     <article class="iRegionesRight programaciones">
                         <a target="_blank" href="<?= $contenido['ad3_edi'] ?>">
                             <img src="<?= $contenido['im3_edi'] ?>" alt="">
                         </a>
                     </article>
                     <?php } ?>
                     <?php if (!empty($contenido['ad4_edi'])) { ?>
                     <article class="iRegionesRight programaciones">
                         <a target="_blank" href="<?= $contenido['ad4_edi'] ?>">
                             <img src="<?= $contenido['im4_edi'] ?>" alt="">
                         </a>
                     </article>
                     <?php } ?>
                     <?php if (!empty($contenido['ad5_edi'])) { ?>
                     <article class="iRegionesRight programaciones">
                         <a target="_blank" href="<?= $contenido['ad5_edi'] ?>">
                             <img src="<?= $contenido['im5_edi'] ?>" alt="">
                         </a>
                     </article>
                     <?php } ?>
                 </div>
             </div>
         </div>
     </div>
 </div>

 <script type="text/javascript">
const el = document.getElementById("ediactiva");
el.addEventListener("change", function() {
    console.log(el.value)
    let url = 'https://bogotamarket.com/ediciones/' + el.value;
    window.location.href = url
    console.log(url)
}, false);
 </script>