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
        <div class="cFDetails ingBAMCod">
            <button type="button" class="cboxCF btnCF">cerrar</button>
            <div class="">
                <div class="cText">
                    <h3>Código de descuento</h3>
                    <div class="desc">
                        Ingrese su código, para aplicar el descuento
                    </div>
                    <form id="formdescuento" name="formdescuento" enctype="multipart/form-data">
                        <div class="sectExtraInt">
                            <section id="mainForm" class="contFormIng">
                                <div class="gCenter">
                                    <fieldset>
                                        <label class="gLabel required recPass">
                                            <input type="text" name="coddescuento" id="coddescuento"
                                                placeholder="Código">
                                        </label>
                                        <div class="contBtns">
                                            <button type="submit" class="gButton btnUSU"> Aplicar
                                            </button>
                                        </div>
                                    </fieldset>
                                </div>
                            </section>
                        </div>
                    </form>

                </div>
            </div>

        </div>
        <!--End Resumen proyecto-->
    </div>
</body>
<!--Scripts-->
<script src="/js/jquery.validate.min.js"></script>
<script src="/js/forms.js?v=<?=random_int(100, 999)?>"></script>

</html>