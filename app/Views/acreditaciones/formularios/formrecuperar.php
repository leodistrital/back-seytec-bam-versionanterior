<div>
    <?php  //print_r($datauser); 
    ?>
    <!--Form 1-->
    <form id="formrrecuperar" method="POST" enctype="multipart/form-data">
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
                        </fieldset>
                    </div>
                </section>
            </div>
        </div>
        <div class="contBtns">
            <input type="hidden" id="user" name="user" value="<?=$usuario?>">
            <input type="tex" style=" display: none; " id="recapcha-response" name="recapcha-response">
            <button type=" submit" class="gButton">Guardar y continuar / Save and continue</button>
        </div>
    </form>
</div>