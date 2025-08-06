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
namespace App\Models;
use CodeIgniter\Model;

class $nombreModelo extends Model
{
	protected \$DBGroup              = 'default';
	protected \$table                = '$tabla';
	protected \$primaryKey           = '$primarykey';
	protected \$useAutoIncrement     = true;
	protected \$insertID             = 0;
	protected \$returnType           = 'array';
	protected \$useSoftDeletes       = true;
	protected \$protectFields        = true;
	protected \$allowedFields        = $campos;

	// Dates
	protected \$useTimestamps        = true;
	protected \$dateFormat           = 'datetime';
	protected \$createdField         = 'created_at';
	protected \$updatedField         = 'updated_at';
	protected \$deletedField         = 'deleted_at';

	// Validation
	protected \$validationRules      = [];
	protected \$validationMessages   = [];
	protected \$skipValidation       = false;
	protected \$cleanValidationRules = true;

	// Callbacks
	protected \$allowCallbacks       = true;
	protected \$beforeInsert         = [];
	protected \$afterInsert          = [];
	protected \$beforeUpdate         = [];
	protected \$afterUpdate          = [];
	protected \$beforeFind           = [];
	protected \$afterFind            = [];
	protected \$beforeDelete         = [];
	protected \$afterDelete          = [];

	public function listatardatos(\$id = 0)
	{
		\$array = $campos;
		if (\$id == 0) {
			\$data = \$this->select(\$array)->findAll();
		} else {
			\$data = \$this->select(\$array)->find(\$id);
		}
		return \$data;
	}

	public function guardar(\$request)
	{

		\$data = [
			$camposGuardar
		];
		\$id = \$this->insert(\$data);
		return \$id;
	}

	public function edicion(\$id, \$request)
	{
		\$data = [
			'$primarykey' => \$id,
			$camposGuardar
		];
		\$confirmacion = \$this->save(\$data);

		if (\$confirmacion == 1) {
			return \$id;
		}
	}

	public function borrar(\$id)
	{
		\$id = \$this->delete(\$id);
		return \$id;
	}

	public function parametros()
	{
		\$array = $campos;
		\$data = \$this->select(\$array)->findAll();
		return \$data;
	}
}
/* fecha de creacion: $DateAndTime */
EOD;
		?>
		<textarea rows="30" cols="130">
			<?= $str ?>
		</textarea>

		<?php

		$nombre_fichero = "../app/Models/" . $nombreModelo . ".php";

		if (file_exists($nombre_fichero)) {
			unlink($nombre_fichero);
			echo "si existe";
		} 

		$txt = fopen($nombre_fichero, 'a') or die('Problemas al crear el archivo');
		fwrite($txt, $str);
		fclose($txt)
		?>

	</section>


	
</body>

</html>