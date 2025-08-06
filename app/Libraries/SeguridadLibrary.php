<?php

namespace App\Libraries;

use \Firebase\JWT\JWT;


class SeguridadLibrary
{

    private static $secret_key = 'G%VgQ6iyk!uK&u99x!s96QGSS&CIq95NrKwH4';
    private static $encrypt = ['HS256'];


    function __construct()
    {
    }

    public static function SignIn($data)
    {
        $time = time();

        $token = array(
            "iss" => "mottif.com",
            "aud" => "mottif.com",
            'iat' => $time,
            'exp' => $time + (60 * 60),
            'aud' => self::Aud(),
            'data' => $data
        );

        //	print_r($token);

        return JWT::encode($token, self::$secret_key);
    }


    private static function Aud()
    {
        $aud = '';

        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $aud = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $aud = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $aud = $_SERVER['REMOTE_ADDR'];
        }

        $aud .= @$_SERVER['HTTP_USER_AGENT'];
        $aud .= gethostname();

        return sha1($aud);
    }


    public function test()
    {
        $datos = [
            'id' => 1,
            'name' => 'Eduardo',
            'email' => 'Eduardo@leo.com'
        ];

        $tokenGenerado =  $this->SignIn($datos);
        //var_dump($this->GetData($tokenGenerado));

        $leo = $this->Check('eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJwcmVtaW9zaW1vbmJvbGl2YXIuY29tIiwiYXVkIjoiNzkwZTM2YmQ3NmU5NjZhODA1NWE5NGNkZGQ2N2YzZTU3YWM0MDU2ZCIsImlhdCI6MTYxNzkxNDYxNiwiZXhwIjoxNjE3OTE0Nzk2LCJkYXRhIjp7Im5hbWUiOiJQYXRyaWNpYSBOaWV0byIsImlkIjoiNSJ9fQ.qxwsGUPNEbvsFfilBCi9lKnDtWBlKXOUp-hbgkto-Hg');

        if ($leo) {
            echo  "ok";
        } else {
            echo "yuca";
        }
        exit;
    }

    public static function GetData($token)
    {
        $secret_key = self::$secret_key;
        $encrypt = self::$encrypt;
        $a = JWT::decode(
            $token,
            $secret_key,
            $encrypt
        )->data;
        return $a;
    }

    public static function Check($token = '')
    {
        try {
            if (empty($token)) {
                return false;
            }
            $decode = JWT::decode($token, self::$secret_key, self::$encrypt);
            return $decode = JWT::decode($token, self::$secret_key, self::$encrypt);
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function getsecret_key()
    {
        return self::$secret_key;
    }
}