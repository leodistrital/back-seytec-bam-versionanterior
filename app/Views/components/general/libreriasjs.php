 <script>
function sendLogin(frm) {
    if (frm.usuario.value == '' || frm.password.value == '') {
        window.alert('Usuario o contraseï¿½a no vï¿½lidos, por favor intentar de nuevo.');
        return (false);
    }
    var url = frm.action;
    var data = {
        usuario: MD5(frm.usuario.value),
        password: MD5(frm.password.value)
    };
    $.ajax({
        type: "POST",
        url: url,
        data: data,
        success: function(data) {
            console.log(data);
            if (data.ok == 1) {
                frm.reset();
                window.location.href = '/panel';
            } else {
                if (frm.usuario.focus) frm.usuario.focus();
                window.alert(
                    'Usuario o contraseï¿½a no vï¿½lidos, por favor intentar de nuevo.');
            }
        }
    });

    return (false);
}
 </script>
 <!--Librerias-->
 <script src="/js/prefixfree.min.js"></script>
 <script src="/js/jquery-1.12.1.min.js"></script>
 <script src="/js/jquery-ui.min.js"></script>
 <script src="/js/slick.min.js"></script>
 <script src="/js/jquery.colorbox-min.js"></script>
 <script src="/js/jquery.mCustomScrollbar.concat.min.js"></script>
 <script src="/js/jquery.validate.min.js"></script>
 <script src="/js/interface.js"></script>
 <script src="/js/forms.js"></script>
 <script src="/js/formulario.js"></script>
 <script src="/js/preguntas.js"></script>
 <script src="/js/md5.js"></script>
 <script src="https://www.google.com/recaptcha/api.js?render=6Ld8zdclAAAAACOIC9oW0eUc8En0_FQi52DUZF2r"></script>

 <script>
function activarmenu(idele) {
    const elements = document.querySelectorAll(".groupyear");
    elements.forEach(function(element) {
        //console.log(element)
        element.classList.add("menuhidden");
    });

    // console.log(idele)
    var element = document.getElementById(idele);
    element.classList.toggle("menuhidden");
}
 </script>
 <!--Fin Librerias-->s