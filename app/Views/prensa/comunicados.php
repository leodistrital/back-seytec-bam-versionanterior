<section class="gMSection_interna">
    <div class="maxW">

        <div class="contIntern">
            <div class="gContent">

                <div class="topInfo">
                    <h2 class="gTitle">Oficina de prensa</h2>
                    <p class="gIntro"></p>
                </div>
            </div>
        </div>
    </div>
    <!--Info superior-->
    <!--Extra-->
    <div class="sectExtra nop">
        <div class="maxW">
            <div class="listPrensa">
                <div class="listP">
                    <article class="iPrensa">
                        <h2>Newsletters</h2>
                        <?php foreach ($newslatters as $eventonewslatter) :  ?>
                        <div class="contNL">
                            <a href="<?= $eventonewslatter['lin_pre'] ?>" target="_blank">
                                <h3><?= $eventonewslatter['fec_pre'] ?></h3>
                                <h4><?= $eventonewslatter['tit_pre'] ?></h4>
                            </a>
                        </div>
                        <?php endforeach; ?>
                    </article>
                    <article class=" iPrensa">
                        <h2>Comunicados de prensa</h2>
                        <?php foreach ($comunicados as $comunicado) :  ?>
                        <a href="<?= $comunicado['lin_pre'] ?>" target="_blank">
                            <div class="contCP">
                                <h3><?= $comunicado['fec_pre'] ?></h3>
                                <h5><?= $comunicado['tit_pre'] ?></h5>
                                <p><?= $comunicado['sti_pre'] ?></p>
                            </div>
                        </a>
                        <?php endforeach; ?>
                    </article>
                </div>
            </div>
        </div>
    </div>
    <!--End Extra-->
</section>