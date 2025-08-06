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
        <div class="cFDetails ingBAM">
            <button type="button" class="cboxCF btnCF">cerrar</button>
            <div class="">
                <div class="cText">
                    <h3>Recordar contraseña</h3>
                    <div class="desc">
                        Ingrese su correo electrónico para recibir un link de restauracion de su contraseña.
                    </div>
                    <form id="recordarPass" name="recordarPass" enctype="multipart/form-data">
                        <div class="sectExtraInt">
                            <section id="mainForm" class="contFormIng">
                                <div class="gCenter">
                                    <fieldset>
                                        <label class="gLabel required recPass">
                                            <input type="text" name="direrepass" id="direrepass"
                                                placeholder="Correo electrónico">
                                        </label>
                                        <label class="gLabel required recPass">
                                            <input type="text" name="direrepassonfirm" id="direrepassonfirm"
                                                placeholder="Confirmar correo electrónico">
                                        </label>
                                        <div class="contBtns">
                                            <button type="submit" class="gButton btnING"> Enviar
                                            </button>
                                            <!-- <button type="submit" class="gButton btnING">
                                            <a href="#">Enviar</a>
                                        </button> -->
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