 <div class="gCol col numAlfa">
     <div>
         <h3>
             <?php foreach ($filtros['abecedario'] as $item) : ?>
             <a href="#" class="<?=$formFiltros['letra']==$item['letra'] ? 'activo' : '' ?>"
                 onclick="cambioletra('<?=$item['letra']?>')"><?=$item['letra']?></a> |
             <?php  endforeach ?>
         </h3>
     </div>
 </div>