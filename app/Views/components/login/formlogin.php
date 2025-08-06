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
                                Bienvenido
                                <div class="marcaLogin">RENAULTV</div>
                                <form class="formLogin-container" action="/" method="post"
                                    onSubmit="return sendLogin(this);">
                                    <div class="formLogin-field">
                                        <label class="labelLogin">Usuario</label><br>
                                        <input type="text" placeholder="" name="usuario"
                                            value="coorcallcenter@marcali.com">
                                    </div>
                                    <br>
                                    <div class="formLogin-field">
                                        <label class="labelLogin">Contraseña</label><br>
                                        <input type="password" placeholder="" name="password" value="coorcallcenter">
                                    </div>
                                    <button type="submit" class="btn">ingresar</button>
                                    <button type="button" class="boton_newUser"
                                        onclick="window.location.href='registro';">solicitar usuario</button>
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