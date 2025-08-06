<section class="gSection sTwo">
    <h2>Su formulario de solicitud ha sido enviada / <em>Your application form has been sent</em> </h2>
    <div class="gContent">
        <div class="gCol col2">
            <div>
                <p>Gracias. Al hacer clic en el botón FINALIZAR, su solicitud de acreditación será enviada y se
                    tramitará lo antes posible. Le agredecemos por su paciencia, el tiempo de aprobación podrá tardar
                    hasta 5 días hábiles. Le comunicaremos por correo electrónico si su solicitud ha sido aceptada. La
                    tarifa Early Bird se determina en función de la fecha de envío de la solicitud (antes del 15 de
                    junio) y sólo es válida si se efectúa el pago antes del 23 de junio.
                </p><br>
            </div>
            <div>
                <p><em>Thank you. By clicking the FINISH button, your accreditation request will be sent and processed
                        as soon as possible. We kindly ask for your patience, processing time may take up to 5 business
                        days. We will inform you by e-mail whether your application has been accpeted. The early bird
                        rate is determinded by the date the application is sent (before june 15) and is only valid if
                        paid by June 23.
                    </em></p><br>
            </div>
        </div>

    </div>
    <form id="formpaso5" name="formpaso5" method="POST" enctype="multipart/form-data">
        <div class="contBtns">

            <div class="gCol">
                <div>
                    <p>
                        <label class="gCR">
                            He leído y acepto las <a href="https://bogotamarket.com/docs/T&C_BAM_2023.pdf"
                                target="_blank">Condiciones Generales</a> y la
                            <a href="https://bogotamarket.com/docs/Aviso_privacidad_BAM.pdf" target="_blank">normativa
                                sobre protección de datos</a>. Confirmo que tengo al menos 18
                            años.

                            </br> <em> I have read and accept the <a
                                    href="https://bogotamarket.com/docs/T&C_BAM_2023.pdf" target="_blank">General Terms
                                    and Conditions</a> and
                                the <a href="https://bogotamarket.com/docs/Aviso_privacidad_BAM.pdf"
                                    target="_blank">data protection regulations</a>. I confirm that I am at least 18
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
            <?php if($datauser['divpaso4'] == 1) { ?>
            <button type="submit" class="gButton">Finalizar / finish</button>
            <?php }  ?>
        </div>
    </form>
</section>