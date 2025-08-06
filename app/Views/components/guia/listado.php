<div>
    <!--Form 1-->
    <form id="formAcered1" method="POST" enctype="multipart/form-data">
        <div class="sectExtraInt">
            <div class="maxW">
                <section id="mainForm" class="contFormGuia">
                    <div class="gCenter">
                        <div class="gCol col4 alinearAbajo">
                            <div class="contBtns">
                                <div class="titGuia">
                                    <?php if( $tipoguia=='participantes'){
                                        echo '<h2>Participantes</h2>';
                                    }
                                    if( $tipoguia=='empresas'){
                                        echo '<h2>Empresas</h2>';
                                    }
                                    if( $tipoguia=='favoritos'){
                                        echo '<h2>Favoritos</h2>';
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="contBtns"><span></span></div>
                            <?= $this->include("components/guia/botoneslistado") ?>
                        </div>
                        <div class="gCol col2 alinearAbajo">
                            <?= $this->include("components/guia/organizador") ?>
                            <!-- <div class="middle">
                                <p>
                                    <img src="/images/site/ico_impresora.png" alt="">
                                </p>
                            </div> -->
                            <div>
                                <?= $this->include("components/guia/resultados") ?>
                                <?= $this->include("components/guia/paginador") ?>
                            </div>
                        </div>

                        <?= $this->include("components/guia/abecedario") ?>

                        <?php  if($tipoguia=='participantes'){ ?>
                        <div class="gCol col fichaGuia">
                            <div>
                                <!-- <h2>Sector de actividad / Nombre<h2> -->
                                <?= $this->include("components/guia/card") ?>
                            </div>
                        </div>
                        <?php } ?>


                        <?php  if($tipoguia=='empresas'){ ?>
                        <div class="gCol col fichaGuia">
                            <div>
                                <!-- <h2>Actividad / país<h2> -->
                                <?= $this->include("components/guia/cardempresa") ?>
                            </div>
                        </div>
                        <?php } ?>


                        <?php  if($tipoguia=='favoritos'){ ?>
                        <div class="gCol col fichaGuia">
                            <div>
                                <!-- <h2>Actividad / país<h2> -->
                                <?= $this->include("components/guia/card") ?>
                            </div>
                        </div>
                        <?php } ?>


                        <div class="gCol col4">
                            <!-- <div class="contBtns anchoAuto">
                                <img src="images/site/ico_impresora.png" alt="">
                            </div> -->
                            <div class="contBtns resGuia">
                                <?= $this->include("components/guia/resultados") ?>
                                <?= $this->include("components/guia/paginador") ?>
                            </div>
                            <?= $this->include("components/guia/botoneslistado") ?>
                        </div>
                        <?= $this->include("components/guia/abecedario") ?>

                    </div>
                </section>
            </div>
        </div>
    </form>
</div>