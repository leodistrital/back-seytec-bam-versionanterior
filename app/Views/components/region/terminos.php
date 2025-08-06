<div class="maxW">
    <div class="contIntern">
        <div class="gContent">

            <div class="listRegiones">
                <div class="listR">
                    <article class="iRegionesLeft">
                        <h2>Términos y condiciones</h2>
                    </article>
                    <article class="iRegionesRight">
                        <h4><?=$regioncontenido['terminosdesc']?></h4>
                    </article>
                </div>
                <article class="btnAcred">
                    <?php if( !empty($regioncontenido['pdftyc'])){ ?>
                    <ul>
                        <li class="btnAc colorPurple"><a href="<?=$regioncontenido['pdftyc'] ?>"
                                target="_blank">TÉRMINOS Y CONDICIONES</a></li>
                    </ul>
                    <?php } ?>
                </article>
            </div>
        </div>
    </div>
</div>