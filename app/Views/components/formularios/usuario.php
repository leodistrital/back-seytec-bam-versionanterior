<div class="form-popup" id="myForm">
    <form action="/updateuser" class="form-container" name="formUsuarioIn" id="formUsuarioIn" method="post"
        enctype="multipart/form-data">
        <input type="hidden" name="mode" value="actualizarUsuarioIn">
        <input type="hidden" name="fileImagenUsuario_type">
        <input type="hidden" name="fileImagenUsuario_name">
        <input type="hidden" name="fileImagenUsuario" id="id_filePortada">
        <div class="marcaLoginForm">
            Actualiza tus datos en Renault-D
        </div>
        <div class="form-field">
            <label for="psw"><b>Tus nombres y apellidos</b></label>
            <p style="margin: 0px">
                <input type="text" placeholder="Ingresa tus nombres y apellidos" name="nombre"
                    value="<?= $datosUsuario['nombre'] ?>">
            </p>
            <label for="psw"><b>Documento</b></label>
            <p style="margin: 0px">
                <input type="text" placeholder="Ingresa tu cédula sin puntos ni comas" name="identificacion"
                    value="<?= $datosUsuario['identificacion'] ?>">
            </p>
            <label for="psw"><b>Correo electrónico</b></label>
            <p style="margin: 0px">
                <input type="text" placeholder="Ingresa tu e-mail" name="email" value="<?= $datosUsuario['email'] ?>">
            </p>
            <label for="psw"><b>Concesionario</b></label>
            <p style="margin: 0px">
                <select type="select">
                    <?php foreach ($listaconcesionarios as $concesionario) : ?>
                    <option value="<?= $concesionario['id'] ?>"
                        <?= ($concesionario['id'] == $datosUsuario['id_concesionario'] ? 'selected' : ''); ?>>
                        <?= $concesionario['concesionario'] ?></option>
                    <?php endforeach; ?>
                </select>
            </p>
            <label for="psw"><b>Contraseña</b></label>
            <p style="margin: 0px">
                <input type="password" placeholder="Ingresa tu nueva contraseña si deseas cambiarla" name="password">
            </p>
            <p style="margin: 0px">
                <input type="password" placeholder="Confirma tu nueva contraseña" name="password_confirm">
            </p>
        </div>
        <br>

        <button type="submit" class="btn">Guardar mis datos</button>
        <div class="form-check">
            <p style="margin: 0px">
                <input type="checkbox" name="termsUsuarioIn" value="true"> Acepto la siguiente política de datos, el
                tratamiento de mis datos y ser contactado con la información que proporciono en este formulario.
            </p>
        </div>
        <div class="cerrar">
            <button type="button" class="btn cancel" onclick="closeForm()">X</button>
        </div>
    </form>
</div>