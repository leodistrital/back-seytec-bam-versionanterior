<form id="formpaso3" method="POST" enctype="multipart/form-data">
    <div class="sectExtraInt">
        <div class="maxW">
            <section id="mainForm" class="contForm">
                <div class="gCenter">
                    <div class="titleForm">
                        <h2>Datos de la empresa<em> / Company Information</em></h2>
                        <p class="noteRequired">Al enviar esta información, acepta que sus datos hagan parte de las
                            publicaciones del BAM.<em> <br><br> By submitting this information, you agree to have your
                                data included in BAM publications.</em>
                        </p>
                    </div>
                    <fieldset>
                        <div class="gCol col2">
                            <div>
                                <p>
                                    <label class="gLabel required">
                                        <span class="label"><strong>Nombre de la empresa<em> / Company
                                                    name</em></strong></span>
                                        <input type="text" name="nombreempresa" id=""
                                            value="<?=$datauser['nombreempresa']?>">
                                    </label>
                                </p>
                            </div>
                            <div>
                                <p>
                                    <label class="gLabel">
                                        <span class="label"><strong>NIT (solo para empresas colombianas)<em><br> / NIT
                                                    (only for colombian companies)</em></strong></span>
                                        <input type="text" name="nit" id="nit" value="<?=$datauser['nit']?>">
                                    </label>
                                </p>
                            </div>
                        </div>
                        <div class="gCol col2">
                            <div>
                                <p>
                                    <label class="gLabel required">
                                        <span class="label"><strong>Cargo en la empresa<em> / Position in the
                                                    company</em></strong></span>
                                        <input type="text" name="cargoempresa" id="cargoempresa"
                                            value="<?=$datauser['cargoempresa']?>">
                                    </label>
                                </p>
                            </div>




                            <div>
                                <p>
                                    <label class="gLabel required">
                                        <span class="label"><strong>Dirección de la empresa<em> / Company
                                                    Address</em></strong></span>
                                        <input type="text" name="direccionempresa" id="direccionempresa"
                                            value="<?=$datauser['direccionempresa']?>">
                                    </label>
                                </p>
                            </div>


                        </div>
                        <div class="gCol col2">
                            <div>
                                <p>
                                    <label class="gLabel tSelect required">
                                        <span class="label"><strong>Indicativo<em> / Country
                                                    Code</em></strong></span>
                                        <?php $paises =$recursos['paises']; ?>
                                        <?php $indicativo =$recursos['indicativo']; ?>
                                        <select name="indicativoempresa" id="indicativoempresa">
                                            <option value="">Seleccione / Select</option>
                                            <?php foreach ($indicativo as $item): ?>
                                            <option value="<?=$item['valor']?>"
                                                <?=$datauser['indicativoempresa']==$item['valor'] ? 'selected': '' ?>>
                                                <?=$item['dato']?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </label>
                                </p>
                            </div>
                            <div>
                                <p>
                                    <label class="gLabel required">
                                        <span class="label"><strong>Teléfono de la empresa<em> / Company Phone
                                                    number</em></strong></span>
                                        <input type="text" name="telefonoempresa" id="telefonoempresa"
                                            value="<?=$datauser['telefonoempresa']?>">
                                    </label>
                                </p>
                            </div>
                        </div>
                        <div class="gCol col2">
                            <div>
                                <p>
                                    <label class="gLabel required">
                                        <span class="label"><strong>Correo electrónico de la empresa<em> / Company
                                                    E-mail</em></strong></span>
                                        <input type="text" name="correoempresa" id="correoempresa"
                                            value="<?=$datauser['correoempresa']?>">
                                    </label>
                                </p>
                            </div>
                            <div>
                                <p>
                                    <label class="gLabel tSelect required">
                                        <span class="label"><strong>País<em> / Country</em></strong></span>
                                        <select name="paisempresa" id="paisempresa">
                                            <option value="">Seleccione / Select</option>
                                            <?php foreach ($paises as $item): ?>
                                            <option value="<?=$item['valor']?>"
                                                <?=$datauser['paisempresa']==$item['valor'] ? 'selected': '' ?>>
                                                <?=$item['dato']?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </label>
                                </p>
                            </div>
                        </div>
                        <p>
                            <label class="gLabel required">
                                <span class="label"><strong>Ciudad<em> / City</em></strong></span>
                                <input type="text" name="ciudadempresa" id="ciudadempresa"
                                    value="<?=$datauser['ciudadempresa']?>">
                            </label>
                        </p>
                        <div class="gCol">
                            <div>
                                <p>
                                    <label class="gLabel required">
                                        <span class="label"><strong>Actividad de la empresa <em>/ Company's
                                                    activity</em></strong></span></label>
                                </p>

                                <p></p>
                            </div>
                        </div>
                        <?php 
                                    $actividad = explode("**", $datauser['actividad']);
                                    ?>
                        <div class="gCol col2">
                            <div>
                                <p>
                                    <label class="gCR">
                                        Agente de ventas <em>/ Sales Agent</em><input type="checkbox" name="actividad[]"
                                            id="actividad[]" value="16"
                                            <?= in_array(16, $actividad) ? 'checked' : '' ?>>
                                        <span class="icoC"></span>
                                    </label>
                                </p>
                            </div>
                            <div>
                                <p>
                                    <label class="gCR">
                                        Canal de TV <em>/ TV Channel</em><input type="checkbox" name="actividad[]"
                                            id="actividad[]" value="1" <?= in_array(1, $actividad) ? 'checked' : '' ?>>
                                        <span class="icoC"></span>
                                    </label>
                                </p>
                            </div>
                        </div>

                        <div class="gCol col2">
                            <div>
                                <p>
                                    <label class="gCR">
                                        Casa de renta de equipos<em> / Equipment rental</em><input type="checkbox"
                                            name="actividad[]" id="actividad[]" value="2"
                                            <?= in_array(2, $actividad) ? 'checked' : '' ?>>
                                        <span class="icoC"></span>
                                    </label>
                                </p>
                            </div>
                            <div>
                                <p>
                                    <label class="gCR">
                                        Distribución, exhibición, circulación<em> / Distribution, exhibition,
                                            circulation</em><input type="checkbox" name="actividad[]" id="actividad[]"
                                            value="3" <?= in_array(3, $actividad) ? 'checked' : '' ?>>
                                        <span class="icoC"></span>
                                    </label>
                                </p>
                            </div>
                        </div>

                        <div class="gCol col2">
                            <div>
                                <p>
                                    <label class="gCR">
                                        Educación <em> / Education</em> <input type="checkbox" name="actividad[]"
                                            id="actividad[]" value="4" <?= in_array(4, $actividad) ? 'checked' : '' ?>>
                                        <span class="icoC"></span>
                                    </label>
                                </p>
                            </div>
                            <div>
                                <p>
                                    <label class="gCR">
                                        Estudio de animación<em> / Animation studio</em> <input type="checkbox"
                                            name="actividad[]" id="actividad[]" value="5"
                                            <?= in_array(5, $actividad) ? 'checked' : '' ?>>
                                        <span class="icoC"></span>
                                    </label>
                                </p>
                            </div>
                        </div>

                        <div class="gCol col2">
                            <div>
                                <p>
                                    <label class="gCR">
                                        Festival - evento cultural<em> / Festival - cultural event</em> <input
                                            type="checkbox" name="actividad[]" id="actividad[]" value="6"
                                            <?= in_array(6, $actividad) ? 'checked' : '' ?>>
                                        <span class="icoC"></span>
                                    </label>
                                </p>
                            </div>
                            <div>
                                <p>
                                    <label class="gCR">
                                        Institución - organización cultural<em> / Institution - Cultural
                                            Association</em>
                                        <input type="checkbox" name="actividad[]" id="actividad[]" value="7"
                                            <?= in_array(7, $actividad) ? 'checked' : '' ?>>
                                        <span class="icoC"></span>
                                    </label>
                                </p>
                            </div>
                        </div>
                        <div class="gCol col2">
                            <div>
                                <p>
                                    <label class="gCR">
                                        Marketing y comunicaciones<em> / Marketing and Communications</em> <input
                                            type="checkbox" name="actividad[]" id="actividad[]" value="8"
                                            <?= in_array(8, $actividad) ? 'checked' : '' ?>>
                                        <span class="icoC"></span>
                                    </label>
                                </p>
                            </div>
                            <div>
                                <p>
                                    <label class="gCR">
                                        Nuevos medios<em> / New media</em> <input type="checkbox" name="actividad[]"
                                            id="actividad[]" value="9" <?= in_array(9, $actividad) ? 'checked' : '' ?>>
                                        <span class="icoC"></span>
                                    </label>
                                </p>
                            </div>
                        </div>
                        <div class="gCol col2">
                            <div>
                                <p>
                                    <label class="gCR">
                                        Postproducción de video<em> / Video postproduction</em> <input type="checkbox"
                                            name="actividad[]" id="actividad[]" value="10"
                                            <?= in_array(10, $actividad) ? 'checked' : '' ?>>
                                        <span class="icoC"></span>
                                    </label>
                                </p>
                            </div>

                            <div>
                                <p>
                                    <label class="gCR">
                                        Postproducción de audio<em> / Audio postproduction</em> <input type="checkbox"
                                            name="actividad[]" id="actividad[]" value="100"
                                            <?= in_array(100, $actividad) ? 'checked' : '' ?>>
                                        <span class="icoC"></span>
                                    </label>
                                </p>
                            </div>


                        </div>
                        <div class="gCol col2">

                            <div>
                                <p>
                                    <label class="gCR">
                                        Producción audiovisual<em> / Audiovisual production</em> <input type="checkbox"
                                            name="actividad[]" id="actividad[]" value="11"
                                            <?= in_array(11, $actividad) ? 'checked' : '' ?>>
                                        <span class="icoC"></span>
                                    </label>
                                </p>
                            </div>
                            <div>
                                <p>
                                    <label class="gCR">
                                        Servicios de producción<em> / Production services</em> <input type="checkbox"
                                            name="actividad[]" id="actividad[]" value="12"
                                            <?= in_array(12, $actividad) ? 'checked' : '' ?>>
                                        <span class="icoC"></span>
                                    </label>
                                </p>
                            </div>

                        </div>
                        <div class="gCol col2">
                            <div>
                                <p>
                                    <label class="gCR">
                                        Servicios jurídicos<em> / Legal services</em> <input type="checkbox"
                                            name="actividad[]" id="actividad[]" value="13"
                                            <?= in_array(13, $actividad) ? 'checked' : '' ?>>
                                        <span class="icoC"></span>
                                    </label>
                                </p>
                            </div>
                            <div>
                                <p>
                                    <label class="gCR">
                                        Plataforma VOD<em> / VOD Platform</em> <input type="checkbox" name="actividad[]"
                                            id="actividad[]" value="14"
                                            <?= in_array(14, $actividad) ? 'checked' : '' ?>>
                                        <span class="icoC"></span>
                                    </label>
                                </p>
                            </div>
                        </div>

                        <div class="gCol col2">
                            <div>
                                <p>
                                    <label class="gCR">
                                        Otro<em> / Other</em> <input type="checkbox" name="actividad[]" id="actividad[]"
                                            value="15" class="otroactividad"
                                            <?= in_array(15, $actividad) ? 'checked' : '' ?>>
                                        <span class="icoC"></span>
                                    </label>
                                </p>
                            </div>
                        </div>



                        <p id="p-otrointeres" style="display: none;">
                            <label class="gLabel required">
                                <span class="label"><strong>¿Cuál?<em> / Which?</em></strong></span>
                                <textarea name="otraactividad" id="otraactividad"></textarea>
                            </label>
                        </p>
                        <p></p>
                        <p>
                            <label class="gLabel required">
                                <span class="label"><strong>Página web de la empresa<em> / Company
                                            website</em></strong></span>
                                <textarea name="webempresa" id="webempresa"><?=$datauser['webempresa']?></textarea>
                            </label>
                        </p>
                    </fieldset>
                </div>
            </section>
        </div>
    </div>
    <div class="contBtns">
        <?php if($datauser['divpaso2'] == 1) { ?>
        <button type="submit" class="gButton">Guardar y continuar / Save and continue</button>
        <?php }  ?>
    </div>
</form>