<?php
namespace App\Controllers;
use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use App\Models\UsuarioApiModel;
use Firebase\JWT\JWT;


// use vendor\Firebase\JWT\JWT;

class Login extends BaseController
{
	use ResponseTrait;

	public function index()
	{
		$userModel = new UsuarioApiModel();

		$email = $this->request->getVar('email');
		$password = $this->request->getVar('password');

		$user = $userModel->where('log_usu', $email)->first();
		// print_r($user);
		if (is_null($user)) {
			return $this->respond(['error' => 'Invalid username or password.'], 401);
		}
		// echo "---".$password;
		// $userpass = password_hash('h8xra3jk', PASSWORD_DEFAULT);
// exit();

		$pwd_verify = password_verify($password, $user['pas_usu']);

		if (!$pwd_verify) {
			return $this->respond(['error' => 'Invalid username or password.'], 401);
		}

		$key = getenv('JWT_SECRET');
		$iat = time(); // current timestamp value
		$exp = $iat + 3600;

		$payload = array(
			"iss" => "RBSAS",
			"sub" => "website",
			"iat" => $iat, //Time the JWT issued at
			"exp" => $exp, // Expiration time of token
			"email" => $user['log_usu'],
		);

		$token = JWT::encode($payload, $key, 'HS256');

		$response = [
			'message' => 'Login Succesful',
			'token' => "Bearer".' '.$token
		];

		return $this->respond($response, 200);
	}
}
