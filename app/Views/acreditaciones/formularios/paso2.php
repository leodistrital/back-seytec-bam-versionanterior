<form id="formpaso2" name="formpaso2" method="POST" enctype="multipart/form-data">
    <div class="sectExtraInt">
        <div class="maxW">
            <section id="mainForm" class="contForm">
                <div class="gCenter">
                    <div class="titleForm">
                        <h2>Información profesional y de contacto <em> / Professional and contact information
                            </em></h2>
                        <p class="noteRequired">Esta información no será públicada y se utilizará únicamente con fines
                            relacionados con su acreditación al Mercado. <em><br> <br>
                                This information will not be made public
                                and will be used only for purposes related to your accreditation to the market. </em>
                        </p>
                    </div>
                    <fieldset>
                        <div class="gCol col2">
                            <div>
                                <p>
                                    <label class="gLabel tSelect required">
                                        <span class="label"><strong>Indicativo<em> / Country Code</em></strong></span>

                                        <?php $paises = $recursos['paises']; ?>
                                        <?php $indicativo = $recursos['indicativo']; ?>
                                        <select name="indicativo" id="indicativo">
                                            <option value="">Seleccione</option>
                                            <?php foreach ($indicativo as $item) : ?>
                                            <option value="<?= $item['valor'] ?>"
                                                <?= $datauser['indicativo'] == $item['valor'] ? 'selected' : '' ?>>
                                                <?= $item['dato'] ?></option>
                                            <?php endforeach ?>
                                        </select>

                                    </label>
                                </p>
                            </div>
                            <div>
                                <p>
                                    <label class="gLabel required">
                                        <span class="label"><strong>Teléfono de contacto <em> / Phone
                                                    number</em></strong></span>
                                        <input type="text" name="telefono" id="telefono"
                                            value="<?= $datauser['telefono'] ?>">
                                    </label>
                                </p>
                            </div>
                        </div>
                        <div class="gCol col2">
                            <div>
                                <p>
                                    <label class="gLabel required">
                                        <span class="label"><strong>Correo electrónico de contacto<em> / E-mail
                                                </em></strong></span>
                                        <input type="text" name="mailcontacto" id="mailcontacto"
                                            value="<?= $datauser['mailcontacto'] ?>">
                                    </label>
                                </p>
                            </div>
                            <div>
                                <p>
                                    <label class="gLabel required">
                                        <span class="label"><strong>Confirmación correo electrónico de contacto
                                                <em> / E-mail confirmation</em></strong></span>
                                        <input type="text" name="confMail" id="confMail"
                                            value="<?= $datauser['confMail'] ?>">
                                    </label>
                                </p>
                            </div>
                        </div>
                        <div class="gCol col2">
                            <div>
                                <p>
                                    <label class="gLabel tSelect required">
                                        <span class="label"><strong>Idioma<em> / Language</em></strong></span>
                                        <select name="idioma" id="idioma">
                                            <option value="">Seleccione una opción / Select</option>
                                            <option value="1" <?= $datauser['idioma'] == 1  ? 'selected' : ''; ?>>
                                                Español
                                                / Spanish</option>
                                            <option value="2" <?= $datauser['idioma'] == 2  ? 'selected' : ''; ?>>Inglés
                                                /
                                                English</option>
                                        </select>
                                    </label>
                                </p>
                            </div>
                            <div>
                                <p>
                                    <label class="gLabel tSelect required">
                                        <span class="label"><strong>¿Participó en ediciones anteriores de BAM
                                                Regiones?<br><em> / Did you participate in previous editions of BAM
                                                    Regiones?</em></strong></span>
                                        <select name="partifiporegiones" id="partifiporegiones">
                                            <option value="">Seleccione una opción / Select</option>
                                            <option value="1"
                                                <?= $datauser['partifiporegiones'] == 1  ? 'selected' : ''; ?>>Sí / Yes
                                            </option>
                                            <option value="0"
                                                <?= $datauser['partifiporegiones'] == 0  ? 'selected' : ''; ?>>No / No
                                            </option>
                                        </select>
                                    </label>
                                </p>
                            </div>
                        </div>
                        <p id="cualciudad" style="display: none;">
                            <label class="gLabel tSelect required">
                                <span class="label"><strong>¿En qué ciudad?<em> / In which city?</em></strong></span>
                                <?php $ciudades = $recursos['ciudades']; ?>
                                <select name="ciudadparticipo" id="ciudadparticipo">
                                    <option value="">Seleccione una opción / Select</option>
                                    <?php foreach ($ciudades as $item) : ?>
                                    <option value="<?= $item['valor'] ?>"
                                        <?= $datauser['ciudadparticipo'] == $item['valor'] ? 'selected' : '' ?>>
                                        <?= $item['dato'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </label>
                        </p>
                    </fieldset>
                </div>
            </section>
        </div>
    </div>

    <div class="sectExtraInt  bg2">
        <div class="maxW">
            <section id="mainForm" class="contForm">
                <div class="gCenter">
                    <div class="titleForm">
                        <h2>Información para publicaciones<em> / Information for publications</em></h2>
                        <p class="noteRequired">Al enviar esta información, acepta que sus datos hagan parte de las
                            publicaciones del BAM.<em> <br> <br>By submitting this information, you agree to have your
                                information included in BAM publications.</em></p>
                    </div>
                    <fieldset>
                        <div class="gCol col2">
                            <div>
                                <p>
                                    <label class="gLabel tSelect">
                                        <span class="label"><strong>Indicativo<em> / Country Code</em></strong></span>
                                        <select name="indicativopublicacion" id="indicativopublicacion">
                                            <option value="">Seleccione una opción / Select</option>

                                            <?php foreach ($indicativo as $item) : ?>
                                            <option value="<?= $item['valor'] ?>"
                                                <?= $datauser['indicativopublicacion'] == $item['valor'] ? 'selected' : '' ?>>
                                                <?= $item['dato'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </label>
                                </p>
                            </div>
                            <div>
                                <p>
                                    <label class="gLabel">
                                        <span class="label"><strong>Teléfono<em> / Phone number</em></strong></span>
                                        <input type="text" name="telefonopublicacion" id="telefonopublicacion"
                                            value="<?= $datauser['telefonopublicacion'] ?>">
                                    </label>
                                </p>
                            </div>
                        </div>

                        <div class="gCol col2">
                            <div>
                                <p>
                                    <label class="gLabel required">
                                        <span class="label"><strong>Correo electrónico<em> / E-mail</em></strong></span>
                                        <input type="text" name="correopublicacion" id="correopublicacion"
                                            value="<?= $datauser['correopublicacion'] ?>">
                                    </label>
                                </p>
                            </div>
                            <div>
                                <p>
                                    <label class="gLabel tSelect required">

                                        <span class="label"><strong>Actividad profesional<em> / Professional
                                                    activity</em></strong></span>
                                        <select name="sectoractividad" id="sectoractividad">
                                            <option value="">Seleccione una opción / Select</option>
                                            <option value="1"
                                                <?= $datauser['sectoractividad'] == 1  ? 'selected' : ''; ?>>Abogado /
                                                Lawyer</option>
                                            <option value="2"
                                                <?= $datauser['sectoractividad'] == 2  ? 'selected' : ''; ?>>Académico -
                                                Investigador - Profesor / Researcher - Professor</option>
                                            <option value="3"
                                                <?= $datauser['sectoractividad'] == 3  ? 'selected' : ''; ?>>Actor/
                                                Actor
                                                / Actress</option>
                                            <option value="4"
                                                <?= $datauser['sectoractividad'] == 4  ? 'selected' : ''; ?>>Artista /
                                                Artist</option>
                                            <option value="5"
                                                <?= $datauser['sectoractividad'] == 5  ? 'selected' : ''; ?>>Animador /
                                                Animator</option>
                                            <option value="6"
                                                <?= $datauser['sectoractividad'] == 6  ? 'selected' : ''; ?>>Camarógrafo
                                                /
                                                Cameramen</option>
                                            <option value="7"
                                                <?= $datauser['sectoractividad'] == 7  ? 'selected' : ''; ?>>Compositor
                                                /
                                                Composer</option>
                                            <option value="8"
                                                <?= $datauser['sectoractividad'] == 8  ? 'selected' : ''; ?>>Director
                                            </option>
                                            <option value="9"
                                                <?= $datauser['sectoractividad'] == 9  ? 'selected' : ''; ?>>Director de
                                                fotografía / Cinematographer</option>
                                            <option value="10"
                                                <?= $datauser['sectoractividad'] == 10  ? 'selected' : ''; ?>>Director
                                                de
                                                arte / Art director</option>
                                            <option value="11"
                                                <?= $datauser['sectoractividad'] == 11  ? 'selected' : ''; ?>>Diseñador
                                                de
                                                sonido-Sonidista / Sound designer</option>
                                            <option value="12"
                                                <?= $datauser['sectoractividad'] == 12  ? 'selected' : ''; ?>>Diseñador
                                                gráfico / Graphic designer</option>
                                            <option value="13"
                                                <?= $datauser['sectoractividad'] == 13  ? 'selected' : ''; ?>>Editor
                                            </option>
                                            <option value="14"
                                                <?= $datauser['sectoractividad'] == 14  ? 'selected' : ''; ?>>Gestor
                                                cultural / Cultural Manager</option>
                                            <option value="15"
                                                <?= $datauser['sectoractividad'] == 15  ? 'selected' : ''; ?>>Guionista
                                                /
                                                Scriptwriter</option>
                                            <option value="16"
                                                <?= $datauser['sectoractividad'] == 16  ? 'selected' : ''; ?>>Manager de
                                                talentos / Talent manager</option>
                                            <option value="17"
                                                <?= $datauser['sectoractividad'] == 17  ? 'selected' : ''; ?>>
                                                Maquillista-Vestuarista / Make-up artist-Custom designer </option>
                                            <option value="18"
                                                <?= $datauser['sectoractividad'] == 18  ? 'selected' : ''; ?>>Equipo
                                                técnico / Technician</option>
                                            <option value="19"
                                                <?= $datauser['sectoractividad'] == 19  ? 'selected' : ''; ?>>
                                                Postproductor / Postproducer</option>
                                            <option value="20"
                                                <?= $datauser['sectoractividad'] == 20  ? 'selected' : ''; ?>>Productor
                                                /
                                                Producer</option>
                                            <option value="21"
                                                <?= $datauser['sectoractividad'] == 21  ? 'selected' : ''; ?>>
                                                Relacionista
                                                público / PR</option>
                                            <option value="22"
                                                <?= $datauser['sectoractividad'] == 22  ? 'selected' : ''; ?>>
                                                Representante de festival / Festival delegate</option>
                                            <option value="23"
                                                <?= $datauser['sectoractividad'] == 23  ? 'selected' : ''; ?>>
                                                Comunicación
                                                / Communication and Marketing</option>
                                            <option value="24"
                                                <?= $datauser['sectoractividad'] == 24  ? 'selected' : ''; ?>>
                                                Coordinador
                                                administrativo / Administrative Coordinator </option>
                                            <option value="25"
                                                <?= $datauser['sectoractividad'] == 25  ? 'selected' : ''; ?>>
                                                Periodista/Journalist</option>
                                        </select>
                                    </label>
                                </p>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </section>
        </div>
    </div>

    <div class="sectExtraInt">
        <div class="maxW">
            <section id="mainForm" class="contForm">
                <div class="gCenter">
                    <div class="titleForm">
                        <h2>Intereses y objetivos de su participación <em> / Interests and objectives of your
                                participation</em></h2>
                        <p class="noteRequired">Esta información no será publicada y será utilizada únicamente con fines
                            relacionados con su participación en el Mercado<em> <br> <br> This information will not be
                                published
                                and will be used only for purposes related to your participation in the Market</em></p>
                    </div>
                    <fieldset>
                        <div class="gCol">
                            <div>
                                <p>
                                    <label class="gLabel required">
                                        <span class="label"><strong>¿Cuál es su mayor interés al querer participar en el
                                                BAM?
                                                <em> / What is your main interest in participating in the
                                                    BAM?</em></strong></span></label>
                                </p>

                                <p></p>
                            </div>
                        </div>
                        <div class="gCol col2">
                            <div>
                                <p>

                                    <?php
                                    $interees = explode("**", $datauser['intereses']);
                                    ?>
                                    <label class="gCR">
                                        Conseguir empresas productoras para coproducción de proyecto.
                                        audiovisuales.<br><em>To find production companies for the co-production of an
                                            audiovisual project.</em> <input type="checkbox" name="intereses[]"
                                            id="intereses[]" value="1" <?= in_array(1, $interees) ? 'checked' : '' ?>>
                                        <span class="icoC"></span>
                                    </label>
                                </p>
                            </div>
                            <div>
                                <p>
                                    <label class="gCR">
                                        Conseguir un Agente de ventas para un proyecto.<br><em>To find a sales agent
                                            for a project.</em> <input type="checkbox" name="intereses[]"
                                            id="intereses[]" value="2" <?= in_array(2, $interees) ? 'checked' : '' ?>>
                                        <span class="icoC"></span>
                                    </label>
                                </p>
                            </div>
                        </div>

                        <div class="gCol col2">
                            <div>
                                <p>
                                    <label class="gCR">
                                        Conseguir un Canal de televisión o Plataforma VOD para un proyecto.<br><em>To
                                            find a TV Channel or VOD Platform for a project.</em> <input type="checkbox"
                                            name="intereses[]" id="intereses[]" value="3"
                                            <?= in_array(3, $interees) ? 'checked' : '' ?>>
                                        <span class="icoC"></span>
                                    </label>
                                </p>
                            </div>
                            <div>
                                <p>
                                    <label class="gCR">
                                        Conseguir un Festival para la muestra de un proyecto.<br><em>To find a
                                            Festival to showcase a project.</em> <input type="checkbox"
                                            name="intereses[]" id="intereses[]" value="4"
                                            <?= in_array(4, $interees) ? 'checked' : '' ?>>
                                        <span class="icoC"></span>
                                    </label>
                                </p>
                            </div>
                        </div>

                        <div class="gCol col2">
                            <div>
                                <p>
                                    <label class="gCR">
                                        Conseguir una compañía de servicios audiovisuales para un proyecto.<br><em>
                                            Securing an Audiovisual Services Company for a project.</em> <input
                                            type="checkbox" name="intereses[]" id="intereses[]" value="5"
                                            <?= in_array(5, $interees) ? 'checked' : '' ?>>
                                        <span class="icoC"></span>
                                    </label>
                                </p>
                            </div>
                            <div>
                                <p>
                                    <label class="gCR">
                                        Garantizar un Fondo para la financiación de un proyecto.<br><em>Securing a
                                            Fund for the financing of a project.</em> <input type="checkbox"
                                            name="intereses[]" id="intereses[]" value="6"
                                            <?= in_array(6, $interees) ? 'checked' : '' ?>>
                                        <span class="icoC"></span>
                                    </label>
                                </p>
                            </div>
                        </div>

                        <div class="gCol col2">
                            <div>
                                <p>
                                    <label class="gCR">
                                        Conocer otros agentes del sector audiovisual para ampliar su redes de contactos.
                                        <br><em>Meet other players in the audiovisual sector to expand your network
                                            of contacts.</em> <input type="checkbox" name="intereses[]" id="intereses[]"
                                            value="7" <?= in_array(7, $interees) ? 'checked' : '' ?>>
                                        <span class="icoC"></span>
                                    </label>
                                </p>
                            </div>
                            <div>
                                <p>
                                    <label class="gCR">
                                        Actualizarse sobre las tendencias de producción, distribución y circulación de
                                        contenidos audiovisuales.<br><em>Keep up to date on trends in production,
                                            distribution and circulation of audiovisual content.</em> <input
                                            type="checkbox" name="intereses[]" id="intereses[]" value="8"
                                            <?= in_array(8, $interees) ? 'checked' : '' ?>>
                                        <span class="icoC"></span>
                                    </label>
                                </p>
                            </div>
                        </div>

                        <div class="gCol col2">
                            <div>
                                <p>
                                    <label class="gCR">
                                        Otro<em> / Other</em> <input type="checkbox" name="intereses[]" id="intereses[]"
                                            value="9" class="otrointeresval"
                                            <?= in_array(9, $interees) ? 'checked' : '' ?>>
                                        <span class="icoC"></span>
                                    </label>
                                </p>
                            </div>
                            <div>
                            </div>
                        </div>
                        <p id="p-otrointeres" style="display: none;">
                            <label class="gLabel required">
                                <span class="label"><strong>Cuál<em> / Which one?</em></strong></span>
                                <textarea name="otrointeres"
                                    id="otrointeres"> <?= $datauser['otrointeres'] ?></textarea>
                            </label>
                        </p>
                        <p></p>
                        <div class="gCol">
                            <div>
                                <p>
                                    <label class="gLabel required">
                                        <span class="label"><strong>Territorios de interés según los objetivos de sus
                                                proyectos<em> / Territories of interest according to the objectives of
                                                    your projects</em></strong></span></label>
                                </p>

                                <p></p>
                            </div>
                        </div>

                        <?php
                        $territorio = explode("**", $datauser['territorio']);
                        ?>

                        <div class="gCol col4">
                            <div>
                                <p>
                                    <label class="gCR">
                                        África<em> / Africa</em><input type="checkbox" name="territorio[]"
                                            id="territorio[]" value="1"
                                            <?= in_array(1, $territorio) ? 'checked' : '' ?>>
                                        <span class="icoC"></span>
                                    </label>
                                </p>
                            </div>
                            <div>
                                <p>
                                    <label class="gCR">
                                        Asia<em> / Asia</em><input type="checkbox" name="territorio[]" id="territorio[]"
                                            value="2" <?= in_array(2, $territorio) ? 'checked' : '' ?>>
                                        <span class="icoC"></span>
                                    </label>
                                </p>
                            </div>
                            <div>
                                <p>
                                    <label class="gCR">
                                        Europa occidental<em> / Western Europe</em><input type="checkbox"
                                            name="territorio[]" id="territorio[]" value="3"
                                            <?= in_array(3, $territorio) ? 'checked' : '' ?>>
                                        <span class="icoC"></span>
                                    </label>
                                </p>
                            </div>
                            <div>
                                <p>
                                    <label class="gCR">
                                        Europa oriental<em> / Eastern Europe</em><input type="checkbox"
                                            name="territorio[]" id="territorio[]" value="4"
                                            <?= in_array(4, $territorio) ? 'checked' : '' ?>>
                                        <span class="icoC"></span>
                                    </label>
                                </p>
                            </div>
                        </div>
                        <div class="gCol col4">
                            <div>
                                <p>
                                    <label class="gCR">
                                        Latinoamérica<em> / Latin America</em> <input type="checkbox"
                                            name="territorio[]" id="territorio[]" value="5"
                                            <?= in_array(5, $territorio) ? 'checked' : '' ?>>
                                        <span class="icoC"></span>
                                    </label>
                                </p>
                            </div>
                            <div>
                                <p>
                                    <label class="gCR">
                                        Medio oriente<em> / Middle East</em> <input type="checkbox" name="territorio[]"
                                            id="territorio[]" value="8"
                                            <?= in_array(8, $territorio) ? 'checked' : '' ?>>
                                        <span class="icoC"></span>
                                    </label>
                                </p>
                            </div>
                            <div>
                                <p>
                                    <label class="gCR">
                                        Norteamérica<em> / North America</em> <input type="checkbox" name="territorio[]"
                                            id="territorio[]" value="7"
                                            <?= in_array(7, $territorio) ? 'checked' : '' ?>>
                                        <span class="icoC"></span>
                                    </label>
                                </p>
                            </div>
                            <div>
                                <p>
                                    <label class="gCR">
                                        Oceanía<em> / Oceanía</em> <input type="checkbox" name="territorio[]"
                                            id="territorio[]" value="6"
                                            <?= in_array(6, $territorio) ? 'checked' : '' ?>>
                                        <span class="icoC"></span>
                                    </label>
                                </p>
                            </div>


                        </div>
                        <p>
                            <label class="gLabel required">
                                <span class="label"><strong>Mencione algunos países específicos de interés para sus
                                        proyectos<em> / Mention some specific countries of interest for your
                                            projects</em></strong></span>
                                <textarea name="mencionepaises"
                                    id="mencionepaises"><?= $datauser['mencionepaises'] ?></textarea>
                            </label>
                        </p>
                        <p></p>
                        <p>
                            <label class="gLabel">
                                <span class="label"><strong>Perfiles de interés<em> / Mention your profiles of interest.
                                        </em></strong></span>
                                <textarea name="perfilinteres"
                                    id="perfilinteres"><?= $datauser['perfilinteres'] ?></textarea>
                            </label>
                        </p>
                    </fieldset>
                </div>
            </section>
        </div>
    </div>
    <div class="contBtns">
        <?php if ($datauser['divpaso1'] == 1) { ?>
        <button type="submit" class="gButton">Guardar y continuar / Save and continue</button>
        <?php }  ?>

    </div>
</form>