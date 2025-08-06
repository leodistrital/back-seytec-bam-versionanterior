<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="stylesheet" href="/css/stylesForm.css">

</head>

<body>
    <div class="gFancyT">
        <!--Resumen proyecto-->
        <div class="cFDetails">
            <button type="button" class="cboxCF btnCF">cerrar</button>

            <div class="cText">
                <h3>Agregar a favoritos</h3>
                <div class="desc">
                    Almacenar este contacto en mis favoritos.
                </div>

                <div class="sectExtraInt">

                    <section class="contForm">
                        <div class="gCenter">
                            <div class="gCol col">
                                <form id="lisrafaoritosForm" name="lisrafaoritosForm" enctype="multipart/form-data">
                                    <div>
                                        <p>
                                            <label class="gLabel listados">
                                                <span class="label"><strong>Agregar a un listado<em> / Add List
                                                            inglés</em></strong></span>
                                                <select name="milistafavoritos" id="">
                                                    <!-- <option value="">Seleccone</option> -->
                                                    <?php foreach ($data['listasdata'] as $item) :?>

                                                    <option value="<?= $item['cod_lif'] ?>">
                                                        <?= $item['nom_lif'] ?>
                                                    </option>
                                                    <?php endforeach ?>
                                                </select>
                                            </label>
                                        </p>
                                    </div>

                                    <div>
                                        <p>
                                            <label class="gLabel listados">
                                                <span class="label"><strong>Crear listado y agregar<em> / Create a new
                                                            Item
                                                        </em></strong></span>
                                                <input type="text" name="nombrelista" id="nombrelista">
                                            </label>
                                        </p>
                                        <input type="hidden" name="fav" id="fav" value="<?= $data['usuario'] ?>">
                                        <input type="hidden" name="tipo" id="tipo" value="<?= $data['tipo'] ?>">
                                    </div>
                                    <br><br>
                                    <div>
                                        <div class="contBtns ">
                                            <button type="submit" class="gButton"> Guardar
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </section>

                </div>
            </div>

        </div>
        <!--End Resumen proyecto-->
    </div>
</body>
<!--Scripts-->
<script src="/js/jquery.validate.min.js"></script>
<script src="/js/forms.js?v=<?=random_int(100, 999)?>"></script>

<script>
// closeAlert();
<?php 
if($data['borrado'] == 1){
    echo "document.querySelector('#card-".$data["usuario"]."').src='http://localhost/images/site/ico_estrella_guia_off.png';";
    echo 'closeAlert();';
} else {
     echo "document.querySelector('#card-".$data["usuario"]."').src='http://localhost/images/site/ico_estrella_guia_on.png';";
}
?>
</script>

</html>