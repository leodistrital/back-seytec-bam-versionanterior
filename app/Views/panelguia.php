<?php
echo $this->include("components/cabezote/head");
echo $this->include('components/cabezote/header');
?>
<?php
echo $this->include("components/internas/banner_interno");
?>
<section class="gMSection_interna">
    <?php
    echo $this->include("components/internas/contenidopanel");
    echo $this->include("components/guia/banners");
    ?>
    <form method="post" style="display: none;" id="formsearch" action="/panel/guia/<?=$tipoguia?>">
        <!-- <form method="post" style="" id="formsearch" action="/panel/guia/<?=$tipoguia?>"> -->
        <input type="text" name="sector" id="sector" value="<?=$formFiltros['sector']?>">
        <input type="text" name="paisform" id="paisform" value="<?=$formFiltros['paisform']?>">
        <input type="text" name="textoform" id="textoform" value="<?=$formFiltros['textoform']?>">
        <input type="text" name="porganizar" id="porganizar" value="<?=$formFiltros['porganizar']?>">
        <input type="text" name="pagina" id="pagina" value="<?=$formFiltros['pagina']?>">
        <input type="text" name="letra" id="letra" value="<?=$formFiltros['letra']?>">
        <button type="submit">ir</button>
    </form>
    <div class="sectExtraInt bg3">
        <div class="maxW">
            <section id="mainForm" class="contFormGuia">
                <div class="gCenter">
                    <?=$this->include("components/guia/botones");?>
                    <?=$this->include("components/guia/filtros");?>
                </div>
            </section>
        </div>
    </div>
    <?php
    echo $this->include("components/guia/listado");
    ?>
</section>
<?php
echo $this->include('components/footer/foot.php');
?>