<?php

namespace App\Controllers\web;

use App\Controllers\MyApiRest;
// use App\Libraries\Servicios;
use App\Models\web\Acr_registoWebModel;
use App\Models\web\ContenidosWebModel;
use Sendinblue\Mailin;



class Registro extends  MyApiRest
{
    protected $format    = 'json';
    protected $session = null;

    public function __construct()
    {
        $this->modelName = new Acr_registoWebModel();
        helper('text');
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        $seccion = 'registro';
        $contenido = new ContenidosWebModel();
        $array = ['slu_con as slug', 'img_con as fondo', 'tit_con_esp as titulo', 'des_con_esp as descripcion'];
        $data = $contenido->select($array)->where('slu_con', $seccion)->find();
        // print_r($data[0]);
        return view('registro', ['contenido' => $data[0], 'seccion' => $seccion]);
        // return '';
    }

    public function crearRegistro()
    {
        // echo 'llego el post';
        $guardado  = $this->guardarRegistro($this->request);
        if ($guardado['error'] == 0) {
            $this->emailCreacioncuenta($guardado['correo']);
        }
        return $this->genericResponse($guardado, 200, $msj = '');
    }



    public function emailCreacioncuenta($correo)
    {
        // echo $correo;
        $direrepass = $correo;
        $registros = new Acr_registoWebModel();
        $array = ['mai_reg', 'nom_reg', 'ape_reg', 'tok_reg', 'usu_reg'];
        $wherearray = ['usu_reg' => $direrepass, 'act_req' => 0];
        $data = $registros->select($array)->where($wherearray)->find();
        $opt = ['codigoactivacion' => $data[0]['tok_reg'], 'linkactivacion' => getenv('urlProduccion') . '/registro/activacion/' . $data[0]['usu_reg']];
        // echo $registros->getLastQuery();
        if (count($data) > 0) {
            $this->sendinblueenvio($data[0]['mai_reg'], $data[0]['nom_reg'] . ' ' . $data[0]['ape_reg'], 'envio-token', $opt);
        }

        return true;
    }



    public function testenvio()
    {

        $toName = 'Mario Forero';
        $toEmail = 'marioforero@mottif.com';
        $fromName = 'BAM';
        $fromEmail = 'no-reply@bogotamarket.com';
        $subject = 'Activacion de cuenta';
        $htmlMessage = '<p>Hello ' . $toName . ',</p><p>This is my first transactional email sent from Sendinblue.</p>';
        // $htmlMessage = $this->mensaje();

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
            "htmlContent" => '<html><head></head><body><p>' . $htmlMessage . '</p></p></body></html>'
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



    public function guardarRegistro($request)
    {

        // echo 'en el guardado';
        // $servicio = new Servicios();
        // echo $servicio->googleCapcha($request->getVar('recapcha-response'));
        $validation = service('validation');


        $validation->setRules([
            'nombre' => 'required',
            'apellido' => 'required',
            'email' => 'required|valid_email',
            'password' => 'required',
            'recapcha-response' => 'required'
        ]);


        if ($validation->withRequest($this->request)->run()) {

            // echo "adentro";
            $error = 0;
           $data = [
                'nom_reg' => $request->getVar('nombre'),
                'ape_reg' => $request->getVar('apellido'),
                'mai_reg' => strtolower($request->getVar('email')),
                'usu_reg' => md5(strtolower($request->getVar('email'))),
                'pas_reg' => md5($request->getVar('password')),
                'tok_reg' => random_string('numeric', 6)
            ];
            $arraywhere = ['act_req' => 0, 'mai_reg' => $data['mai_reg']];
            $this->model->where($arraywhere)->delete();
            $id = $this->model->insert($data);
        } else {
            $error = 1;
        }


        return ['error' => $error, 'correo' => md5($request->getVar('email'))];
    }



    public function panel()
    {
        $seccion = 'registro';
        $contenido = new ContenidosWebModel();
        $array = ['slu_con as slug', 'img_con as fondo', 'tit_con_esp as titulo', 'des_con_esp as descripcion'];
        $data = $contenido->select($array)->where('slu_con', $seccion)->find();
        // print_r($data[0]);
        return view('registro', ['contenido' => $data[0]]);
        return '';
    }


    public function usuario()
    {
        $seccion = 'registro';
        $contenido = new ContenidosWebModel();
        $array = ['slu_con as slug', 'img_con as fondo', 'tit_con_esp as titulo', 'des_con_esp as descripcion'];
        $data = $contenido->select($array)->where('slu_con', $seccion)->find();
        // print_r($data[0]);
        return view('registro', ['contenido' => $data[0]]);
        // return '';
    }


    public function acreditacion()
    {
        $seccion = 'registro';
        $contenido = new ContenidosWebModel();
        $array = ['slu_con as slug', 'img_con as fondo', 'tit_con_esp as titulo', 'des_con_esp as descripcion'];
        $data = $contenido->select($array)->where('slu_con', $seccion)->find();
        // print_r($data[0]);
        return view('registro', ['contenido' => $data[0]]);
        // return '';
    }

    public function guia()
    {
        $seccion = 'registro';
        $contenido = new ContenidosWebModel();
        $array = ['slu_con as slug', 'img_con as fondo', 'tit_con_esp as titulo', 'des_con_esp as descripcion'];
        $data = $contenido->select($array)->where('slu_con', $seccion)->find();
        // print_r($data[0]);
        return view('registro', ['contenido' => $data[0]]);
        return '';
    }

    public function activar($usuario)
    {
        $data = [
            'usu_reg' => $usuario,
            'act_req' => 1
        ];
        if ($this->model->where($data)->countAllResults() > 0) {
            return redirect()->to('/');
        }

        $seccion = 'activacion';
        $contenido = new ContenidosWebModel();
        $array = ['slu_con as slug', 'img_con as fondo', 'tit_con_esp as titulo', 'des_con_esp as descripcion'];
        $data = $contenido->select($array)->where('slu_con', $seccion)->find();

        return view('registro', ['contenido' => $data[0], 'seccion' => $seccion, 'usuario' => $usuario]);
    }


    public function confirmar()
    {
        $guardado  = $this->activarCuenta($this->request);
        return $this->genericResponse($guardado, 200, $msj = '');
    }


    public function activarCuenta($request)
    {
        $validation = service('validation');
        $validation->setRules([
            'codigoverifiicacion' => 'required|numeric',
            'emailactivacion' => 'required|alpha_numeric'
        ]);
        if ($validation->withRequest($this->request)->run()) {
            $error = 0;
            $data = [
                'usu_reg' => $request->getVar('emailactivacion'),
                'tok_reg' => $request->getVar('codigoverifiicacion'),
                'act_req' => 0
            ];
            $datos = ['act_req' => 1];
            $id = $this->model->where($data)->set($datos)->update();
            //  echo $this->model->getLastQuery();
            $affected_rows = $this->model->affectedRows();

            if ($affected_rows == 0)
                $error = 1;
        } else {
            $error = 1;
        }
        return ['error' => $error, 'correo' => $request->getVar('emailactivacion')];
    }


    public function olvide()
    {
        return view('acreditaciones/formularios/recordar');
    }


    public function envioolvide()
    {
        $request = $this->request;
        $emailoriginal = $request->getVar('direrepass');
        $direrepass = md5($request->getVar('direrepass'));
        $registros = new Acr_registoWebModel();
        $array = ['mai_reg', 'nom_reg', 'ape_reg', 'cod_reg', 'usu_reg'];
        $data = $registros->select($array)->where('usu_reg', $direrepass)->find();
        // echo $registros->getLastQuery();
        if (count($data) > 0) {

            $datauser = [
                'cod_reg' => $data[0]['cod_reg'],
                'pas_reg' => '',
            ];

            $confirmacion = $registros->save($datauser);
            $opt = ['linkactivacion' => getenv('urlProduccion') . '/registro/recuperar/' . $data[0]['usu_reg']];

            $this->sendinblueenvio($data[0]['mai_reg'], $data[0]['nom_reg'] . ' ' . $data[0]['ape_reg'], 'recordar-password', $opt);
        }
        $data = ['error' => '', 'correo' => $emailoriginal];
        return $this->genericResponse($data, 200, $msj = '');
    }



    public function sendinblueenvio($correo, $nombre, $operacion, $opt = '')
    {
        if ($operacion == 'recordar-password') {
            $toName = $nombre;
            $toEmail = $correo;
            $subject = 'Recuperación contraseña BAM / BAM password recovery';
        }

        if ($operacion == 'envio-token') {
            $toName = $nombre;
            $toEmail = $correo;
            $subject = 'Código de verificación de creación de cuenta BAM / BAM account creation verification code';
            // $opt;
        }

        // exit;


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
            "htmlContent" => $htmlMessage
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

    public function formacreditacion($paso)
    {
        // echo $paso;
        $seccion = 'registro';
        $contenido = new ContenidosWebModel();
        $array = ['slu_con as slug', 'img_con as fondo', 'tit_con_esp as titulo', 'des_con_esp as descripcion'];
        $data = $contenido->select($array)->where('slu_con', $seccion)->find();
        // print_r($data[0]);
        return view('acreditacion', ['contenido' => $data[0], 'seccion' => $seccion, 'paso' => $paso]);
        // return '';
    }







    public function iniciosesion()
    {
        // echo "leo";
        $session = Session();
        $request  = $this->request;
        // var_dump($request);
        // $request->getVar('lemail');

        $wherearray = [
            'usu_reg' => md5($request->getVar('lemail')),
            'pas_reg' => md5($request->getVar('lpass')),
            'act_req' => 1
        ];

        // var_dump($wherearray);
        $users = $this->model->select('concat(nom_reg, " ", ape_reg ) as nombre ,  usu_reg  as usuario , nom_reg, ape_reg, finacreditacion')->where($wherearray)->find();
        // echo $this->model->getLastQuery();
        if (count($users) > 0) {
            $user = ['login' => 1];

            $newdata = [
                'username'  => $users[0]['nombre'],
                'name'  => $users[0]['nom_reg'],
                'lastname'  => $users[0]['ape_reg'],
                'id'     => $users[0]['usuario'],
                'acrstatus'     => $users[0]['finacreditacion'],
                'logged_in' => true,
            ];
            $session = \Config\Services::session();
            $session->set($newdata);
            // $session->get('username');
            // print_r($session);
        } else {
            $user = ['login' => 0];
        }

        return $this->genericResponse($user, 200, $msj = '');
    }

    public function cerrar()
    {
        $session = \Config\Services::session();
        $session->destroy();
        return redirect()->to('/');
    }


    public function mensaje($operacion, $opt = '')
    {

        //    print_r($opt);

        // echo $operacion;
        if ($operacion == 'recordar-password') {
            $linkactivacion = $opt['linkactivacion'];
            $html =  '<html>
                        <head>
                            <meta charset="utf-8">
                        </head>
                        <body style="background: #cccccc; font-family: "Trebuchet MS", Arial, Helvetica, sans-serif; font-size: 12px; line-height: 20px; color: #333333;">
                        <table width="800" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
                            <!-- Header -->
                            <tr>
                                <td>
                                    <img src="https://bogotamarket.com/images/emails/cabezote_4.jpg" alt="Header" width="800" usemap="#MapHeader" style="display: block; margin: 0px; border: none;">
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
                                                Recuperación contraseña <em><br>BAM password recovery
                                                </em>
                                                </strong>
                                            </h3>
                                            <p style="margin: 0px; letter-spacing: 1px; font-size: 18px; line-height: 30px;">Estimado usuario, <br><br>
                                                Ha solicitado restablecer la contraseña para su cuenta. Por favor, elija una nueva contraseña haciendo clic en el siguiente enlace:<br><br>
                                            </p>
                                            <p style="margin: 0px; letter-spacing: 1px; font-size: 18px; line-height: 30px;">
                                                <a href="' . $linkactivacion . '" target="blank" style="text-decoration: underline; color: #6f6db5;">Establecer nueva contraseña</a> 
                                            <p>
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
                                            <p style="margin: 0px; letter-spacing: 1px; font-size: 18px; line-height: 30px;">Dear user, <br><br> You have requested to reset the password for your account. Please choose a new password by clicking the following link
                                            </p>
                                            <p style="margin: 0px; letter-spacing: 1px; font-size: 18px; line-height: 30px;"><br>
                                                <a href="' . $linkactivacion . '" target="blank" style="text-decoration: underline; color: #6f6db5;">Set new password</a> 
                                            <p>
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

        if ($operacion == 'envio-token') {

            $codigoactivacion = $opt['codigoactivacion'];
            $linkactivacion =  $opt['linkactivacion'];
            $html =  '<html>
                <head>
                    <meta charset="utf-8">
                </head>
                <body style="background: #cccccc; font-family: "Trebuchet MS", Arial, Helvetica, sans-serif; font-size: 12px; line-height: 20px; color: #333333;">
                <table width="800" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
                    <!-- Header -->
                    <tr>
                        <td>
                            <img src="https://bogotamarket.com/images/emails/cabezote_5.jpg" alt="Header" width="800" usemap="#MapHeader" style="display: block; margin: 0px; border: none;">
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
                                        Código de verificación de creación de cuenta BAM
                                        </strong>
                                    </h3>
                                    <p style="margin: 0px; letter-spacing: 1px; font-size: 18px; line-height: 30px;">Estimado usuario, <br><br> 
                                        ¡Bienvenido a su cuenta en www.bogotamarket.com! Para continuar su proceso de registro, a continuación encuentra su código de verificación: 
                                    <p>
                                    <p style="margin: 50px 0 20px; letter-spacing: 1px; font-size: 20px; font-weight: 600; text-align: center;">
                                        ' . $codigoactivacion . '
                                    </p>
                                    <p >
                                    </p>
                                    <p style="margin: 0px; letter-spacing: 1px; font-size: 18px; line-height: 30px;">
                                        Este código es personal e intransferible, le recomendamos no compartirlo. 
                                    <p>
                                    <p style="margin: 0px; letter-spacing: 1px; font-size: 18px; line-height: 30px;">
                                        En el siguiente enlace puede continuar su proceso de registro: <a href="' . $linkactivacion . '" target="blank" style="text-decoration: underline; color: #6f6db5;">Tu acceso personal</a> 
                                    <p>
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

                                    
                                    <p style="margin: 0px; letter-spacing: 1px; font-size: 18px; line-height: 30px;">Dear user, <br><br> 
                                        Welcome to your account on www.bogotamarket.com! To continue your registration process, please find your verification code below: 
                                    <p>
                                    <p style="margin: 50px 0 20px; letter-spacing: 1px; font-size: 20px; font-weight: 600; text-align: center;">
                                        ' . $codigoactivacion . '
                                    </p>
                                    <p >
                                    </p>
                                    <p style="margin: 0px; letter-spacing: 1px; font-size: 18px; line-height: 30px;">
                                        This code is personal and non-transferable, we recommend you not to share it. 
                                    <p>
                                    <p style="margin: 0px; letter-spacing: 1px; font-size: 18px; line-height: 30px;">
                                    In the following link you can continue your registration process: <a href="' . $linkactivacion . '" target="blank" style="text-decoration: underline; color: #6f6db5;">In the following link you can continue your registration process: </a> 
                                    <p>
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
            </html> ';
        }

        // exit();

        return $html;
    }


    public function infoacreditacion()
    {
        // echo 'leo';
        return view('acreditaciones/acreditacion');
    }

    public function editaregistros()
    {
        $iduser = $this->session->get('id');
        $usuarios = new Acr_registoWebModel();
        $array = ['cod_reg'];
        $datauser = $usuarios->select($array)->where('usu_reg', $iduser)->find();
        $iduser = $datauser[0]['cod_reg'];
        $datauser = [
            'cod_reg' => $iduser,
            'nom_reg' => $this->request->getVar('nombre'),
            'ape_reg' => $this->request->getVar('apellido'),
            'pas_reg' => md5($this->request->getVar('password')),
        ];
        $confirmacion = $usuarios->save($datauser);
        return $this->genericResponse(['error' => 0], 200, $msj = '');
    }


    public function recuperar($usuario)
    {
        $datawhere = [
            'usu_reg' => $usuario,
            'pas_reg' => ''
        ];

        $usuarios = new Acr_registoWebModel();
        $array = ['cod_reg'];
        $datauser = $usuarios->select($array)->where($datawhere)->find();
        // echo $usuarios->getLastQuery();
        if(count($datauser)==0){
            return redirect()->to('/');
        }

        $seccion = 'registro';
        $contenido = new ContenidosWebModel();
        $array = ['slu_con as slug', 'img_con as fondo', 'tit_con_esp as titulo', 'des_con_esp as descripcion'];
        $data = $contenido->select($array)->where('slu_con', $seccion)->find();
        $seccion = 'recuperar';
        return view('registro', ['contenido' => $data[0], 'seccion' => $seccion, 'usuario' => $usuario]);
    }



    public function cambiorecuperar()
    {
        //echo 'lleog' . $this->request->getVar('user');
        $usuarios = new Acr_registoWebModel();
        $array = ['cod_reg'];
        $datauser = $usuarios->select($array)->where('usu_reg', $this->request->getVar('user'))->find();
        //  echo $usuarios->getLastQuery();
        $iduser = $datauser[0]['cod_reg'];
        $datauser = [
            'cod_reg' => $iduser,
            'pas_reg' => md5($this->request->getVar('password')),
        ];
         $confirmacion = $usuarios->save($datauser); 
         return $this->genericResponse(['error' => 0], 200, $msj = '');
    }
}