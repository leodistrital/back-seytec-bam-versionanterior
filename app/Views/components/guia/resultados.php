<?php 
$totalregistros = $totalRegstrosGlobal;

if(empty($formFiltros['pagina'])){
    $formFiltros['pagina'] =1;
    $mostrandoinicio = 1;
    $mostrandofin = $formFiltros['pagina'] * $resultadosporPagina;
} else {
    $mostrandoinicio = ($formFiltros['pagina'] - 1) * $resultadosporPagina + 1;
    $mostrandofin = $formFiltros['pagina'] * $resultadosporPagina;
}

if($totalregistros < $mostrandofin){
    $mostrandofin =$totalregistros;
}
?>
<!-- <div> -->
    <h3><b>Resultados
            <!-- <?=$totalregistros ?> -  -->
            <?=$mostrandofin?> de <?=$totalregistros?>
        </b>
        <br><br>
    </h3>
<!-- </div> -->