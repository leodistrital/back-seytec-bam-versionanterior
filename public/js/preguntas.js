
function openPreg() {
  document.getElementById("preguntas").style.display = "block";
}

function closePreg() {
  document.getElementById("preguntas").style.display = "none";
}

function sendQuestion(frm) {
	if(!frm.terms.checked){
		window.alert("Debe por favor aceptar los t\xE9rminos.");
		return;
	}
	
	if(frm.correo.value=="" || !validateEmail(frm.correo.value)){
		window.alert("Por favor ingrese un correo v\xE1lido.");
		return;
	}

	if(frm.comentarios.value.replace(/ /g, '') ==''){
		window.alert("Por favor ingrese sus comentarios");
		return;
	}

	console.log(frm);
	var url = frm.action;
	$.ajax({
		type: "POST",
		url: url,
		data: serialize(frm),
		success: function(data) {
			console.log(data);
			window.alert('Gracias por comunicarte con nosotros.');
			frm.reset();
			closePreg();
		}
	});
}


function sendDxUsuarioIn(frm) {
	window.alert("a ver si funciona por aqui");
	return;
}

function serialize (form) {
    if (!form || form.nodeName !== "FORM") {
            return;
    }
    var i, j, q = [];
    for (i = form.elements.length - 1; i >= 0; i = i - 1) {
        if (form.elements[i].name === "") {
            continue;
        }
        switch (form.elements[i].nodeName) {
            case 'INPUT':
                switch (form.elements[i].type) {
                    case 'text':
                    case 'tel':
                    case 'email':
                    case 'hidden':
                    case 'password':
                    case 'button':
                    case 'reset':
                    case 'submit':
                        q.push(form.elements[i].name + "=" + encodeURIComponent(form.elements[i].value));
                        break;
                    case 'checkbox':
                    case 'radio':
                        if (form.elements[i].checked) {
                                q.push(form.elements[i].name + "=" + encodeURIComponent(form.elements[i].value));
                        }
                        break;
                }
                break;
                case 'file':
                break;
            case 'TEXTAREA':
                    q.push(form.elements[i].name + "=" + encodeURIComponent(form.elements[i].value));
                    break;
            case 'SELECT':
                switch (form.elements[i].type) {
                    case 'select-one':
                        q.push(form.elements[i].name + "=" + encodeURIComponent(form.elements[i].value));
                        break;
                    case 'select-multiple':
                        for (j = form.elements[i].options.length - 1; j >= 0; j = j - 1) {
                            if (form.elements[i].options[j].selected) {
                                    q.push(form.elements[i].name + "=" + encodeURIComponent(form.elements[i].options[j].value));
                            }
                        }
                        break;
                }
                break;
            case 'BUTTON':
                switch (form.elements[i].type) {
                    case 'reset':
                    case 'submit':
                    case 'button':
                        q.push(form.elements[i].name + "=" + encodeURIComponent(form.elements[i].value));
                        break;
                }
                break;
            }
        }
    return q.join("&");
}

function validateEmail(email) {
  var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(String(email).toLowerCase());
}

