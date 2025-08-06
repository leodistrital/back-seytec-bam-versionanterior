<?php 

// print_r($datauser['formPart']);

// print_r($datauser);
?>

<form id="formpaso4" name="formpaso4" method="POST" enctype="multipart/form-data">
    <div class="sectExtraInt">
        <div class="maxW">
            <section id="mainForm" class="contForm">

                <div class="gCenter">
                    <div class="titleForm">
                        <h2>Documentos<em> / Documents</em></h2>
                        <p class="noteRequired">Esta información no será públicada y se utilizará únicamente con fines
                            relacionados con su acreditación al Mercado.
                            <br><br><em>This information will not be made public and will be used only for purposes
                                related to your accreditation to the market.</em>
                        </p>
                    </div>
                    <fieldset>
                        <div class="gCol col2">
                            <div>
                                <p>
                                    <label class="gLabel input required btnBAM">
                                        <span class="label static"><strong>Foto acreditación<em> / Profile picture for
                                                    accreditation</em></strong></span>
                                        <input type="file" name="fotoacreditacion" id="">
                                    </label>

                                </p>
                            </div>
                            <div>
                                <p>
                                    <span class="label">
                                        <strong>Por favor, suba una foto tipo documento en formato jpg o
                                            png.<br>Recuerde evitar gafas de sol, sombreros o cualquier elemento que
                                            dificulte su identificación.</strong>
                                        <br><em>Profile photo for accreditation. Please upload a document type photo, in
                                            jpg or png format. Remember to avoid
                                            sunglasses or hats that may hinder your identification.</em>
                                    </span>
                                </p>
                            </div>
                        </div>
                        <p></p>



                        <?php if($datauser['formPart']!=2){ ?>
                        <div class="gCol col2">
                            <div>
                                <p>
                                    <label class="gLabel input required">
                                        <span class="label static"><strong>Certificado que comprueba su vínculo con la
                                                empresa<em> / Certificate proving your affiliation with the
                                                    company</em></strong></span>
                                        <input type="file" name="certificadovinculo" id="certificadovinculo">
                                    </label>


                                </p>
                            </div>


                            <div>
                                <p>
                                    <span class="label">
                                        <strong>
                                            Certificado que comprueba su vinculo con la empresa</strong>
                                        <br><em> Certificate proving your affiliation with the company.</em>
                                    </span>
                                </p>
                            </div>
                        </div>
                        <p></p>
                        <?php } ?>


                        <?php if($datauser['formPart']!=2){ ?>
                        <div class="gCol col2">
                            <div>
                                <p>
                                    <label class="gLabel input required">
                                        <span class="label static"><strong>Certificado de existencia y representación
                                                legal<em> / Certificate of existence and legal
                                                    representation</em></strong></span>
                                        <input type="file" name="certificadoexistencia" id="certificadoexistencia">
                                    </label>

                                </p>
                            </div>
                            <div>
                                <p>
                                    <span class="label">
                                        <strong>Por favor adjunte el certificado de existencia y representación legal
                                            con una fecha no mayor a 60 días. Para el caso de empresas colombianas
                                            deberá contar con una existencia mínima legal de dos (2) años contados a
                                            partir de la fecha del inicio del Mercado.</strong>
                                        <br><em>Please attach the certificate of existence and legal representation with
                                            a date not older than 60 days. In the case of Colombian companies, they must
                                            have a minimum legal existence of two (2) years from the date of the start
                                            of the market.</em>
                                    </span>
                                </p>
                            </div>
                        </div>
                        <?php } ?>


                        <?php if($datauser['formPart']==2){ ?>
                        <div class="gCol col2">


                            <div>
                                <p>
                                    <label class="gLabel input required">
                                        <span class="label static"><strong>Certificado de experiencia
                                                <em> / Certificate of experience</em></strong></span>
                                        <input type="file" name="certificadoexistencia" id="certificadoexistencia">
                                    </label>

                                </p>
                            </div>
                            <div>
                                <p>
                                    <span class="label">
                                        <strong>Por favor, adjunte documentos, contratos, certificaciones, créditos,
                                            entre otros, que permitan verificar su experiencia profesional de acuerdo a
                                            su actividad en un proyecto u obra relacionada con la industria audiovisual
                                            y/o cultural que haya sido publicada, emitida, circulada y/o distribuida en
                                            medios y/o espacios comerciales Nota: La hoja de vida no certifica la
                                            experiencia.
                                        </strong>
                                        <br><em>Please attach documents, contracts, certifications, credits, among
                                            others, that allow verifying your professional experience according to your
                                            activity in a project or work related to the audiovisual and/or cultural
                                            industry that has been published, broadcasted, circulated and/or distributed
                                            in media and/or commercial spaces Note: The resume does not certify
                                            experience.</em>
                                    </span>
                                </p>
                            </div>
                        </div>
                        <?php } ?>




                    </fieldset>
                </div>
            </section>
        </div>
    </div>
    <div class="contBtns">
        <?php
         if ($datauser['formPart'] == '2' and $datauser['divpaso2'] == 1 ) { ?>
        <button type="submit" class="gButton">Save and continue / Guardar y continuar</button>
        <?php  }       ?>

        <?php
         if ($datauser['formPart'] != '2' and $datauser['divpaso3'] == 1 ) { ?>
        <button type="submit" class="gButton">Save and continue / Guardar y continuar</button>
        <?php  }       ?>


    </div>
</form>
</div>