<!--Contenedor principal-->
<div id="mainWrapper">
    <?php
    echo $this->include('components/menugeneral/menulogin');
    ?>
    <!--Contenido general-->
    <div class="gContPage">
        <div class="maxW">
            <div class="rdiv contWhite">
                <!--Interna -->
                <div class="gIntern sFive">
                    <div class="content_intro">
                        <div class="fondoLogin">
                            <div class="bvLogin">
                                Nuevo usuario
                                <div class="marcaLogin">RENAULTV</div>
                                <div class="textoIntro">
                                    <p>Ingrese a continuación los datos solicitados para realizar la validación y
                                        creación de su usuario para Renault D-Net.</p>
                                    <p>* Todos los campos son obligatorios.</p>
                                </div>
                                <form class="formLogin-container" action="registro" method="post"
                                    onsubmit="return sendForm(this);">
                                    <input type="hidden" name="mode" value="register">
                                    <input type="hidden" name="overwrite" value="0">
                                    <div class="formLogin-field">
                                        <label class="labelLogin">* Nombre completo</label><br>
                                        <input type="text" placeholder="" name="nombre" required="">
                                    </div><br>
                                    <div class="formLogin-field">
                                        <label class="labelLogin">* Seleccione su Concesionario</label><br>
                                        <select type="select" placeholder="" name="id_concesionario" required="">
                                            <option value=""></option>
                                            <?php foreach ($listaconcesionarios as $concesionario): ?>
                                            <option value="<?=$concesionario['id']?>">
                                                <?=$concesionario['concesionario']?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div><br>
                                    <div class="formLogin-field">
                                        <label class="labelLogin">* Cargo</label><br>
                                        <input type="text" placeholder="" name="cargo" required="">
                                    </div><br>
                                    <div class="formLogin-field">
                                        <label class="labelLogin">* Ingrese su documento sin puntos ni
                                            espacios</label><br>
                                        <input type="text" placeholder="" name="identificacion" required="">
                                    </div><br>
                                    <div class="formLogin-field">
                                        <label class="labelLogin">* Correo electrónico</label><br>
                                        <input type="email" placeholder="" name="email" required="">
                                    </div><br>
                                    <div class="formLogin-field">
                                        <label class="labelLogin">* Confirmar correo electrónico</label><br>
                                        <input type="email" placeholder="" name="email2" required="">
                                    </div>
                                    <button id="btnenviar" type="submit" class="btn"> Enviar datos</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End componente Videos -->
            </div>
            <!--Fin Interna-->
        </div>
        <!--Fin Contenido general-->
    </div>
    <!--Fin Contenedor principal-->