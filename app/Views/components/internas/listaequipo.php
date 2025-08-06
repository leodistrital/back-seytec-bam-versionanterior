<!--Cont center-->
<div class="gCCenter">
    <div class="maxW">
        <!--List equipo-->
        <div class="gListMovies">
            <?php foreach ($perfiles as $perfil) : ?>
                <article class="itemSMovie noStyle">
                    <div>
                        <figure class="gImg personaje">
                            <img src="<?= $perfil['imagen'] ?>">
                        </figure>
                        <header class="gDesc persona">
                            <h1 style="text-align: center;"><?= $perfil['nombre'] ?></h1>
                            <h2 style="text-align: center;"><?= $perfil['cargo'] ?></h2>
                        </header>
                    </div>
                </article>
            <?php endforeach;  ?>
        </div>
        <!--End List equipo-->
    </div>
</div>
<!--End Cont center-->