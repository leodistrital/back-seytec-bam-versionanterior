// Forms
$(document).ready(function () {
	validateFormContacto();
	validateFormRegistro();
	validateEditRegistro();
	validateEditRegistrorecuperar();
	validateFormActivacion();
	validateFormRecordar();
	validateFormLogin();
	validateFormInsPaso1();
	validateFormInsPaso2();
	validateFormInsPaso3();
	validateFormInsPaso4();
	validateFormInsPaso5();
	validateDesceunto();
	validatefavoritos();

	favinit();
	// $todos = document.querySelectorAll(".favoff");
	// validatetest();
});

function favinit() {
	// const botons = document.querySelectorAll(".favoff");
	// Agregar listener
	// boton.addEventListener("click", function (evento) {
	// 	console.log("El evento es: ", evento);
	// 	console.table(evento);
	// });
	const botones = document.querySelectorAll(".favoff");
	// Definir función y evitar definirla de manera anónima
	const cuandoSeHaceClick = function (evento) {
		// Recuerda, this es el elemento
		console.log(this.id);
		// this.classList.toggle("cboxElement");
		// Podemos cambiar cualquier cosa, p.ej. el estilo
		// this.style.borderColor = "blue";
	};
	// botones es un arreglo así que lo recorremos
	botones.forEach((boton) => {
		//Agregar listener
		boton.addEventListener("click", cuandoSeHaceClick);
	});
}

// Form  favoritosp
function validatefavoritos() {
	// console.log(this);
	var formContacto = $("#lisrafaoritosForm");
	// console.log("por favortios");
	// debugger;
	// console.log(formContacto);
	// return false;
	if (formContacto.length) {
		formContacto.validate({
			rules: {
				fav: "required",
				// nombrelista: "required",
			},
			submitHandler: function (form) {
				// toggleLoading("open"); //Abrir loading
				// console.log("peticion post");
				$.ajax({
					type: "POST",
					url: "/panel/listafovortos",
					data: new FormData(form),
					cache: false,
					contentType: false,
					processData: false,
					beforeSend: function () {
						// toggleLoading("open");
					},
					error: function () {
						// alert(2);
						// toggleLoading("close");
					},
				}).done(function (result) {
					// console.log("alfo");
					console.log(result);
					// return false;
					if (result != "") {
						toggleLoading("close");
						console.log("entro al uno", result);
						let estrella = document.querySelector(result);
						console.log(estrella);
						// document.querySelector(result).src =
						// 	"/images/site/ico_estrella_guia_on.png";
						
						closeAlert();
					}
				});
			},
		});
	}
}

function validateDesceunto() {
	// console.log("validadndo recordar");
	var formC = $("#formdescuento");
	// console.log(formC);
	// debugger;
	// return false;
	if (formC.length) {
		formC.validate({
			errorElement: "p",
			rules: {
				coddescuento: {
					required: true,
				},
			},
			submitHandler: function (form) {
				$.ajax({
					type: "POST",
					url: "/panel/descuento",
					data: new FormData(form),
					cache: false,
					contentType: false,
					processData: false,
					beforeSend: function () {
						toggleLoading("open");
					},
					error: function () {
						toggleLoading("close");
					},
				}).done(function (result) {
					toggleLoading("close");
					// console.log( );
					let { data } = result;
					console.log(data.result);
					// return false;
					if (data.result == 1) {
						let tituloAlerta = "Descuento aplicado";
						let text = "<p>Descuento aplicado exitosamente</p>";
						$.createAlert({
							title: tituloAlerta,
							content: text,
							closeButton: false,
							acceptButton: true,
							cancelButton: false,
							onAccept: function () {
								window.location.href = "/panel";
							},
						});
					} else {
						let tituloAlerta = "Código No valido";
						let text = "<p>El código no es válido.</p>";
						console.log("si es esta ventana");
						$.createAlert({
							title: tituloAlerta,
							content: text,
							// closeButton: true,
							acceptButton: false,
							cancelButton: true,
							labelCancel: "Continuar",
						});
					}
				});
			},
		});
	}
}

// Form login
function validateFormContacto() {
	var formContacto = $("#formContacto");
	if (formContacto.length) {
		formContacto.validate({
			rules: {
				asu: "required",
				area: "required",
				nom: "required",
				ape: "required",
				email: { required: true, email: true },
				ciud: "required",
				msn: "required",
			},
			submitHandler: function (form) {
				$.ajax({
					type: "POST",
					url: "verificar/login.php",
					data: new FormData(form),
					cache: false,
					contentType: false,
					processData: false,
					beforeSend: function () {
						toggleLoading("open");
					},
					error: function () {
						toggleLoading("close");
					},
				}).done(function (result) {
					var result = result.trim();
					if (result == "0") {
						window.location = "panel.php";
					} else {
						toggleLoading("close");
						var tituloAlerta = "NotificaciÃ³n";
						var textoAlerta =
							"<p>Este usuario no se ha registrado aÃºn en 2023 o los datos ingresados no son correctos.</p>";
						$.createAlert({
							title: tituloAlerta,
							content: textoAlerta,
							closeButton: false,
							acceptButton: true,
							cancelButton: false,
							onAccept: function () {
								closeAlert();
							},
						});
					}
				});
				// submitHandler: function (form) {
				// 	toggleLoading("open"); //Abrir loading
				// 	var title = "Confirmación",
				// 		text = "<p>Su mensaje fue enviado.</p>";
				// 	$.createAlert({
				// 		title: title,
				// 		content: text,
				// 		closeButton: true,
				// 		acceptButton: true,
				// 		// cancelButton: true,
				// 		onAccept: function () {
				// 			clearForm(formContacto);
				// 			closeAlert();
				// 		},
				// 	});
			},
		});
	}
}

// Form registro
function validateFormRegistro() {
	var formContacto = $("#formregistro");
	// debugger;
	if (formContacto.length) {
		formContacto.validate({
			rules: {
				nombre: "required",
				apellido: "required",
				email: {
					required: true,
					email: true,
					remote: {
						url: "/verificar/email",
						type: "post",
						data: {
							emails: function () {
								return $("#email").val();
							},
							recapcha: function () {
								return $("#recapcha-response").val();
							},
						},
					},
				},
				emailconfirm: {
					required: true,
					email: true,
					equalTo: "#email",
				},
				password: {
					required: true,
					minlength: 8,
				},
				passwordconfirm: {
					required: true,
					equalTo: "#password",
				},
				acepto: {
					required: true,
				},
			},

			messages: {
				email: {
					remote: "* Este correo ya está en uso",
				},
			},
			submitHandler: function (form) {
				// toggleLoading("open"); //Abrir loading
				// console.log("peticion post");
				$.ajax({
					type: "POST",
					url: "registro",
					data: new FormData(form),
					cache: false,
					contentType: false,
					processData: false,
					beforeSend: function () {
						toggleLoading("open");
					},
					error: function () {
						// alert(2);
						toggleLoading("close");
					},
				}).done(function (result) {
					toggleLoading("close");
					let { correo, error } = result.data;
					if (error == 0) {
						let tituloAlerta = "Codigo de activación";
						let texto =
							"¡Bienvenido a su cuenta en www.bogotamarket.com! Para continuar su proceso de registro, encontrará su código de verificación en el correo electrónico";
						$.createAlert({
							title: tituloAlerta,
							content: texto,
							closeButton: false,
							acceptButton: true,
							cancelButton: false,
							onAccept: function () {
								window.location.href =
									"/registro/activacion/" + correo;
							},
						});
					}
				});
			},
		});
	}
}

// Form registro edicion
function validateEditRegistro() {
	var formContacto = $("#formregistroeditar");
	// debugger;
	if (formContacto.length) {
		formContacto.validate({
			rules: {
				nombre: "required",
				apellido: "required",
				password: {
					required: true,
					minlength: 8,
				},
				passwordconfirm: {
					required: true,
					equalTo: "#password",
				},
			},
			messages: {
				email: {
					remote: "* Este correo ya está en uso",
				},
			},
			submitHandler: function (form) {
				// toggleLoading("open"); //Abrir loading
				// console.log("peticion post");
				$.ajax({
					type: "POST",
					url: "/panel/registro",
					data: new FormData(form),
					cache: false,
					contentType: false,
					processData: false,
					beforeSend: function () {
						toggleLoading("open");
					},
					error: function () {
						// alert(2);
						toggleLoading("close");
					},
				}).done(function (result) {
					// return false;
					toggleLoading("close");
					let { correo, error } = result.data;
					if (error == 0) {
						let tituloAlerta = "Transacción Exitosa";
						let texto = "La información se guardo existosamente ";
						$.createAlert({
							title: tituloAlerta,
							content: texto,
							closeButton: false,
							acceptButton: true,
							cancelButton: false,
							onAccept: function () {
								window.location.href = "/panel";
							},
						});
					}
				});
			},
		});
	}
}

// Form recuperar
function validateEditRegistrorecuperar() {
	var formContacto = $("#formrrecuperar");
	// debugger;
	if (formContacto.length) {
		formContacto.validate({
			rules: {
				password: {
					required: true,
					minlength: 8,
				},
				passwordconfirm: {
					required: true,
					equalTo: "#password",
				},
			},
			messages: {
				email: {
					remote: "* Este correo ya está en uso",
				},
			},
			submitHandler: function (form) {
				// toggleLoading("open"); //Abrir loading
				// console.log("peticion post");
				$.ajax({
					type: "POST",
					url: "/registro/recuperar",
					data: new FormData(form),
					cache: false,
					contentType: false,
					processData: false,
					beforeSend: function () {
						toggleLoading("open");
					},
					error: function () {
						// alert(2);
						toggleLoading("close");
					},
				}).done(function (result) {
					toggleLoading("close");
					let { correo, error } = result.data;
					if (error == 0) {
						let tituloAlerta = "Transacción Exitosa";
						let texto = "La información se guardo existosamente ";
						$.createAlert({
							title: tituloAlerta,
							content: texto,
							closeButton: false,
							acceptButton: true,
							cancelButton: false,
							onAccept: function () {
								window.location.href = "/";
							},
						});
					}
				});
			},
		});
	}
}

// Form activacion
function validateFormActivacion() {
	// console.log("validadndo");<
	// return false;
	var formC = $("#formactivacion");
	if (formC.length) {
		formC.validate({
			rules: {
				emailactivacion: "required",
				nombre: "required",
				codigoverifiicacion: {
					required: true,
				},
			},
			submitHandler: function (form) {
				// toggleLoading("open"); //Abrir loading
				// console.log("peticion post");
				$.ajax({
					type: "POST",
					url: "/registro/activacion",
					data: new FormData(form),
					cache: false,
					contentType: false,
					processData: false,
					beforeSend: function () {
						toggleLoading("open");
					},
					error: function () {
						toggleLoading("close");
					},
				}).done(function (result) {
					toggleLoading("close");
					let { correo, error } = result.data;
					// console.log(data);
					// return false;
					if (error == 0) {
						let tituloAlerta = "Activación";
						let text = "<p>Su cuenta fue confirmada con exito.</p>";
						$.createAlert({
							title: tituloAlerta,
							content: text,
							closeButton: false,
							acceptButton: true,
							cancelButton: false,
							onAccept: function () {
								window.location.href =
									"https://bogotamarket.com/";
							},
						});
					} else {
						let tituloAlerta = "Activación";
						let text = "<p>El código no corresponde.</p>";
						$.createAlert({
							title: tituloAlerta,
							content: text,
							closeButton: false,
							acceptButton: false,
							cancelButton: true,
						});
					}
				});
			},
		});
	}
}

function validateFormRecordar() {
	// console.log("validadndo recordar");
	var formC = $("#recordarPass");
	// console.log(formC);
	// debugger;
	// return false;
	if (formC.length) {
		formC.validate({
			errorElement: "p",
			rules: {
				direrepass: {
					required: true,
					email: true,
				},
				direrepassonfirm: {
					required: true,
					email: true,
					equalTo: "#direrepass",
				},
			},
			submitHandler: function (form) {
				$.ajax({
					type: "POST",
					url: "/registro/olvide",
					data: new FormData(form),
					cache: false,
					contentType: false,
					processData: false,
					beforeSend: function () {
						toggleLoading("open");
					},
					error: function () {
						toggleLoading("close");
					},
				}).done(function (result) {
					toggleLoading("close");
					console.log(result.data);
					let { codigo, data } = result;
					console.log(codigo);
					// return false;
					if (codigo == 200) {
						let tituloAlerta = "Recuparar Contraseña";
						let text = "<p>El link fue enviado.</p>";
						$.createAlert({
							title: tituloAlerta,
							content: text,
							closeButton: false,
							acceptButton: true,
							cancelButton: false,
							onAccept: function () {
								window.location.href =
									"https://bogotamarket.com/";
							},
						});
					} else {
						let tituloAlerta = "Recuparar Contraseña";
						let text = "<p>Error en el envio.</p>";
						$.createAlert({
							title: tituloAlerta,
							content: text,
							closeButton: false,
							acceptButton: false,
							cancelButton: true,
						});
					}
				});
			},
		});
	}
}
// Form suscripcion
function validateFormSuscripcion() {
	var formSuscripcion = $("#formSuscripcion");
	if (formSuscripcion.length) {
		formSuscripcion.validate({
			rules: {
				email: { required: true, email: true },
				"susc[]": "required",
				term: "required",
			},
			messages: {
				"susc[]": "* Debe seleccionar por lo menos una suscripción.",
			},
			submitHandler: function (form) {
				toggleLoading("open"); //Abrir loading
				var title = "Suscripción",
					text =
						"<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec dictum elit lorem. Ut nec ullamcorper lectus. Cras interdum maximus dictum. Nullam et bibendum turpis, vel elementum diam. Proin dictum eu felis nec dignissim. Pellentesque consectetur semper augue.</p>";
				$.createAlert({
					title: title,
					content: text,
					closeButton: false,
					acceptButton: true,
					cancelButton: false,
					onAccept: function () {
						clearForm(formSuscripcion);
						closeAlert();
					},
				});
			},
		});
	}
}

// // Form login
function validateFormLogin() {
	var formLogin = $("#formLogin");
	if (formLogin.length) {
		formLogin.validate({
			errorElement: "span",
			errorPlacement: function (error, element) {
				error.appendTo(element.parents("p"));
			},
			rules: {
				lemail: {
					required: true,
					email: true,
				},
				lpass: "required",
			},
			submitHandler: function (form) {
				$.ajax({
					type: "POST",
					url: "/registro/login",
					data: new FormData(form),
					cache: false,
					contentType: false,
					processData: false,
					beforeSend: function () {
						toggleLoading("open");
					},
					error: function () {
						toggleLoading("close");
					},
				}).done(function (result) {
					let { codigo, data } = result;
					console.log(codigo);
					if (data.login == "1") {
						window.location = "/panel";
						// window.location = "/";
						// location.reload();
					} else {
						toggleLoading("close");
						var tituloAlerta = "Error";
						var textoAlerta = "<p>Los datos no coinciden</p>";
						$.createAlert({
							title: tituloAlerta,
							content: textoAlerta,
							closeButton: false,
							acceptButton: true,
							cancelButton: false,
							onAccept: function () {
								closeAlert();
							},
						});
					}
				});
			},
		});
	}
}

// //Form inscripcion participante

function validateFormInsPaso1() {
	// console.log("paso entro");
	var formInsParticipante = $("#formpaso1");
	if (formInsParticipante.length) {
		// formInsParticipante[0].reset();
		formInsParticipante.validate({
			rules: {
				formPart: "required",
				nombre: "required",
				apellido: "required",
				tipodocumento: "required",
				numdocumento: {
					required: true,
					number: true,
				},
				paisresidencia: "required",
				ciudadresidencia: "required",
				apellido: "required",
				nacionalidad: "required",
				nacimientofecha: "required",
				estrato: "required",
				sexo: "required",
				identidad: "required",
				nacimientofecha: "required",
				dirresidencia: "required",
				grupoetnia: "required",
			},
			submitHandler: function (form) {
				$.ajax({
					type: "POST",
					url: "/panel/acreditacion/1",
					data: new FormData(form),
					cache: false,
					contentType: false,
					processData: false,
					beforeSend: function () {
						toggleLoading("open");
					},
					error: function () {
						toggleLoading("close");
					},
				}).done(function (result) {
					toggleLoading("close");
					console.log(result);
					// alert("enviado");
					window.location.href = "/panel/acreditacion/2";
				});
			},
		});
	}
}

function validateFormInsPaso2() {
	var formInsParticipante = $("#formpaso2");
	if (formInsParticipante.length) {
		formInsParticipante[0].reset();
		formInsParticipante.validate({
			rules: {
				mailcontacto: { required: true, email: true },
				confMail: {
					required: true,
					email: true,
					equalTo: "#mailcontacto",
				},
				indicativo: "required",
				mencionepaises: "required",

				telefono: {
					required: true,
					number: true,
				},
				telefonopublicacion: {
					number: true,
				},
				idioma: "required",
				partifiporegiones: "required",
				sectoractividad: "required",

				// perfilinteres: "required",
				"intereses[]": {
					required: true,
					maxlength: 3,
				},
				"territorio[]": {
					required: true,
					maxlength: 3,
				},

				otrointeres: {
					// required: true,
					maxlength: 500,
				},
				mencionepaises: {
					required: true,
					maxlength: 500,
				},
				perfilinteres: {
					required: true,
					maxlength: 500,
				},
				correopublicacion: { required: true, email: true },
			},
			submitHandler: function (form) {
				$.ajax({
					type: "POST",
					url: "/panel/acreditacion/2",
					data: new FormData(form),
					cache: false,
					contentType: false,
					processData: false,
					beforeSend: function () {
						toggleLoading("open");
					},
					error: function () {
						toggleLoading("close");
					},
				}).done(function (result) {
					toggleLoading("close");
					console.log(result);
					// alert("enviado");
					window.location.href = "/panel/acreditacion/3";
				});
			},
		});
	}
}

function validateFormInsPaso3() {
	var formInsParticipante = $("#formpaso3");
	if (formInsParticipante.length) {
		formInsParticipante[0].reset();
		formInsParticipante.validate({
			rules: {
				nombreempresa: "required",
				nit: "required",
				cargoempresa: "required",
				direccionempresa: "required",
				telefonoempresa: "required",
				paisempresa: "required",

				correoempresa: "required",
				telefonoempresa: "required",
				ciudadempresa: "required",
				webempresa: {
					required: true,
					maxlength: 500,
				},
				"actividad[]": {
					required: true,
					maxlength: 3,
				},
			},
			submitHandler: function (form) {
				$.ajax({
					type: "POST",
					url: "/panel/acreditacion/3",
					data: new FormData(form),
					cache: false,
					contentType: false,
					processData: false,
					beforeSend: function () {
						toggleLoading("open");
					},
					error: function () {
						toggleLoading("close");
					},
				}).done(function (result) {
					toggleLoading("close");
					console.log(result);
					// alert("enviado");
					window.location.href = "/panel/acreditacion/4";
				});
			},
		});
	}
}

function validateFormInsPaso4() {
	var formInsParticipante = $("#formpaso4");
	// console.log("entro");
	// return false;
	if (formInsParticipante.length) {
		formInsParticipante[0].reset();
		formInsParticipante.validate({
			rules: {
				fotoacreditacion: {
					required: true,
					extension: "jpg|jpeg|png|pdf",
				},
				certificadovinculo: {
					required: true,
					extension: "jpg|jpeg|png|pdf",
				},
				certificadoexistencia: {
					required: true,
					extension: "jpg|jpeg|png|pdf",
				},
			},
			submitHandler: function (form) {
				$.ajax({
					type: "POST",
					url: "/panel/acreditacion/4",
					data: new FormData(form),
					cache: false,
					contentType: false,
					processData: false,
					beforeSend: function () {
						toggleLoading("open");
					},
					error: function () {
						toggleLoading("close");
					},
				}).done(function (result) {
					toggleLoading("close");
					console.log(result);
					// alert("enviado");
					window.location.href = "/panel/acreditacion/5";
				});
			},
		});
	}
}

function validateFormInsPaso5() {
	var formInsParticipante = $("#formpaso5");
	if (formInsParticipante.length) {
		formInsParticipante[0].reset();
		formInsParticipante.validate({
			rules: {
				acepto: "required",
			},
			submitHandler: function (form) {
				$.ajax({
					type: "POST",
					url: "/panel/acreditacion/5",
					data: new FormData(form),
					cache: false,
					contentType: false,
					processData: false,
					beforeSend: function () {
						toggleLoading("open");
					},
					error: function () {
						toggleLoading("close");
					},
				}).done(function (result) {
					toggleLoading("close");
					console.log(result);
					// alert("enviado");
					window.location.href = "/panel";
				});
			},
		});
	}
}

//Limpiar form
function clearForm(gForm) {
	var validator = gForm.validate();
	validator.resetForm();
	gForm[0].reset();
}

//Formato general errores
$.validator.setDefaults({
	ignore: "input[type=hidden]",
	// ignore: ".ignore",
	errorElement: "span",
	errorPlacement: function (error, element) {
		error.appendTo(element.parents("p"));
	},
});

//Mensajes generales forms
$.extend($.validator.messages, {
	required: "* Campo obligatorio.",
	// remote: "* Captcha no válido.",
	email: "* Correo no válido.",
	url: "* URL no válida.",
	date: "* Fecha no válida.",
	dateISO: "* Fecha (ISO) no válida.",
	number: "* Sólo números.",
	digits: "* Sólo dígitos.",
	creditcard: "* Número de tarjeta no válido.",
	equalTo: "* Ingresa el mismo valor.",
	extension: "* Extensión no válida.",
	maxlength: $.validator.format("* Máximo {0} caracteres."),
	minlength: $.validator.format("* Mínimo {0} caracteres."),
	rangelength: $.validator.format("* Valor entre {0} y {1} caracteres."),
	range: $.validator.format("* Valor entre {0} y {1}."),
	max: $.validator.format("* Valor menor o igual a {0}."),
	min: $.validator.format("* Valor mayor o igual a {0}."),
	nifES: "* NIF no válido.",
	nieES: "* NIE no válido.",
	cifES: "* CIF no válido.",
	time12h: "* Formato de hora no válido.",
});
