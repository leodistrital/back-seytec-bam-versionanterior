<?php
    namespace App\Controllers\Dev;

    use App\Models\AliadosModel;
    use CodeIgniter\RESTful\ResourceController;

    class Rutas extends ResourceController
    {
        protected $format    = 'json';

        public function __construct()
        {
            $this->modelName = new AliadosModel();
        }

        public function index()
        {
            echo "<li><a href='http://localhost/admin/aliados'>aliados</a></li>";
            echo "<li><a href='http://localhost/admin/cifras'>cifra</a></li>";
            echo "<li><a href='http://localhost/admin/contenidos'>contenidos</a></li>";
            echo "<li><a href='http://localhost/admin/documentos'>documentos</a></li>";
            echo "<li><a href='http://localhost/admin/enlaces'>enlaces</a></li>";
            echo "<li><a href='http://localhost/admin/equipos'>equipos</a></li>";
            echo "<li><a href='http://localhost/admin/sliders '>slider</a></li>";
            echo "<li><a href='http://localhost/admin/sitio'>sittio</a></li>";
            echo "<li><a href='http://localhost/admin/lab'>lab</a></li>";
            echo "<li><a href='http://localhost/admin/perfiles'>perfiles</a></li>";
            // echo'>echo</a></li>"; "<li>localhost/admin/menus');
        }
    }
