<div class="sectExtraInt nop">
    <div class="maxW">
        <div class="listRegiones bg2">
            <div class="listAcred">
                <div class="listA">
                    <article class="iAcred iAcredHome">
                        <article class="iAcredLeft">
                            <article class="iRegiones">
                                <h2>Datos de registro</h2>
                            </article>
                        </article>

                        <article class="iAcredRight formAcred">
                            <div class="listReg">
                                <div class="listR">
                                    <article class="iReg">
                                        <ul>
                                            <li class="cat2 acredBtn">

                                                <a href="/panel/registro">
                                                    <h2>MIS DATOS DE ACCESO<br>A BAM.com</h2>
                                                </a>
                                            </li>
                                            <?php
                                            $activa = '';
                                            $evento = "";
                                            $sincupon = false;
                                            if ($finacreditacion == 0 || $finacreditacion == 5) {
                                                $ruta =  '/panel/acreditacion/1';
                                                $style = '';
                                                $ruta =  '#';
                                                $style = 'style="background-color: #aaa;"';
                                                $evento = "onclick='cierre()'"; 

                                            } else {
                                                $ruta =  '#';
                                                $style = 'style="background-color: #aaa;"';
                                            }

                                            if ($finacreditacion == 3 || $finacreditacion == 10 ) {
                                                $ruta =  '#';
                                                $style = 'style="background-color: #00cc00;"';
                                                $activa = ' activa';
                                            }

                                            if ($finacreditacion == 2  ) {
                                                $sincupon = true;
                                            }
                                            ?>
                                            <?php
                                            if ($veracreditacion) { ?>
                                            <li class="cat2 acredBtn">
                                                <a href="<?= $ruta ?>" <?= $style ?> <?= $evento ?>  >
                                                    <h2>ACREDITACIÓN<br>BAM 2023 <?= $activa ?></h2>
                                                </a>
                                            </li>
                                            <?php } ?>

                                            <?php
                                            if ($activarpago) {
                                                $valorAcreditacion = intval($datauserpago['val_tar']) * 100;
                                                $referenciaPago = $datauserpago['usu_reg'] . '-' . $random;
                                            ?>
                                            <li class="cat2 acredBtn" style="background-color: #6f6eb3;">
                                                <form>
                                                    <script src="https://checkout.wompi.co/widget.js"
                                                        data-render="button"
                                                        data-public-key="pub_prod_k36F717GH5QX0himiOqbDSq7PSSEY1vQ"
                                                        data-currency="COP"
                                                        data-amount-in-cents="<?= $valorAcreditacion ?>"
                                                        data-reference="<?= $referenciaPago ?>"
                                                        data-redirect-url="https://bogotamarket.com/panel/pagos/<?= $datauserpago['usu_reg'] ?>/<?= $datauserpago['tok_reg'] ?>">
                                                    </script>
                                                </form>
                                            </li>
                                            <?php } ?>

                                            <li class="cat2 acredBtn">
                                                <a href="https://bogotamarket.com/infoacreditacion">
                                                    <h2>T&amp;C<br>BAM 2023</h2>
                                                </a>
                                            </li>
                                        </ul>
                                        <?php if ($sincupon) {
                                            $linkdes = "/panel/descuento";
                                            $labeldesc = "Ingresar código de descuento";
                                            $classdesc = "openFancy cboxElement";

                                            if ($datauserpago['descuento'] > 0) {
                                                $linkdes = "#";
                                                $labeldesc = "Descuento realizado por código";
                                                $classdesc = "";
                                            }
                                        ?>

                                        <ul class="btnPeq">
                                            <li></li>
                                            <li class="btnAc acredBtn3 colorOrange">
                                                <a href="<?= $linkdes ?>" class="<?= $classdesc ?>">
                                                    <h2><?= $labeldesc ?></h2>
                                                </a>
                                            </li>
                                            <li></li>
                                        </ul>
                                        <?php } ?>
                                    </article>
                                </div>

                            </div>
                        </article>
                        <?php if ($sincupon) {
                            $linkdes = "/panel/descuento";
                            $labeldesc = "Ingresar código de descuento";
                            $classdesc = "openFancy cboxElement";

                            if ($datauserpago['descuento'] > 0) {
                                $linkdes = "#";
                                $labeldesc = "Descuento realizado por código";
                                $classdesc = "";
                            }
                        ?>
                        <?php } ?>
                    </article>
                </div>
            </div>
        </div>
    <!-- </div>
</div> -->