<!--Page Footer-->
<footer class="pageFooter">
    <div class="maxW">

        <ul class="infoFooter">

            <?= view_cell('\App\Libraries\ViewSitio::getFooter') ?>
            <li class="w4">
                <!--Social Networks-->
                <?= view_cell('\App\Libraries\ViewSitio::getRedes') ?>
                <!-- End Social Networks -->
            </li>
        </ul>
        <div class="copyFooter">
            <span class="frase_larga">
                BOGOTÁ AUDIOVISUAL MARKET - BAM, PROIMÁGENES COLOMBIA Y CÁMARA DE COMERCIO DE BOGOTÁ son marcas
                registradas.<br>
                Todos nuestros contenidos están protegidos por el derecho internacional. El uso de este sitio web
                constituye la aceptación de los <a href="/docs/terminos_y_condiciones.pdf" target="_blank">Términos y
                    condiciones de uso.</a><br>
                Consulte nuestra Política de protección de datos personales. Si desea usar información que está
                publicada en este sitio, deberá citar siempre a www.bogotamarket.com como fuente.
            </span>
            <span class="frase_corta">
                Encuentre más informacin sobre el audivisual colombiano en<br>
                <a href="https://www.proimagenescolombia.com" target="_blank">www.proimagenescolombia.com</a>
            </span>
        </div>
    </div>
</footer>
<!--End Page Footer-->
</div>
<!--End Main Wrapper-->
<!--Scripts-->
<!-- <script src="/js/prefixfree.min.js"></script> -->
<script src="/js/jquery-1.12.4.min.js"></script>
<!-- <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js" -->
<!-- integrity="sha256-lSjKY0/srUM9BE3dPm+c4fBo1dky2v27Gdjm2uoZaL0=" crossorigin="anonymous"></script> -->
<script src="/js/jquery-ui.min.js"></script>
<script src="/js/slick.min.js"></script>
<script src="/js/jquery.colorbox-min.js"></script>
<script src="/js/jquery.jplayer.min.js"></script>
<script src="/js/jquery.validate.min.js"></script>
<script src="/js/jquery.comiseo.daterangepicker.min.js"></script>
<script src="/js/interface.js"></script>
<script src="/js/forms.js?v=<?=random_int(100, 99999)?>"></script>
<script src="/js/buscador.js?v=<?=random_int(100, 99999)?>"></script>
<script src="https://www.google.com/recaptcha/api.js?render=6Ld8zdclAAAAACOIC9oW0eUc8En0_FQi52DUZF2r"></script>
<script src="/js/eventos.js?v=<?=random_int(100, 999)?>"></script>

<!--End Scripts-->
<script>
<?= view_cell('\App\Libraries\ViewSitio::getAnallitycs') ?>
</script>


<script>
// grecaptcha.ready(function() {
//     grecaptcha.execute('6Ld8zdclAAAAACOIC9oW0eUc8En0_FQi52DUZF2r', {
//         action: 'submit'
//     }).then(function(token) {
//         // console.log(token);
//         if (document.querySelector('#recapcha-response')) {
//             // console.log('por el if');
//             document.querySelector('#recapcha-response').value = token
//         }
//     });
// });


grecaptcha.ready(function() {
    setInterval(function() {
        // console.log('me estoy ejecutar el recaptcha');
        if (document.querySelector('#recapcha-response')) {
            searrecapcha();
        }
    }, 10000);
});

function searrecapcha() {
    grecaptcha.execute('6Ld8zdclAAAAACOIC9oW0eUc8En0_FQi52DUZF2r', {
        action: 'contact'
    }).then(function(token) {
        if (document.querySelector('#recapcha-response')) {
            console.log("set new token to existing input >> token = " + token);
            document.querySelector('#recapcha-response').value = token
        } else {
            console.error("recaptcha_token does not exist on email_form");
        }
    });

}
</script>


</html>