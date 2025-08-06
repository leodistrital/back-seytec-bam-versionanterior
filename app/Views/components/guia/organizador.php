<div>
    <p>
        <label class="gLabel resp">
            <!-- <span class="label"><strong>Organizar por<em> / Organizar por</em></strong></span> -->
            <select name="orgonizador" id="orgonizador">
                <option value="nombre" <?=$formFiltros['porganizar']=='nombre' ? 'selected' : '' ?>>Nombre /
                    <em>Name</em>
                </option>
                <option value="pais" <?=$formFiltros['porganizar']=='pais' ? 'selected' : '' ?>>País / <em>Country</em>
                </option>
            </select>
        </label>
    </p>
</div>