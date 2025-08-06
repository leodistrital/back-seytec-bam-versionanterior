<div class="sectExtraInt nop">
    <div class="maxW">

        <div class="listRegiones">
            <div class="listR">
                <article class="iRegionesLeft">
                    <h2>Mesas redondas</h2>
                </article>
                <article class="iRegionesRight">
                    <h4>Nuestras mesas redondas son la oportunidad ideal para tener un contacto más cercano con los
                        expertos invitados y dialogar en detalle sobre sus campos de experiencia y resolver inquietudes
                        puntuales de las masterclass. El día de inauguración del mercado se abren las inscripciones para
                        las mesas redondas con cada uno de los expertos invitados. Las mesas tienen un cupo limitado de
                        hasta 10 personas y se desarrollan en un periodo de una hora.</h4>
                </article>
            </div>

            <div class="gListRegiones marTop">
                <?php foreach ($mesasredondas as $mesasredonda) :  ?>
                <article class="itemSRegion long">
                    <div>
                        <figure class="gImg">
                            <img src="<?=$mesasredonda['imagen']?>">
                        </figure>
                        <header class="gDesc">
                            <article class="btnInsc">
                                <ul>
                                    <li class="btnIns colorBorange"><a href="#">INSCRÍBASE</a></li>
                                    <ul>
                                    </ul>
                                </ul>
                            </article>
                            <h2 class="espSimple"><?=$mesasredonda['titulo']?></h2>
                            <h3 class="espDoble"><?=$mesasredonda['fecha']?>
                                <br><?=$mesasredonda['hora']?>
                                <br><?=$mesasredonda['lugar']?>
                            </h3>
                            <h3 class="espDoble"><?=$mesasredonda['descripcion']?></h3>
                        </header>
                    </div>
                </article>
                <?php endforeach;  ?>

            </div>
        </div>
    </div>