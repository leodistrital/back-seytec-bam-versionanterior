<div class="maxW">
    <div class="contIntern">
        <div class="gContent">
            <div class="contFAQ">
                <!--Acordion Faq-->
                <?php foreach ($faqs as $faq) :  ?>
                    <div class="accordion-wrap">
                        <div class="accordion-item">
                            <p class="accordion-header"><?= $faq['pregunta'] ?>
                                <span class="arrow left"></span>
                            </p>
                        </div>
                        <div class="accordion-text">
                            <p><?= $faq['respuesta'] ?></p>
                        </div>
                    </div>
                <?php endforeach;  ?>
                <!--End Acordion Faq-->
            </div>
        </div>
    </div>
</div>