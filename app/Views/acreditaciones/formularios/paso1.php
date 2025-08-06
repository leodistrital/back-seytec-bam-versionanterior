<form id="formpaso1" method="POST" enctype="multipart/form-data">
    <div class="sectExtraInt">
        <div class="maxW">
            <section id="mainForm" class="contForm">
                <div class="gCenter">
                    <div class="titleForm">
                        <h2>Información personal <em>/ Personal information</em></h2>
                    </div>
                    <fieldset>
                        <div class="gCol col">
                            <p>
                                <label class="gLabel tSelect required">
                                    <span class="label"><strong>Forma de participación en el BAM<em> / Modalities of
                                                participation in BAM </em></strong></span>
                                    <select name="formPart" id="">
                                        <option value="">Seleccione una opción / Select</option>
                                        <option value="1" <?=$datauser['formPart'] == 1  ? 'selected' : '';?>>
                                            Representante
                                            de una empresa / Company representative</option>
                                        <option value="2" <?=$datauser['formPart'] == 2  ? 'selected' : '';?>>
                                            Profesional
                                            independiente / Independent professional</option>
                                        <option value="3" <?=$datauser['formPart'] == 3  ? 'selected' : '';?>>Prensa /
                                            Press
                                        </option>
                                    </select>
                                </label>
                            </p>
                        </div>

                        <div class="gCol col2">
                            <div>
                                <p>
                                    <label class="gLabel required">
                                        <span class="label"><strong>Nombres<em> / Name</em></strong></span>
                                        <input type="text" name="nombre" id="nombre" value="<?=$datauser['nombre']?>">
                                    </label>
                                </p>
                            </div>
                            <div>
                                <p>
                                    <label class="gLabel required">
                                        <span class="label"><strong>Apellidos<em> / Last name</em></strong></span>
                                        <input type="text" name="apellido" id="apellido"
                                            value="<?=$datauser['apellido']?>">
                                    </label>
                                </p>
                            </div>
                        </div>

                        <div class="gCol col2">
                            <div>
                                <p>
                                    <label class="gLabel tSelect required">
                                        <span class="label"><strong>Documento de identificación<em> /
                                                    ID</em></strong></span>
                                        <select name="tipodocumento" id="tipodocumento">
                                            <option value="">Seleccione / Select</option>
                                            <option value="1" <?=$datauser['tipodocumento'] == 1  ? 'selected' : '';?>>
                                                Cédula de ciudadanía / ID card of citizenship</option>
                                            <option value="2" <?=$datauser['tipodocumento'] == 2  ? 'selected' : '';?>>
                                                Cédula de extranjería / Foreigner's identification card
                                            </option>
                                            <option value="3" <?=$datauser['tipodocumento'] == 3  ? 'selected' : '';?>>
                                                Pasaporte / Passport</option>
                                        </select>
                                    </label>
                                </p>
                            </div>
                            <div class="double">
                                <p>
                                    <label class="gLabel required">
                                        <span class="label"><strong>Número de documento<em> / ID
                                                    Number</em></strong></span>
                                        <input type="text" name="numdocumento" id="numdocumento"
                                            value="<?=$datauser['numdocumento']?>">
                                    </label>
                                </p>
                            </div>
                        </div>
                        <div class="gCol col2">
                            <div>
                                <p>
                                    <label class="gLabel tSelect required">
                                        <span class="label"><strong>País de residencia<em> / Country of
                                                    residence</em></strong></span>
                                        <?php $paises =$recursos['paises']; ?>
                                        <select name="paisresidencia" id="paisresidencia">
                                            <option value="">Seleccione / Select</option>
                                            <?php foreach ($paises as $item): ?>
                                            <option value="<?=$item['valor']?>"
                                                <?=$datauser['paisresidencia']==$item['valor'] ? 'selected': '' ?>>
                                                <?=$item['dato']?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </label>
                                </p>
                            </div>
                            <div>
                                <p>
                                    <label class="gLabel required">
                                        <span class="label"><strong>Ciudad<em> / City</em></strong></span>
                                        <input type="text" name="ciudadresidencia" id="ciudadresidencia"
                                            value=" <?=$datauser['ciudadresidencia']?>">
                                    </label>
                                </p>
                            </div>
                        </div>
                        <div class="gCol col2">
                            <div>
                                <p>
                                    <label class="gLabel required">
                                        <span class="label"><strong>Dirección<em> / Address</em></strong></span>
                                        <input type="text" name="dirresidencia" id="dirresidencia"
                                            value=" <?=$datauser['dirresidencia']?>">
                                    </label>
                                </p>
                            </div>
                            <div>
                                <p>
                                    <label class="gLabel tSelect required">
                                        <span class="label"><strong>Nacionalidad<em> / Nationality

                                                </em></strong></span>
                                        <select name="nacionalidad" id="nacionalidad">
                                            <option value="">Seleccione / Select </option>
                                            <?php foreach ($paises as $item): ?>
                                            <option value="<?=$item['valor']?>"
                                                <?=$item['valor'] == $datauser['nacionalidad'] ? 'selected' : '' ?>>
                                                <?=$item['dato']?></option>
                                            <?php endforeach ?>
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

    <div class="sectExtraInt bg2">
        <div class="maxW">
            <section id="mainForm" class="contForm">
                <div class="gCenter">
                    <div class="titleForm">
                        <h2>Información demográfica <em> / Demographic information</em></h2>
                        <p class="noteRequired">Esta información es solicitada únicamente con fines estadísticos y no
                            será públicada en ninguna de las publicaciones o bases de datos del Bogotá Audiovisual
                            Market - BAM<br>
                            <br>
                            <em>
                                This information is requested for statistical purposes only and will not be published in
                                any of the publications or databases of the Bogotá Audiovisual Market - BAM.</em>
                        </p>
                    </div>
                    <fieldset>
                        <div class="gCol col2">
                            <div>
                                <p>
                                    <label class="gLabel tSelect">
                                        <span class="label"><strong>Localidad (aplica solo para residentes de
                                                Bogotá)<em> / Locality (applies only to Bogotá
                                                    residents)</em></strong></span>
                                        <select name="localidad" id="localidad">
                                            <option value="">Seleccione una opción / Select </option>
                                            <option value="1" <?=$datauser['localidad'] == 1  ? 'selected' : '';?>>
                                                Usaquén</option>
                                            <option value="2" <?=$datauser['localidad'] == 2  ? 'selected' : '';?>>
                                                Chapinero</option>
                                            <option value="3" <?=$datauser['localidad'] == 3  ? 'selected' : '';?>>San
                                                Cristobal</option>
                                            <option value="4" <?=$datauser['localidad'] == 4  ? 'selected' : '';?>>Usme
                                            </option>
                                            <option value="5" <?=$datauser['localidad'] == 5  ? 'selected' : '';?>>
                                                Tunjuelito</option>
                                            <option value="6" <?=$datauser['localidad'] == 6  ? 'selected' : '';?>>Bosa
                                            </option>
                                            <option value="7" <?=$datauser['localidad'] == 7  ? 'selected' : '';?>>
                                                Kennedy</option>
                                            <option value="8" <?=$datauser['localidad'] == 8  ? 'selected' : '';?>>
                                                Fontibón</option>
                                            <option value="9" <?=$datauser['localidad'] == 9  ? 'selected' : '';?>>
                                                Engativá</option>
                                            <option value="10" <?=$datauser['localidad'] == 10  ? 'selected' : '';?>>
                                                Suba</option>
                                            <option value="11" <?=$datauser['localidad'] == 11  ? 'selected' : '';?>>
                                                Barrios Unidos</option>
                                            <option value="12" <?=$datauser['localidad'] == 12  ? 'selected' : '';?>>
                                                Teusaquillo</option>
                                            <option value="13" <?=$datauser['localidad'] == 13  ? 'selected' : '';?>>Los
                                                Mártires</option>
                                            <option value="14" <?=$datauser['localidad'] == 14  ? 'selected' : '';?>>
                                                Antonio Nariño</option>
                                            <option value="15" <?=$datauser['localidad'] == 15  ? 'selected' : '';?>>
                                                Puente Aranda</option>
                                            <option value="16" <?=$datauser['localidad'] == 16  ? 'selected' : '';?>>La
                                                Candelaria</option>
                                            <option value="17" <?=$datauser['localidad'] == 17  ? 'selected' : '';?>>
                                                Rafael Uribe Uribe</option>
                                            <option value="18" <?=$datauser['localidad'] == 18  ? 'selected' : '';?>>
                                                Ciudad Bolívar</option>
                                            <option value="19" <?=$datauser['localidad'] == 19  ? 'selected' : '';?>>
                                                Sumapáz</option>
                                        </select>
                                    </label>
                                </p>
                            </div>
                            <div>
                                <p>
                                    <label class="gLabel tSelect required">
                                        <span class="label"><strong>Estrato socioeconómico (aplica solo para
                                                colombianos)<em> / Socioeconomic stratum (Applies only to
                                                    Colombians)</em></strong></span>
                                        <select name="estrato" id="estrato">
                                            <option value="">Seleccione una opción / Select </option>
                                            <option value="1" <?=$datauser['estrato'] == 1  ? 'selected' : '';?>>Estrato
                                                1</option>
                                            <option value="2" <?=$datauser['estrato'] == 2  ? 'selected' : '';?>>Estrato
                                                2</option>
                                            <option value="3" <?=$datauser['estrato'] == 3  ? 'selected' : '';?>>Estrato
                                                3</option>
                                            <option value="4" <?=$datauser['estrato'] == 4  ? 'selected' : '';?>>Estrato
                                                4</option>
                                            <option value="5" <?=$datauser['estrato'] == 5  ? 'selected' : '';?>>Estrato
                                                5</option>
                                            <option value="6" <?=$datauser['estrato'] == 6  ? 'selected' : '';?>>Estrato
                                                6</option>
                                            <option value="7" <?=$datauser['estrato'] == 7  ? 'selected' : '';?>>
                                                Prefiero no responder / I prefer not to answer</option>
                                        </select>
                                    </label>
                                </p>
                            </div>
                        </div>

                        <div class="gCol col2">
                            <div>
                                <p>
                                    <label class="gLabel tSelect required">
                                        <span class="label "><strong>Sexo<em> / Gender</em></strong></span>
                                        <select name="sexo" id="sexo">
                                            <option value="">Seleccione una opción / Select</option>
                                            <option value="1" <?=$datauser['sexo'] == 1  ? 'selected' : '';?>>Hombre /
                                                Male</option>
                                            <option value="2" <?=$datauser['sexo'] == 2  ? 'selected' : '';?>>Mujer /
                                                Female</option>
                                            <option value="3" <?=$datauser['sexo'] == 3  ? 'selected' : '';?>>
                                                Indeterminado (Interxex) / Undetermined (Interxex)
                                            </option>
                                            <option value="4" <?=$datauser['sexo'] == 4  ? 'selected' : '';?>>Prefiero
                                                no responder / I prefer not to answer</option>
                                        </select>
                                    </label>
                                </p>
                            </div>
                            <div class="double">
                                <p>
                                    <label class="gLabel tSelect required">
                                        <span class="label"><strong>Identidad de género<em> / Gender
                                                    identity</em></strong></span>
                                        <select name="identidad" id="identidad">
                                            <option value="">Seleccione una opción / Select </option>
                                            <option value="1" <?=$datauser['identidad'] == 1  ? 'selected' : '';?>>
                                                Hombre / Male</option>
                                            <option value="2" <?=$datauser['identidad'] == 2  ? 'selected' : '';?>>Mujer
                                                / Female </option>
                                            <option value="3" <?=$datauser['identidad'] == 3  ? 'selected' : '';?>>No
                                                binario / Non-binary</option>
                                            <option value="4" <?=$datauser['identidad'] == 4  ? 'selected' : '';?>>
                                                Mujer-trans / Female-trans</option>
                                            <option value="5" <?=$datauser['identidad'] == 5  ? 'selected' : '';?>>
                                                Hombre-trans / Male-trans</option>
                                            <option value="6" <?=$datauser['identidad'] == 6  ? 'selected' : '';?>>Otro
                                                / Other</option>
                                            <option value="7" <?=$datauser['identidad'] == 7  ? 'selected' : '';?>>
                                                Prefiero no responder / I prefer not to answer</option>
                                        </select>
                                    </label>
                                </p>
                            </div>
                        </div>
                        <div class="gCol col2">
                            <div>
                                <p>
                                    <label class="gLabel required">
                                        <span class="label"><strong>Fecha de nacimiento<em> /
                                                    Birthdate</em></strong></span>
                                        <input type="text" class="datepicker" name="nacimientofecha"
                                            id="nacimientofecha" data-range="1940:2008"
                                            value=" <?=$datauser['nacimientofecha']?>">
                                    </label>
                                </p>
                            </div>
                            <div class="double">
                                <p>
                                    <label class="gLabel tSelect required">
                                        <span class="label"><strong>¿Pertenece a algún grupo étnico?<em> / Do you belong
                                                    to any ethnic group?</em></strong></span>
                                        <select name="grupoetnia" id="grupoetnia">
                                            <option value="">Seleccione una opción / Select</option>
                                            <option value="1" <?=$datauser['grupoetnia'] == 1  ? 'selected' : '';?>>
                                                Indígena / Indigenous</option>
                                            <option value="2" <?=$datauser['grupoetnia'] == 2  ? 'selected' : '';?>>NARP
                                                / Afro-descendants, Indigenous and racialized people</option>
                                            <option value="3" <?=$datauser['grupoetnia'] == 3  ? 'selected' : '';?>>Rrom
                                                / Rom</option>
                                            <option value="4" <?=$datauser['grupoetnia'] == 4  ? 'selected' : '';?>>
                                                Ninguno / None</option>
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
    <div class="contBtns">
        <button type="submit" class="gButton">Guardar y continuar / Save and continue</button>
    </div>
</form>