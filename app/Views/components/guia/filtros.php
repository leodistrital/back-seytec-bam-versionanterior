<div class="gCol col3">
    <div>
        <p>
            <select name="actividad" id="actividad">
                <option value="">Sector de actividad / Activity</option>
                <?php foreach ($filtros['actividades'] as $item) : ?>
                <option value="<?=$item['valor']?>" <?=$item['valor']==$formFiltros['sector']? 'selected' : '' ?>>
                    <?=$item['dato']?></option>
                <?php  endforeach ?>
            </select>
        </p>
    </div>
    <div>
        <p>
            <select name="paisResidencia" id="paisResidencia">
                <option value="">País de residencia / Country of residence</option>
                <?php foreach ($filtros['paises'] as $item) : ?>
                <option value="<?=$item['valor']?>" <?=$item['valor']==$formFiltros['paisform']? 'selected' : '' ?>>
                    <?=$item['dato']?></option>
                <?php  endforeach ?>
            </select>
        </p>
    </div>
    <div>
        <p>
            <input type="text" name="txtsearch" id="txtsearch" class="txtsearch" value="<?=$formFiltros['textoform']?>">
        </p>
    </div>
</div>