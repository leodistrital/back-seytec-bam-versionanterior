<div class="maxW">
    <div class="contIntern noBtm">
        <div class="gContent noBtm">

            <div class="topInfo">
                <h2 class="gTitle"><?=$regioncontenido['titulo'] ?>
                    <span><?=$regioncontenido['subtitulo'] ?></span>
                </h2>
                <div class="gIntro">
                    <?=$regioncontenido['desc'] ?>
                </div>
            </div>

            <article class="btnAcred">
                <?php if( !empty($regioncontenido['linkacreditacion'])){ ?>
                <ul>
                    <li class="btnAc colorOrange"><a href="<?=$regioncontenido['linkacreditacion'] ?>"
                            target="_blank">ACREDITARSE</a>
                    </li>
                </ul>
                <?php } ?>
            </article>

            <div class="listRegiones bg2 top">
                <div class="listR">
                    <article class="iRegionesLeft">
                        <h2>Agenda</h2>
                    </article>
                    <article class="iRegionesRight">
                        <h4><?=$regioncontenido['agendadesc']?></h4>
                    </article>
                </div>
                <article class="btnAcred">
                    <?php if( !empty($regioncontenido['pdfage'])){ ?>
                    <ul>
                        <li class="btnAc colorPurple"><a href="<?=$regioncontenido['pdfage'] ?>"
                                target="_blank">AGENDA</a></li>
                    </ul>
                    <?php } ?>
                </article>
            </div>
        </div>
    </div>
</div>