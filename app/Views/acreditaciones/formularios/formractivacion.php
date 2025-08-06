<form id="formactivacion" method="POST" enctype="multipart/form-data">
    <div class="sectExtraInt  bg2">
        <div class="maxW">
            <section id="mainForm" class="contForm">
                <div class="gCenter">
                    <div class="titleForm">
                        <h2>Activación de su cuenta en BAM <em>/ BAM account activation</em></h2>
                        <p class="noteRequired">Este código es personal e intransferible, le recomendamos no
                            compartirlo. En el siguiente enlace puede continuar su proceso de registro</p>
                    </div>
                    <fieldset>
                        <div class="gCol col3">
                            <div></div>
                            <div>
                                <p>
                                    <label class="gLabel">
                                        <span class="label"><strong>Codigo de activación<em> / Activation
                                                    code</em></strong></span>
                                        <input type="text" name="codigoverifiicacion" id="codigoverifiicacion"
                                            style="text-align: center; font-size:2rem;">
                                        <input type="hidden" name="emailactivacion" id="emailactivacion"
                                            value="<?=$usuario?>">
                                    </label>
                                </p>
                            </div>
                            <div></div>
                        </div>
                    </fieldset>
                </div>
            </section>
        </div>
    </div>


    <div class="contBtns">
        <button type="submit" class="gButton">Enviar / Send</button>
    </div>
</form>