<?php

namespace App\Models;

use CodeIgniter\Model;

class Acr_registoApiModelinterno extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'acr_registo';
	protected $primaryKey           = 'cod_reg';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = true;
	protected $protectFields        = true;
	protected $allowedFields        = ["nom_reg", "ape_reg", "mai_reg", "divpaso1", "formPart", "nombre", "apellido", "tipodocumento", "numdocumento", "paisresidencia", "ciudadresidencia", "dirresidencia", "nacionalidad", "localidad", "estrato", "sexo", "identidad", "nacimientofecha", "grupoetnia", "divpaso2", "indicativo", "telefono", "mailcontacto", "confMail", "idioma", "partifiporegiones", "ciudadparticipo", "indicativopublicacion", "telefonopublicacion", "correopublicacion", "sectoractividad", "intereses", "otrointeres", "territorio", "mencionepaises", "perfilinteres", "divpaso3", "nombreempresa", "nit", "cargoempresa", "direccionempresa", "indicativoempresa", "telefonoempresa", "correoempresa", "paisempresa", "ciudadempresa", "actividad", "otraactividad", "webempresa", "divpaso4", "fotoacreditacion", "certificadovinculo", "certificadoexistencia", "finacreditacion", 'valorasi', 'nota', 'wompi', 'descuento', 'excluir', 'seleccionado', 'categoriaseleccion', 'seleccionado', 'fuente',"usu_reg"];

	// Dates
	protected $useTimestamps        = true;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';
	protected $deletedField         = 'deleted_at';

	// Validation
	protected $validationRules      = [];
	protected $validationMessages   = [];
	protected $skipValidation       = false;
	protected $cleanValidationRules = true;

	// Callbacks
	protected $allowCallbacks       = true;
	protected $beforeInsert         = [];
	protected $afterInsert          = [];
	protected $beforeUpdate         = [];
	protected $afterUpdate          = [];
	protected $beforeFind           = [];
	protected $afterFind            = [];
	protected $beforeDelete         = [];
	protected $afterDelete          = [];

	public function listatardatos($id = 0)
	{
		$array = ['cod_reg as id', "nom_reg", "ape_reg", "mai_reg", "divpaso1", "formPart", "nombre", "apellido", "tipodocumento", "numdocumento", "paisresidencia", "ciudadresidencia", "dirresidencia", "nacionalidad", "localidad", "estrato", "sexo", "identidad", "nacimientofecha", "grupoetnia", "divpaso2", "indicativo", "telefono", "mailcontacto", "confMail", "idioma", "partifiporegiones", "ciudadparticipo", "indicativopublicacion", "telefonopublicacion", "correopublicacion", "sectoractividad", "intereses", "otrointeres", "territorio", "mencionepaises", "perfilinteres", "divpaso3", "nombreempresa", "nit", "cargoempresa", "direccionempresa", "indicativoempresa", "telefonoempresa", "correoempresa", "paisempresa", "ciudadempresa", "actividad", "otraactividad", "webempresa", "divpaso4", "fotoacreditacion", "certificadovinculo", "certificadoexistencia", "finacreditacion", 'acr_registo.updated_at as fregistro', 'valorasi', 'nota', 'wompi', 'descuento',  'seleccionado', 'categoriaseleccion', 'excluir', 'fuente'];


		if ($id == 0) {

			$estados = ['1', '2', '3', '4', '5', '10'];
			$data = $this->select($array)->select("(select nom_op_para from parametros where nom_para='tipoacreditado' and val_op_para=formPart limit 1) as tipoacreditacion")->select("(select nom_op_para from parametros where nom_para='estadoacreditacion' and val_op_para=finacreditacion limit 1) as estado")->whereIn('finacreditacion', $estados)->join('codigosacreditacion', 'cod_coa = descuento', 'left')->where('fuente', '2')->findAll();
			// echo "leo"	;
		} else {


			$data = $this->select($array)->find($id);

			// print_r($data['intereses']);
			// $data['interebam'] = $this->buscarchcks('interebam', $data['intereses']);
			// $data['territoriosbam'] = $this->buscarchcks('territorios', $data['territorio']);
			// $data['actividadempresabam'] = $this->buscarchcks('actividadempresa', $data['actividad']);
			// exit();
		}
		return $data;
	}

	public function guardar($request)
	{


		// $data = [
		// 	'nom_reg' => $request->getVar('nom_reg'), 'ape_reg' => $request->getVar('ape_reg'), 'mai_reg' => $request->getVar('mai_reg'), 'usu_reg' => $request->getVar('usu_reg'), 'pas_reg' => $request->getVar('pas_reg'), 'tok_reg' => $request->getVar('tok_reg'), 'act_req' => $request->getVar('act_req'), 'divpaso1' => $request->getVar('divpaso1'), 'formPart' => $request->getVar('formPart'), 'nombre' => $request->getVar('nombre'), 'apellido' => $request->getVar('apellido'), 'tipodocumento' => $request->getVar('tipodocumento'), 'numdocumento' => $request->getVar('numdocumento'), 'paisresidencia' => $request->getVar('paisresidencia'), 'ciudadresidencia' => $request->getVar('ciudadresidencia'), 'dirresidencia' => $request->getVar('dirresidencia'), 'nacionalidad' => $request->getVar('nacionalidad'), 'localidad' => $request->getVar('localidad'), 'estrato' => $request->getVar('estrato'), 'sexo' => $request->getVar('sexo'), 'identidad' => $request->getVar('identidad'), 'nacimientofecha' => $request->getVar('nacimientofecha'), 'grupoetnia' => $request->getVar('grupoetnia'), 'divpaso2' => $request->getVar('divpaso2'), 'indicativo' => $request->getVar('indicativo'), 'telefono' => $request->getVar('telefono'), 'mailcontacto' => $request->getVar('mailcontacto'), 'confMail' => $request->getVar('confMail'), 'idioma' => $request->getVar('idioma'), 'partifiporegiones' => $request->getVar('partifiporegiones'), 'ciudadparticipo' => $request->getVar('ciudadparticipo'), 'indicativopublicacion' => $request->getVar('indicativopublicacion'), 'telefonopublicacion' => $request->getVar('telefonopublicacion'), 'correopublicacion' => $request->getVar('correopublicacion'), 'sectoractividad' => $request->getVar('sectoractividad'), 'intereses' => $request->getVar('intereses'), 'otrointeres' => $request->getVar('otrointeres'), 'territorio' => $request->getVar('territorio'), 'mencionepaises' => $request->getVar('mencionepaises'), 'perfilinteres' => $request->getVar('perfilinteres'), 'divpaso3' => $request->getVar('divpaso3'), 'nombreempresa' => $request->getVar('nombreempresa'), 'nit' => $request->getVar('nit'), 'cargoempresa' => $request->getVar('cargoempresa'), 'direccionempresa' => $request->getVar('direccionempresa'), 'indicativoempresa' => $request->getVar('indicativoempresa'), 'telefonoempresa' => $request->getVar('telefonoempresa'), 'correoempresa' => $request->getVar('correoempresa'), 'paisempresa' => $request->getVar('paisempresa'), 'ciudadempresa' => $request->getVar('ciudadempresa'), 'actividad' => $request->getVar('actividad'), 'otraactividad' => $request->getVar('otraactividad'), 'webempresa' => $request->getVar('webempresa'), 'divpaso4' => $request->getVar('divpaso4'), 'fotoacreditacion' => $request->getVar('fotoacreditacion'), 'certificadovinculo' => $request->getVar('certificadovinculo'), 'certificadoexistencia' => $request->getVar('certificadoexistencia'), 'finacreditacion' => $request->getVar('finacreditacion'), 'seleccionado' => $request->getVar('seleccionado'), 'categoriaseleccion' => $request->getVar('categoriaseleccion'), 'fuente' => '2'
		// ];


		$data = [
			'nom_reg' => $request->getVar('nom_reg'),
			'ape_reg' => $request->getVar('ape_reg'),
			'mai_reg' => $request->getVar('mai_reg'),
			'usu_reg' => md5($request->getVar('mai_reg')),
			'pas_reg' => $request->getVar('pas_reg'),
			'tok_reg' => $request->getVar('tok_reg'),
			'act_req' => $request->getVar('act_req'),
			'divpaso1' => $request->getVar('divpaso1'),
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
			'divpaso2' => $request->getVar('divpaso2'),
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
			'intereses' => $request->getVar('intereses'),
			'otrointeres' => $request->getVar('otrointeres'),
			'territorio' => $request->getVar('territorio'),
			'mencionepaises' => $request->getVar('mencionepaises'),
			'perfilinteres' => $request->getVar('perfilinteres'),
			'divpaso3' => $request->getVar('divpaso3'),
			'nombreempresa' => $request->getVar('nombreempresa'),
			'nit' => $request->getVar('nit'),
			'cargoempresa' => $request->getVar('cargoempresa'),
			'direccionempresa' => $request->getVar('direccionempresa'),
			'indicativoempresa' => $request->getVar('indicativoempresa'),
			'telefonoempresa' => $request->getVar('telefonoempresa'),
			'correoempresa' => $request->getVar('correoempresa'),
			'paisempresa' => $request->getVar('paisempresa'),
			'ciudadempresa' => $request->getVar('ciudadempresa'),
			'actividad' => $request->getVar('actividad'),
			'otraactividad' => $request->getVar('otraactividad'),
			'webempresa' => $request->getVar('webempresa'),
			'divpaso4' => $request->getVar('divpaso4'),
			'fotoacreditacion' => $request->getVar('fotoacreditacion'),
			'certificadovinculo' => $request->getVar('certificadovinculo'),
			'certificadoexistencia' => $request->getVar('certificadoexistencia'),
			'finacreditacion' =>10,
			'seleccionado' => $request->getVar('seleccionado'),
			'categoriaseleccion' => $request->getVar('categoriaseleccion'),
			'fuente' => '2',
			'nota' => $request->getVar('nota'),
			'excluir' => $request->getVar('excluir'),

		];

		// print_r($data);

		$id = $this->insert($data);
		return $id;
		// return '';
	}

	public function edicion($id, $request)
	{
		$data = [
			'cod_reg' => $id,
			'nom_reg' => $request->getVar('nom_reg'), 'ape_reg' => $request->getVar('ape_reg'), 'mai_reg' => $request->getVar('mai_reg'), 'usu_reg' => $request->getVar('usu_reg'), 'pas_reg' => $request->getVar('pas_reg'), 'tok_reg' => $request->getVar('tok_reg'), 'act_req' => $request->getVar('act_req'), 'divpaso1' => $request->getVar('divpaso1'), 'formPart' => $request->getVar('formPart'), 'nombre' => $request->getVar('nombre'), 'apellido' => $request->getVar('apellido'), 'tipodocumento' => $request->getVar('tipodocumento'), 'numdocumento' => $request->getVar('numdocumento'), 'paisresidencia' => $request->getVar('paisresidencia'), 'ciudadresidencia' => $request->getVar('ciudadresidencia'), 'dirresidencia' => $request->getVar('dirresidencia'), 'nacionalidad' => $request->getVar('nacionalidad'), 'localidad' => $request->getVar('localidad'), 'estrato' => $request->getVar('estrato'), 'sexo' => $request->getVar('sexo'), 'identidad' => $request->getVar('identidad'), 'nacimientofecha' => $request->getVar('nacimientofecha'), 'grupoetnia' => $request->getVar('grupoetnia'), 'divpaso2' => $request->getVar('divpaso2'), 'indicativo' => $request->getVar('indicativo'), 'telefono' => $request->getVar('telefono'), 'mailcontacto' => $request->getVar('mailcontacto'), 'confMail' => $request->getVar('confMail'), 'idioma' => $request->getVar('idioma'), 'partifiporegiones' => $request->getVar('partifiporegiones'), 'ciudadparticipo' => $request->getVar('ciudadparticipo'), 'indicativopublicacion' => $request->getVar('indicativopublicacion'), 'telefonopublicacion' => $request->getVar('telefonopublicacion'), 'correopublicacion' => $request->getVar('correopublicacion'), 'sectoractividad' => $request->getVar('sectoractividad'), 'intereses' => $request->getVar('intereses'), 'otrointeres' => $request->getVar('otrointeres'), 'territorio' => $request->getVar('territorio'), 'mencionepaises' => $request->getVar('mencionepaises'), 'perfilinteres' => $request->getVar('perfilinteres'), 'divpaso3' => $request->getVar('divpaso3'), 'nombreempresa' => $request->getVar('nombreempresa'), 'nit' => $request->getVar('nit'), 'cargoempresa' => $request->getVar('cargoempresa'), 'direccionempresa' => $request->getVar('direccionempresa'), 'indicativoempresa' => $request->getVar('indicativoempresa'), 'telefonoempresa' => $request->getVar('telefonoempresa'), 'correoempresa' => $request->getVar('correoempresa'), 'paisempresa' => $request->getVar('paisempresa'), 'ciudadempresa' => $request->getVar('ciudadempresa'), 'actividad' => $request->getVar('actividad'), 'otraactividad' => $request->getVar('otraactividad'), 'webempresa' => $request->getVar('webempresa'), 'divpaso4' => $request->getVar('divpaso4'), 'fotoacreditacion' => $request->getVar('fotoacreditacion'), 'certificadovinculo' => $request->getVar('certificadovinculo'), 'certificadoexistencia' => $request->getVar('certificadoexistencia'), 'finacreditacion' => '10',
			'seleccionado' => $request->getVar('seleccionado'),
			'categoriaseleccion' => $request->getVar('categoriaseleccion'),
			'nota' => $request->getVar('nota'),
			'excluir' => $request->getVar('excluir'),

		];

		// if ($request->getVar('finacreditacion') == 2 || $request->getVar('finacreditacion') == 4|| $request->getVar('finacreditacion') == 5 || $request->getVar('finacreditacion') == 10) {
		// 	$data = [
		// 		'cod_reg' => $id,
		// 		'valorasi' => $request->getVar('valorasi'),
		// 		'nota' => $request->getVar('nota'),
		// 		'finacreditacion' => $request->getVar('finacreditacion'),
		// 		'seleccionado' => $request->getVar('seleccionado'),
		// 		'categoriaseleccion' => $request->getVar('categoriaseleccion'),
		// 		'excluir' => $request->getVar('excluir'),
		// 		'nombre' => $request->getVar('nombre'),
		// 		'apellido' => $request->getVar('apellido'),
		// 		'nombreempresa' => $request->getVar('nombreempresa'),
		// 		'webempresa' => $request->getVar('webempresa')



		// 	];
		// } else {
		// 	$data = [
		// 		'cod_reg' => $id,
		// 		'valorasi' => $request->getVar('valorasi'),
		// 		'nota' => $request->getVar('nota'),
		// 		'finacreditacion' => $request->getVar('finacreditacion'),
		// 		'seleccionado' => $request->getVar('seleccionado'),
		// 		'categoriaseleccion' => $request->getVar('categoriaseleccion'),
		// 		'excluir' => $request->getVar('excluir'),
		// 		'nombre' => $request->getVar('nombre'),
		// 		'apellido' => $request->getVar('apellido'),
		// 		'nombreempresa' => $request->getVar('nombreempresa'),
		// 		'webempresa' => $request->getVar('webempresa')
		// 	];
		// }

		// print_r($data);
		$confirmacion = $this->save($data);

		if ($confirmacion == 1) {
			return $id;
		}
	}

	public function borrar($id)
	{
		$id = $this->delete($id);
		return $id;
	}

	public function parametros()
	{
		$array = ["nom_reg", "ape_reg", "mai_reg", "usu_reg", "pas_reg", "tok_reg", "act_req", "divpaso1", "formPart", "nombre", "apellido", "tipodocumento", "numdocumento", "paisresidencia", "ciudadresidencia", "dirresidencia", "nacionalidad", "localidad", "estrato", "sexo", "identidad", "nacimientofecha", "grupoetnia", "divpaso2", "indicativo", "telefono", "mailcontacto", "confMail", "idioma", "partifiporegiones", "ciudadparticipo", "indicativopublicacion", "telefonopublicacion", "correopublicacion", "sectoractividad", "intereses", "otrointeres", "territorio", "mencionepaises", "perfilinteres", "divpaso3", "nombreempresa", "nit", "cargoempresa", "direccionempresa", "indicativoempresa", "telefonoempresa", "correoempresa", "paisempresa", "ciudadempresa", "actividad", "otraactividad", "webempresa", "divpaso4", "fotoacreditacion", "certificadovinculo", "certificadoexistencia", "finacreditacion", 'seleccionado', 'categoriaseleccion'];
		$data = $this->select($array)->findAll();
		return $data;
	}

	public function buscarchcks($parametro, $datos)
	{
		$checks = explode("**", $datos);
		// print_r($checks);
		$apiparametros = new ParametrosApiModel();
		$arraySelect = ['nom_op_para as name', 'val_op_para as code'];
		$arrayWhere = ['nom_para' => $parametro];
		$arrayWheredetalle = ['val_op_para' => $checks];
		// print_r($arrayWheredetalle);
		$listaparametros = $apiparametros->select($arraySelect)->where($arrayWhere)->WhereIn('val_op_para', $checks)->find();
		return $listaparametros;
		// print_r($listaparametros);

	}
}
/* fecha de creacion: 05-22-2023 02:24:27 pm */