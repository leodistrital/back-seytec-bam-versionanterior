<?php

namespace App\Controllers\web;

use App\Controllers\MyApiRest;
use App\Models\CodigosacreditacionApiModel;
use App\Models\ParametrosApiModel;
use App\Models\web\Acr_registoWebModel;
use App\Models\web\ContenidosWebModel;
// use CodeIgniter\Session\Session;
// use Sendinblue\Mailin;


class Panel extends  MyApiRest
{
    protected $format    = 'json';
    protected $extension = array('pdf', 'jpeg', 'png', 'jpg', '');

    public function index()
    {
        $seccion = 'panelusuario';
        $activarpago = false;
        $veracreditacion = true;

        $iduser = $this->session->get('id');
        $tokenconfirmation = $this->generarToken($iduser);  //genera token para pago
        $usuarios = new Acr_registoWebModel();
        $array = ['finacreditacion', 'val_tar', 'usu_reg', 'tok_reg', 'descuento'];
        $datauser = $usuarios->select($array)->join('tarifasacreditacion', 'valorasi=cod_tar', 'left')->where('usu_reg', $iduser)->find();

        // print_r($datauser);
        //  echo $datauser[0]['finacreditacion'];

        if ($datauser[0]['finacreditacion'] == 2) {
            $activarpago = true;
            $veracreditacion = false;
            $seccion = 'panelusuariofin';
        }

        if ($datauser[0]['finacreditacion'] == 3 || $datauser[0]['finacreditacion'] == 10) {
            $activarpago = false;
            $veracreditacion = true;
            $seccion = 'panelusuariopago';
        }

        if ($datauser[0]['finacreditacion'] == 0) {
            $seccion = 'acreditacion';
            $seccion = 'panelusuario';
        }


        $contenido = new ContenidosWebModel();
        $array = ['slu_con as slug', 'img_con as fondo', 'tit_con_esp as titulo', 'des_con_esp as descripcion'];
        $data = $contenido->select($array)->where('slu_con', $seccion)->find();

        $random  = rand(100, 999);




        return view('panelcuenta', ['contenido' => $data[0], 'seccion' => $seccion, 'finacreditacion' => $datauser[0]['finacreditacion'], 'activarpago' => $activarpago, 'veracreditacion' => $veracreditacion, 'random' => $random, 'datauserpago' => $datauser[0]]);
        // return '';
    }

    public function editarregistro()
    {
        $seccion = 'registro';
        $contenido = new ContenidosWebModel();
        $array = ['slu_con as slug', 'img_con as fondo', 'tit_con_esp as titulo', 'des_con_esp as descripcion' ];
        $data = $contenido->select($array)->where('slu_con', $seccion)->find();

        $iduser = $this->session->get('id');
        $usuarios = new Acr_registoWebModel();
        $array = ['nom_reg', 'ape_reg'];
        $datauser = $usuarios->select($array)->where('usu_reg', $iduser)->find();


        // print_r($data[0]);$session = session();
        return view('panelcuenta', ['contenido' => $data[0], 'seccion' => $seccion,  'datauser' => $datauser[0] ,'finacreditacion' =>'' ]);
        // return '';
    }

    public function formacreditacion($paso)
    {
        // echo $paso;
        $iduser = $this->session->get('id');
        $usuarios = new Acr_registoWebModel();
        // $array = ['finacreditacion'];
        $datauser = $usuarios->select()->where('usu_reg', $iduser)->find();
        if ($datauser[0]['finacreditacion'] == 1) {
            return redirect()->to('/panel');
        }

        $recursos = [];
        if ($paso == 1) {
            $recursos = ['paises' => $this->getParametro('paises')];
        }
        if ($paso == 2) {
            $recursos = ['paises' => $this->getParametro('paises'), 'ciudades' => $this->getParametro('ciudades'), 'indicativo' => $this->getParametro('indicativo')];
        }
        if ($paso == 3) {
            $recursos = ['paises' => $this->getParametro('paises'), 'indicativo' => $this->getParametro('indicativo')];
            // echo $datauser[0]['formPart'];
            if ($datauser[0]['formPart'] === '2') {
                return redirect()->to('/panel/acreditacion/4');
                // echo 'sale';
            }
        }


        $seccion = 'acreditacion';
        $contenido = new ContenidosWebModel();
        $array = ['slu_con as slug', 'img_con as fondo', 'tit_con_esp as titulo', 'des_con_esp as descripcion'];
        $data = $contenido->select($array)->where('slu_con', $seccion)->find();
        // print_r($datauser[0]);
        return view('panelcuenta', ['contenido' => $data[0], 'seccion' => $seccion, 'finacreditacion' => $datauser[0]['finacreditacion'] , 'paso' => $paso, 'recursos' => $recursos, 'datauser' => $datauser[0]]);
        // return '';
    }

    public function getParametro($tipoparametro)
    {
        $parametro = new ParametrosApiModel();
        $array = ['val_op_para as valor', 'nom_op_para as dato'];
        $data = $parametro->select($array)->where('nom_para', $tipoparametro)->orderby('ord_para')->find();
        return $data;
    }


    public function buscarUsuario()
    {
        $iduser = $this->session->get('id');
        $usuarios = new Acr_registoWebModel();
        $array = ['cod_reg'];
        $datauser = $usuarios->select($array)->where('usu_reg', $iduser)->find();
        return $datauser[0]['cod_reg'];
    }


    public function guardarformacreditacion($paso)
    {
        $usuarios = new Acr_registoWebModel();
        // echo "llegaron los datos=" . $paso;
        $request = $this->request;
        $iduser = $this->buscarUsuario();
        if ($paso == 1) {
            $data = [
                'cod_reg' => $iduser,
                'formPart' => $request->getVar('formPart'),
                'nombre' => $request->getVar('nombre'),
                'apellido' => $request->getVar('apellido'),
                'tipodocumento' => $request->getVar('tipodocumento'),
                'numdocumento' => $request->getVar('numdocumento'),
                'paisresidencia' => $request->getVar('paisresidencia'),
                'ciudadresidencia' => $request->getVar('ciudadresidencia'),
                'dirresidencia' => $request->getVar('dirresidencia'),
                'nacionalidad' => $request->getVar('nacionalidad'),
                'localidad' => $request->getVar('localidad'),
                'estrato' => $request->getVar('estrato'),
                'sexo' => $request->getVar('sexo'),
                'identidad' => $request->getVar('identidad'),
                'nacimientofecha' => $request->getVar('nacimientofecha'),
                'grupoetnia' => $request->getVar('grupoetnia'),
                'divpaso1' => 1
            ];
        }


        if ($paso == 2) {
            $data = [
                'cod_reg' => $iduser,
                'indicativo' => $request->getVar('indicativo'),
                'telefono' => $request->getVar('telefono'),
                'mailcontacto' => $request->getVar('mailcontacto'),
                'confMail' => $request->getVar('confMail'),
                'idioma' => $request->getVar('idioma'),
                'partifiporegiones' => $request->getVar('partifiporegiones'),
                'ciudadparticipo' => $request->getVar('ciudadparticipo'),
                'indicativopublicacion' => $request->getVar('indicativopublicacion'),
                'telefonopublicacion' => $request->getVar('telefonopublicacion'),
                'correopublicacion' => $request->getVar('correopublicacion'),
                'sectoractividad' => $request->getVar('sectoractividad'),
                'intereses' => implode("**", $request->getVar('intereses[]')),
                'otrointeres' => $request->getVar('otrointeres'),
                'territorio' => implode("**", $request->getVar('territorio[]')),
                'mencionepaises' => $request->getVar('mencionepaises'),
                'perfilinteres' => $request->getVar('perfilinteres'),
                'divpaso2' => 1
            ];
        }

        if ($paso == 3) {
            $data = [
                'cod_reg' => $iduser,
                'nombreempresa' => $request->getVar('nombreempresa'),
                'nit' => $request->getVar('nit'),
                'cargoempresa' => $request->getVar('cargoempresa'),
                'direccionempresa' => $request->getVar('direccionempresa'),
                'indicativoempresa' => $request->getVar('indicativoempresa'),
                'telefonoempresa' => $request->getVar('telefonoempresa'),
                'correoempresa' => $request->getVar('correoempresa'),
                'paisempresa' => $request->getVar('paisempresa'),
                'ciudadempresa' => $request->getVar('ciudadempresa'),
                'actividad' => implode("**", $request->getVar('actividad')),
                'otraactividad' => $request->getVar('otraactividad'),
                'webempresa' => $request->getVar('webempresa'),
                'divpaso3' => 1
            ];
        }





        if ($paso == 4) {

            $ruta = '/acreditaciones/docs';
            $fotoacreditacion = $this->uploadfile($ruta, 'fotoacreditacion');
            $certificadovinculo = $this->uploadfile($ruta, 'certificadovinculo');
            $certificadoexistencia = $this->uploadfile($ruta, 'certificadoexistencia');

            $data = [
                'cod_reg' => $iduser,
                'fotoacreditacion' => $fotoacreditacion,
                'certificadovinculo' => $certificadovinculo,
                'certificadoexistencia' => $certificadoexistencia,
                'divpaso4' => 1
            ];
        }

        if ($paso == 5) {
            $data = [
                'cod_reg' => $iduser,
                'finacreditacion' => $request->getVar('acepto'),
            ];

            $this->session->set('acrstatus', 1);
            $opt = [];

            $usuarios = new Acr_registoWebModel();
            $array = ['mai_reg', 'ape_reg', 'nom_reg'];
            $datauser = $usuarios->select($array)->where('usu_reg', $this->session->get('id'))->find();

            //    print_r($datauser[0]);
            $this->sendinblueenvio($datauser[0]['mai_reg'], $datauser[0]['nom_reg'] . ' ' . $datauser[0]['ape_reg'], 'recibodaacreditacion', $opt);
        }

        $confirmacion = $usuarios->save($data);
        // echo $usuarios->getLastQuery();
        // exit;


        return $this->genericResponse($confirmacion, 200, $msj = '');
    }


    public function uploadfile($ruta = '', $nombrecampo = '')
    {
        $path = $ruta;
        $img = $this->request->getFile($nombrecampo);

        if ($img) {
            $newname = $img->getRandomName();
            if ($img->move('.' . $path, $newname)) {
                $data['resp'] = [
                    'file' => getenv('urlProduccion') . $path . "/" . $newname,
                    'status' => 200
                ];
                return getenv('urlProduccion') . $path . "/" . $newname;
            }
        }
    }


    public function sendinblueenvio($correo, $nombre, $operacion, $opt = '')
    {
        if ($operacion == 'recibodaacreditacion') {
            $toName = $nombre;
            $toEmail = $correo;
            $subject = 'Confirmación solicitud de acreditación BAM 2023 / Confirmation of accreditation application BAM 2023';
        }

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
        // var_dump($result);
        curl_close($ch);
        return true;
    }


    public function mensaje($operacion, $opt = '')
    {

        //    print_r($opt);


        if ($operacion == 'recibodaacreditacion') {


            $html =  '<html>
                <head>
                <meta charset="utf-8">
                </head>
                <body style="background: #cccccc; font-family: "Trebuchet MS", Arial, Helvetica, sans-serif; font-size: 12px; line-height: 20px; color: #333333;">
                <table width="800" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
                <!-- Header -->
                <tr>
                    <td>
                    <img src="https://bogotamarket.com/images/emails/cabezote_6.jpg" alt="Header" width="800" usemap="#MapHeader" style="display: block; margin: 0px; border: none;">
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
                                Confirmación solicitud de acreditación BAM 2023<em><br>Confirmation of accreditation application BAM 2023</em>
                                </strong>
                                </h3>
                                <p style="margin: 0px; letter-spacing: 1px; font-size: 18px; line-height: 30px;">Gracias. El equipo BAM ha recibido su solicitud de acreditación y la tramitará lo antes posible. Le agredecemos por su paciencia, el tiempo de aprobación podrá tardar hasta 5 días hábiles. Le comunicaremos por correo electrónico si su solicitud ha sido aceptada. La tarifa Early Bird se determina en función de la fecha de envío de la solicitud (antes del 15 de junio) y sólo es válida si se efectúa el pago antes del 23 de junio.<br><br>
                                Cuando y en el caso que su solicitud sea aceptada, podrá proceder al pago de la tarifa de acreditación en nuestra plataforma.
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
                                <p style="margin: 0px; letter-spacing: 1px; font-size: 18px; line-height: 30px;">Thank you. The BAM team has received your application for accreditation and will process it as soon as possible. We kindly ask for your patience, processing time may take up to 5 business days. We will inform you by e-mail whether your application has been accpeted. The early bird rate is determinded by the date the application is sent (before june 15) and is only valid if paid by June 23.<br><br> 
                                If and when your aplication is accepted, you will then be able to proceed with the payment of your accreditation fee.
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


    public function pagos($iduser, $tokenpago)
    {
        $usuarios = new Acr_registoWebModel();
        // echo $iduser.' - '.$tokenpago.' - '. $this->request->getVar('id'); 
        $data = [
            'wompi' => $this->request->getVar('id'),
            'finacreditacion' => 3,
        ];
        $datawhere = [
            'tok_reg' => $tokenpago,
            'usu_reg' => $iduser,
            'act_req' =>1
        ];
        $confirmacion = $usuarios->set($data)->where($datawhere)->update();
        return redirect()->to('/panel');
    }




    public function generarToken($iduser)
    {
        helper('text');
        $usuarios = new Acr_registoWebModel();
        $data = [
            'tok_reg' => random_string('numeric', 6)
        ];
        // print_r($data);
        return $confirmacion = $usuarios->set($data)->where('usu_reg', $iduser)->update();
    }

    public function descuento()
    {
        // echo "leo";
        return view('acreditaciones/formularios/descueto');
    }


    public function aplicardescuento()
    {
        $codigos = new CodigosacreditacionApiModel();
        $request = $this->request;
        $dato = $request->getVar('coddescuento');
        $rraywhere = ['sec_coa' => $dato, 'fin_coa' => '0'];
        $arrayselec = ['cod_coa', 'cod_ali_coa', 'nom_alc', 'tar_alc', 'val_tar'];
        $codigo = $codigos->select($arrayselec)->join('aliadosacreditacion', 'cod_ali_coa = cod_alc', 'left')->join('tarifasacreditacion', 'cod_tar = tar_alc', 'left')->where($rraywhere)->find();
        // echo $codigos->getLastQuery();
        // echo "----------------------------------------------------------------";
        // print_r($codigo);
        if (count($codigo) > 0) {
            // echo 'codigo valido: ' ;
            $usuarioconfirm = $this->aplicarCodigo($codigo[0]);
            // echo $codigo[0]['cod_coa'];
            $confirmacion = $codigos->set(['fin_coa' => 1])->where(['cod_coa' => $codigo[0]['cod_coa']])->update();
            $data = ['result' => 1];
            return $this->genericResponse($data, 200, $msj = '');
        } else {
            // echo 'codigo noooo valido: ' ;
            $data = ['result' => 0];
            return $this->genericResponse($data, 200, $msj = '');
        }
    }

    public function aplicarCodigo($codigo)
    {
        $usuarios = new Acr_registoWebModel();
        $iduser = $this->session->get('id');
        // print_r($codigo);

        if ($codigo['val_tar'] == 0) {
            // echo 'es gratis';
            $data = [
                'descuento' => $codigo['cod_coa'],
                'finacreditacion' => 3,
                'valorasi' => $codigo['tar_alc'],
            ];
        } else {
            // echo 'es pagagp';
            $data = [
                'finacreditacion' => 2,
                'descuento' => $codigo['cod_coa'],
                'valorasi' => $codigo['tar_alc'],
            ];
        }
        $datawhere = ['usu_reg' => $iduser];
        return $confirmacion = $usuarios->set($data)->where($datawhere)->update();
    }
}