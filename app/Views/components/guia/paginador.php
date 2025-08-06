<?php
// print_r($formFiltros);
$paginafin=0;

if(empty($formFiltros['pagina'])){
    $paginaActual=1;
} else {
     $paginaActual=$formFiltros['pagina'];
}

 $totalregistros = $totalRegstrosGlobal;
 $totalpaginas =  ceil( $totalregistros / $resultadosporPagina);
 
 if($totalpaginas>1) {
    // echo "pagina actual: ".$paginaActual."<br>";
    // echo "total paginas: ".$totalpaginas."<br>";
    if($totalpaginas<=$paginaActual +5){
        $paginafin =$totalpaginas;
    }
    else  {
        $paginafin=$paginaActual +5;
    }
?>
<div class="gCol col numeracion">
    <div>
        <h3>
            <?php if ($paginaActual != 1): ?>
            <a href="#" onclick="paginar(<?=$paginaActual-1?>)">
                < </a>
                    <?php endif ?>
                    <?php for ($i=$paginaActual; $i<=$paginafin ; $i++) {  ?>
                    <a href="#" class="<?=$formFiltros['pagina']==$i ? 'activo' : '' ?>" onclick="paginar(<?=$i?>)">
                        <?=$i?></a> |
                    <?php }  ?>

                    <?php if ($paginafin < $totalpaginas ): ?>
                    <a href="#" onclick="paginar(<?=$i?>)">
                        > </a>
                    <?php endif ?>
        </h3>
    </div>
</div>
<?php } ?>