<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Welcome to CodeIgniter 4!</title>
	<meta name="description" content="The small framework with powerful features">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="image/png" href="/favicon.ico" />

	<!-- STYLES -->
</head>

<body>

	<!-- HEADER: MENU + HEROE SECTION -->
	<header>


	</header>

	<!-- CONTENT -->

	<section>
		<?php
		$DateAndTime = date('m-d-Y h:i:s a', time());
		$str = <<<EOD
<?php

namespace App\Controllers\API;

use App\Models\\$nombreModelo;
use CodeIgniter\RESTful\ResourceController;

class $tabla extends ResourceController
{
    protected \$format    = 'json';

    public function __construct()
    {
        \$this->modelName = new $nombreModelo();
    }

    public function index()
    {
        
        \$data = \$this->model->listatardatos();
        return \$this->respond(\$data, 200);
    }

    public function show(\$id = null)
    {
        \$data = \$this->model->listatardatos(\$id);
        return \$this->respond(array('data' => \$data), 200);
    }

    public function create()
    {
        \$resp = \$this->model->guardar(\$this->request);
        \$info = \$this->model->listatardatos(\$resp);
        \$data['resp'] = [
            'codigo' => \$resp,
            'status' => 'Ok',
            'info' => \$info
        ];
        return \$this->respond(\$data, 200);
    }

    public function update(\$id = null)
	{
		\$resp = \$this->model->edicion(\$id, \$this->request);
		return \$this->respond(\$resp, 200);
	}

    public function delete(\$id = null)
    {
        \$resp = \$this->model->borrar(\$id);
        \$data['resp'] = [
            'codigo' => \$resp,
            'status' => 'Ok'
        ];
        return \$this->respond(\$data, 200);
    }
}
/* fecha de creacion: $DateAndTime */
EOD;




		?>
		<textarea rows="30" cols="130">
			<?= $str ?>
		</textarea>

		<?php

		$nombre_fichero = "../app/Controllers/API/" . $tabla . ".php";

		if (file_exists($nombre_fichero)) {
			unlink($nombre_fichero);
			echo "si existe";
		}

		$txt = fopen($nombre_fichero, 'a') or die('Problemas al crear el archivo');
		fwrite($txt, $str);
		fclose($txt)
		?>

	</section>


	<!-- FOOTER: DEBUG INFO + COPYRIGHTS -->

	<footer>


	</footer>

	<!-- SCRIPTS -->


	<!-- -->

</body>

</html>