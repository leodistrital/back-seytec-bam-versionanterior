<div>
    <!--Form 1-->
    <form id="formregistro" method="POST" enctype="multipart/form-data">
        <div class="sectExtraInt bg2">
            <div class="maxW">
                <section id="mainForm" class="contForm">
                    <div class="gCenter">
                        <div class="titleForm">
                            <h2>Su cuenta<em> / Your account</em></h2>
                        </div>
                        <fieldset>
                            <div class="gCol col2">
                                <div>
                                    <p>
                                        <label class="gLabel required">
                                            <span class="label"><strong>Nombres<em> / Name</em></strong></span>
                                            <input type="text" name="nombre" id="nombre">
                                        </label>
                                    </p>
                                </div>
                                <div>
                                    <p>
                                        <label class="gLabel required">
                                            <span class="label"><strong>Apellidos<em> / Last
                                                        name</em></strong></span>
                                            <input type="text" name="apellido" id="apellido">
                                        </label>
                                    </p>
                                </div>
                            </div>

                            <div class="gCol col2">
                                <div>
                                    <p>
                                        <label class="gLabel required">
                                            <span class="label"><strong>Correo<em> / E-mail</em></strong></span>
                                            <input type="text" name="email" id="email">
                                        </label>
                                    </p>
                                </div>
                                <div>
                                    <p>
                                        <label class="gLabel required">
                                            <span class="label"><strong>Confirmación de correo<em> / E-mail
                                                        confirmation</em></strong></span>
                                            <input type="text" name="emailconfirm" id="emailconfirm">
                                        </label>
                                    </p>
                                </div>
                            </div>

                            <div class="gCol col2">
                                <div>
                                    <p>
                                        <label class="gLabel required">
                                            <span class="label"><strong>Contraseña<em> /
                                                        Password</em></strong></span>
                                            <input type="password" name="password" id="password">
                                        </label>
                                    </p>
                                </div>
                                <div>
                                    <p>
                                        <label class="gLabel required">
                                            <span class="label"><strong>Confirmación de contraseña<em> /
                                                        Password confirmation</em></strong></span>
                                            <input type="password" name="passwordconfirm" id="passwordconfirm">
                                        </label>
                                    </p>
                                </div>
                            </div>
                            <div class="gCol">
                                <div>
                                    <p>
                                        <label class="gCR">
                                            He leído y acepto las <a
                                                href="https://bogotamarket.com/docs/T&C_BAM_2023.pdf"
                                                target="_blank">Condiciones Generales</a> y la
                                            <a href="https://bogotamarket.com/docs/Aviso_privacidad_BAM.pdf"
                                                target="_blank">normativa sobre protección de datos</a>. Confirmo que
                                            tengo al menos 18
                                            años.

                                            </br> <em> I have read and accept the <a
                                                    href="https://bogotamarket.com/docs/T&C_BAM_2023.pdf"
                                                    target="_blank">General Terms and Conditions</a> and
                                                the <a href="https://bogotamarket.com/docs/Aviso_privacidad_BAM.pdf"
                                                    target="_blank">data protection regulations</a>. I confirm that I am
                                                at least 18
                                                years old.</em>
                                            <input type="checkbox" name="acepto" id="acepto" value="1">
                                            <span class="icoC"></span>
                                        </label>
                                    </p>
                                </div>
                                <div>
                                </div>
                            </div>
                            </br>
                        </fieldset>
                    </div>
                </section>
            </div>
        </div>
        <div class="contBtns">
            <input type="tex" style=" display: none; " id="recapcha-response" name="recapcha-response">
            <button type=" submit" class="gButton">Guardar y continuar / Save and continue </button>
        </div>
    </form>
</div>