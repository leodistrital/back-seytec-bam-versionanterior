<?php

namespace App\Controllers\API;

use App\Models\Acr_registoApiModel;
use CodeIgniter\RESTful\ResourceController;

class Acr_registo extends ResourceController
{
    protected $format    = 'json';

    public function __construct()
    {
        $this->modelName = new Acr_registoApiModel();
    }

    public function index()
    {

        $data = $this->model->listatardatos();
        return $this->respond($data, 200);
    }

    public function show($id = null)
    {
        $data = $this->model->listatardatos($id);
        return $this->respond(array('data' => $data), 200);
    }

    public function create()
    {
        $resp = $this->model->guardar($this->request);
        $info = $this->model->listatardatos($resp);
        $data['resp'] = [
            'codigo' => $resp,
            'status' => 'Ok',
            'info' => $info
        ];
        return $this->respond($data, 200);
    }

    public function update($id = null)
    {
        $resp = $this->model->edicion($id, $this->request);

        // print_r($resp);
        $this->verificarCambioEstado($resp);

        return $this->respond($resp, 200);
    }

    public function delete($id = null)
    {
        $resp = $this->model->borrar($id);
        $data['resp'] = [
            'codigo' => $resp,
            'status' => 'Ok'
        ];
        return $this->respond($data, 200);
    }

    public function verificarCambioEstado($iduser)
    {

        $opt = [];
        $arraySelect = ['finacreditacion', 'mai_reg', 'nom_reg',  'ape_reg'];
        $datauser = $this->model->select($arraySelect)->where('cod_reg', $iduser)->find();
        // print_r($datauser);
        $opt['nombre'] =$datauser[0]['nom_reg'];
        $this->sendinblueenvio($datauser[0]['mai_reg'], $datauser[0]['nom_reg'] . ' ' . $datauser[0]['ape_reg'], $datauser[0]['finacreditacion'], $opt);
    }


    public function sendinblueenvio($correo, $nombre, $operacion, $opt = '')
    {
        $envio = false;

        if ($operacion == '2') { //aprobado
            $toName = $nombre;
            $toEmail = $correo;
            $subject = 'Confirmación Acreditación BAM 2023 / Accreditation confirmation BAM 2023';
            $envio = true;
        }

        if ($operacion == '4') { //rechazado
            $toName = $nombre;
            $toEmail = $correo;
            $subject = 'Acreditación no aprobada BAM 2023 / Accreditation not approved BAM 2023';
            $envio = true;
        }

        if ($operacion == '10') { //aprobado sin pago
            $toName = $nombre;
            $toEmail = $correo;
            $subject = 'Confirmación Acreditación BAM 2023 / Accreditation confirmation BAM 2023';
            $envio = true;
        }

        if ($envio == true) {
            // echo $operacion;
            $toName = $toName;
            $toEmail = $toEmail;
            $fromName = 'BAM';
            $fromEmail = 'no-reply@bogotamarket.com';
            $subject = $subject;
            $htmlMessage = $this->mensaje($operacion, $opt);
            $data = array(
                "sender" => array(
                    "email" => $fromEmail,
                    "name" => $fromName
                ),
                "to" => array(
                    array(
                        "email" => $toEmail,
                        "name" => $toName
                    )
                ),
                "subject" => $subject,
                "htmlContent" =>  $htmlMessage
            );

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'https://api.sendinblue.com/v3/smtp/email');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
            $headers = array();
            $headers[] = 'Accept: application/json';
            $headers[] = 'Api-Key: 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';
            $headers[] = 'Content-Type: application/json';
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            $result = curl_exec($ch);
            var_dump($result);
            curl_close($ch);
        }
        return true;
    }



    public function mensaje($operacion, $opt = '')
    {
        //    print_r($opt);
        if ($operacion == '2') { //aprobado
            $nombre =$opt['nombre'];
            $html =  '<html>
   <head>
      <meta charset="utf-8">
   </head>
   <body style="background: #cccccc; font-family: "Trebuchet MS", Arial, Helvetica, sans-serif; font-size: 12px; line-height: 20px; color: #333333;">
   <table width="800" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
      <!-- Header -->
      <tr>
         <td>
            <img src="https://bogotamarket.com/images/emails/cabezote_3.jpg" alt="Header" width="800" usemap="#MapHeader" style="display: block; margin: 0px; border: none;">
         </td>
         <map name="MapHeader" id="MapHeader">
            <area shape="rect" coords="29,29,182,112" href="https://bogotamarket.com/" target="_blank" alt="Bogota Market">
            <area shape="circle" coords="671,71,12" href="https://www.facebook.com/BAMBogotaAudiovisualMarket" target="_blank" alt="Facebook">
            <area shape="circle" coords="700,71,12" href="https://twitter.com/BAM_Bogota" target="_blank" alt="Twitter">
            <area shape="circle" coords="729,71,12" href="https://www.instagram.com/bam_bogota/" target="_blank" alt="Instagram">
            <area shape="circle" coords="758,71,12" href="https://www.youtube.com/@BAMBogota" target="_blank" alt="Youtube">
         </map>
      </tr>
      <!-- End Header -->
      <!-- Content -->
      <tr>
         <td>
            <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
               <tr height="50"></tr>
               <tr>
                  <td width="80"></td>
                  <td>
                     <h3 style="margin: 20px 0px 20px; font-size: 22px; line-height: 26px; letter-spacing: 1px; color: #6f6db5;">
                        Confirmación Acreditación BAM 2023<em><br>Accreditation confirmation BAM 2023</em>
                        </strong>
                     </h3>
                     <p style="margin: 0px; letter-spacing: 1px; font-size: 18px; line-height: 30px;">Saludos, '.$nombre.'<br><br> 
                        Luego de revisar cuidadosamente su solicitud de acreditación al BAM 2023, nos complace comunicarle que ha sido aprobada y será muy grato contar con usted en esta decimocuarta edición del Bogotá Audiovisual Market.<br><br>
                        1. Proceder al pago de su acreditación a través de este link: <a href="bogotamarket.com" >bogotamarket.com</a> <br>
                        2. Enviar copia  del RUT actualizado para la vigencia 2022/2023 a registration@bogotamarket.com<br>
                        3. Enviar copia de pago de la transacción realizada a registration@bogotamarket.com<br><br>
                        Tenga un cuenta que sin el cumplimiento de estos dos requisitos, no será posible asegurar su acreditación al mercado. 
                     </p>
                     <h4>
                        <p style="margin: 80px 0px 0px; letter-spacing: 1px; font-size: 16px;">Atentamente, <br />Equipo BAM </p>
                     </h4>
                  </td>
                  <td width="80">
                  </td>
               </tr>
               <tr height="50"></tr>
            </table>
         </td>
      </tr>
      <tr>
         <td>
            <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
               <tr height="50"></tr>
               <tr>
                  <td width="80"></td>
                  <td>
                     -------------------
                     <br>
                     <br>
                     <p style="margin: 0px; letter-spacing: 1px; font-size: 18px; line-height: 30px;">Greetings, '.$nombre.'<br>
                        <br> 
                        After carefully reviewing your application for accreditation to BAM 2023, we are pleased to inform you that it has been approved and it will be a pleasure to have you in this fourteenth edition of the Bogota Audiovisual Market.<br><br>
                        To finalize the process, we ask you to comply with the following requirements: <br>
                        If you are a foreign company: <br>
                        1. Proceed to the payment of your accreditation through this link: <a href="bogotamarket.com" >bogotamarket.com</a> <br>
                        2. Please send the certificate of legal existence of your country.<br>
                        3. Send a copy of the approved transaction to registration@bogotamarket.com.<br>
                        <br>
                        If you are a foreign professional:  <br>
                        1. Proceed to the payment of your accreditation through this link: (LINK that redirects the user to the BAM page).  <br>
                        2. Please send a copy of your passport. <br>
                        3. Send a copy of the approved transaction to registration@bogotamarket.com.<br>
                        <br>
                        Please note that without the fulfillment of these two requirements, it will not be possible to ensure your accreditation to the market.
                        <br><br>
                     </p>
                     <h4>
                        <p style="margin: 80px 0px 0px; letter-spacing: 1px; font-size: 16px;">Sincerely yours, <br />BAM Team</p>
                     </h4>
                  </td>
                  <td width="80"></td>
               </tr>
               <tr height="50"></tr>
            </table>
         </td>
      </tr>
      <!-- End Content -->
      <!-- Footer -->
      <tr>
         <td>
            <img src="https://bogotamarket.com/images/emails/footer.jpg" alt="Footer" width="800" height="200" border="0" usemap="#MapFooter" style="display: block; margin: 0px; border: none;">
            <map name="MapFooter" id="MapFooter">
               <area shape="circle" coords="78,93,45" href="https://www.facebook.com/BAMBogotaAudiovisualMarket" target="_blank" alt="Facebook">
               <area shape="rect" coords="505,1,648,55" href="https://www.proimagenescolombia.com/" target="_blank" alt="Proimágenes Colombia">
               <area shape="rect" coords="644,1,750,55" href="https://www.ccb.org.co/" target="_blank" alt="Cámara de Comercio de Bogotá">
            </map>
         </td>
      </tr>
      <!-- End Footer -->
   </table>
   </body>
</html>';
        }


        if ($operacion == '4') { //rechazado
            $html =  '<html>
                        <head>
                            <meta charset="utf-8">
                        </head>
                        <body style="background: #cccccc; font-family: "Trebuchet MS", Arial, Helvetica, sans-serif; font-size: 12px; line-height: 20px; color: #333333;">
                        <table width="800" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
                            <!-- Header -->
                            <tr>
                                <td>
                                    <img src="https://bogotamarket.com/images/emails/cabezote_1.jpg" alt="Header" width="800" usemap="#MapHeader" style="display: block; margin: 0px; border: none;">
                                </td>
                                <map name="MapHeader" id="MapHeader">
                                    <area shape="rect" coords="29,29,182,112" href="https://bogotamarket.com/" target="_blank" alt="Bogota Market">
                                    <area shape="circle" coords="671,71,12" href="https://www.facebook.com/BAMBogotaAudiovisualMarket" target="_blank" alt="Facebook">
                                    <area shape="circle" coords="700,71,12" href="https://twitter.com/BAM_Bogota" target="_blank" alt="Twitter">
                                    <area shape="circle" coords="729,71,12" href="https://www.instagram.com/bam_bogota/" target="_blank" alt="Instagram">
                                    <area shape="circle" coords="758,71,12" href="https://www.youtube.com/@BAMBogota" target="_blank" alt="Youtube">
                                </map>
                            </tr>
                            <!-- End Header -->
                            <!-- Content -->
                            <tr>
                                <td>
                                    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                    <tr height="50"></tr>
                                    <tr>
                                        <td width="80"></td>
                                        <td>
                                            <h3 style="margin: 20px 0px 20px; font-size: 22px; line-height: 26px; letter-spacing: 1px; color: #6f6db5;">
                                                Acreditación no aprobada BAM 2023	<em><br>Accreditation not approved BAM 2023</em>
                                                </strong>
                                            </h3>
                                            <p style="margin: 0px; letter-spacing: 1px; font-size: 18px; line-height: 30px;">Saludos,<br><br> 
                                                Luego de revisar cuidadosamente su solicitud de acreditación debemos informarle que no fue aprobada teniendo en cuenta que no cumplió con el 100% de los requisitos. Si desea más información sobre las razones de la no aprobación de su acreditación, puede escribirnos al correo registration@bogotamarket.com.<br><br>
                                                De igual manera, queremos extenderle la invitación a participar en nuestras charlas abiertas al público general que podrá consultar en la página web www.bogotamarket.com<br><br>                                            
                                            </p>
                                            <h4>
                                                <p style="margin: 80px 0px 0px; letter-spacing: 1px; font-size: 16px;">Atentamente, <br />Equipo BAM </p>
                                            </h4>
                                        </td>
                                        <td width="80">
                                        </td>
                                    </tr>
                                    <tr height="50"></tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                    <tr height="50"></tr>
                                    <tr>
                                        <td width="80"></td>
                                        <td>
                                            -------------------
                                            <br>
                                            <br>
                                            <br>
                                            <p style="margin: 0px; letter-spacing: 1px; font-size: 18px; line-height: 30px;">Greetings, <br><br>
                                                After carefully reviewing your application for accreditation we must inform you that it was not approved due to the fact that you did not meet 100% of the requirements. If you would like to know more about the reasons for the non-approval, please write to us at registration@bogotamarket.com. <br><br>
                                                Likewise, we would like to extend an invitation to participate in our lectures, which are open to the general public and can be consulted on the web page www.bogotamarket.com.<br><br>					
                                            </p>
                                            <h4>
                                                <p style="margin: 80px 0px 0px; letter-spacing: 1px; font-size: 16px;">Sincerely yours, <br />BAM Team</p>
                                            </h4>
                                        </td>
                                        <td width="80"></td>
                                    </tr>
                                    <tr height="50"></tr>
                                    </table>
                                </td>
                            </tr>
                            <!-- End Content -->
                            <!-- Footer -->
                            <tr>
                                <td>
                                    <img src="https://bogotamarket.com/images/emails/footer.jpg" alt="Footer" width="800" height="200" border="0" usemap="#MapFooter" style="display: block; margin: 0px; border: none;">
                                    <map name="MapFooter" id="MapFooter">
                                    <area shape="circle" coords="78,93,45" href="https://www.facebook.com/BAMBogotaAudiovisualMarket" target="_blank" alt="Facebook">
                                    <area shape="rect" coords="505,1,648,55" href="https://www.proimagenescolombia.com/" target="_blank" alt="Proimágenes Colombia">
                                    <area shape="rect" coords="644,1,750,55" href="https://www.ccb.org.co/" target="_blank" alt="Cámara de Comercio de Bogotá">
                                    </map>
                                </td>
                            </tr>
                            <!-- End Footer -->
                        </table>
                    </body>
                </html>';
        }


        if ($operacion == '10') { //aprobado sin pago
            $html =  '<html>
                        <head>
                            <meta charset="utf-8">
                        </head>
                        <body style="background: #cccccc; font-family: "Trebuchet MS", Arial, Helvetica, sans-serif; font-size: 12px; line-height: 20px; color: #333333;">
                        <table width="800" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
                            <!-- Header -->
                            <tr>
                                <td>
                                    <img src="https://bogotamarket.com/images/emails/cabezote_3.jpg" alt="Header" width="800" usemap="#MapHeader" style="display: block; margin: 0px; border: none;">
                                </td>
                                <map name="MapHeader" id="MapHeader">
                                    <area shape="rect" coords="29,29,182,112" href="https://bogotamarket.com/" target="_blank" alt="Bogota Market">
                                    <area shape="circle" coords="671,71,12" href="https://www.facebook.com/BAMBogotaAudiovisualMarket" target="_blank" alt="Facebook">
                                    <area shape="circle" coords="700,71,12" href="https://twitter.com/BAM_Bogota" target="_blank" alt="Twitter">
                                    <area shape="circle" coords="729,71,12" href="https://www.instagram.com/bam_bogota/" target="_blank" alt="Instagram">
                                    <area shape="circle" coords="758,71,12" href="https://www.youtube.com/@BAMBogota" target="_blank" alt="Youtube">
                                </map>
                            </tr>
                            <!-- End Header -->
                            <!-- Content -->
                            <tr>
                                <td>
                                    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                    <tr height="50"></tr>
                                    <tr>
                                        <td width="80"></td>
                                        <td>
                                            <h3 style="margin: 20px 0px 20px; font-size: 22px; line-height: 26px; letter-spacing: 1px; color: #6f6db5;">
                                                Confirmación Acreditación BAM 2023
                                                <em><br>Accreditation confirmation BAM 2023</em>
                                                </strong>
                                            </h3>
                                            <p style="margin: 0px; letter-spacing: 1px; font-size: 18px; line-height: 30px;">Saludos,<br><br> 
                                                Luego de revisar cuidadosamente su solicitud de acreditación al BAM 2023, nos complace comunicarle que ha sido aprobada y será muy grato contar con usted en esta decimocuarta edición del Bogotá Audiovisual Market.<br>
                                                Puede ingresar a su cuenta BAM para disfrutar de todos nuestros servicios en linea. <br><br>
                                            </p>
                                            <h4>
                                                <p style="margin: 80px 0px 0px; letter-spacing: 1px; font-size: 16px;">Atentamente, <br />Equipo BAM </p>
                                            </h4>
                                        </td>
                                        <td width="80">
                                        </td>
                                    </tr>
                                    <tr height="50"></tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                    <tr height="50"></tr>
                                    <tr>
                                        <td width="80"></td>
                                        <td>
                                            -------------------
                                            <br>
                                            <br>
                                            <br>
                                            <p style="margin: 0px; letter-spacing: 1px; font-size: 18px; line-height: 30px;">Greetings, <br><br>
                                                After carefully reviewing your application for accreditation to BAM 2023, we are pleased to inform you that it has been approved and it will be a pleasure to have you in this fourteenth edition of the Bogota Audiovisual Market.<br>
                                                You can log in to your BAM account to enjoy all our online services. <br><br>
                                            </p>
                                            <h4>
                                                <p style="margin: 80px 0px 0px; letter-spacing: 1px; font-size: 16px;">Sincerely yours, <br />BAM Team</p>
                                            </h4>
                                        </td>
                                        <td width="80"></td>
                                    </tr>
                                    <tr height="50"></tr>
                                    </table>
                                </td>
                            </tr>
                            <!-- End Content -->
                            <!-- Footer -->
                            <tr>
                                <td>
                                    <img src="https://bogotamarket.com/images/emails/footer.jpg" alt="Footer" width="800" height="200" border="0" usemap="#MapFooter" style="display: block; margin: 0px; border: none;">
                                    <map name="MapFooter" id="MapFooter">
                                    <area shape="circle" coords="78,93,45" href="https://www.facebook.com/BAMBogotaAudiovisualMarket" target="_blank" alt="Facebook">
                                    <area shape="rect" coords="505,1,648,55" href="https://www.proimagenescolombia.com/" target="_blank" alt="Proimágenes Colombia">
                                    <area shape="rect" coords="644,1,750,55" href="https://www.ccb.org.co/" target="_blank" alt="Cámara de Comercio de Bogotá">
                                    </map>
                                </td>
                            </tr>
                            <!-- End Footer -->
                        </table>
                        </body>
                        </html>';
        }





        return $html;
    }
}
/* fecha de creacion: 05-22-2023 02:24:32 pm */