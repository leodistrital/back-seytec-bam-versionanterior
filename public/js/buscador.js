$(document).ready(function () {
	let actividad = document.querySelector("#actividad");
	let paisResidencia = document.querySelector("#paisResidencia");
	let txtsearch = document.querySelector("#txtsearch");
	let orgonizador = document.querySelector("#orgonizador");
	let descargarResultados = document.querySelector("#descargar-resultados");
	let resentResultados = document.querySelector("#resent-resultados");
	let formbuscador = document.querySelector("#formsearch");

	if (formbuscador) {
		actividad.addEventListener("change", function (event) {
			console.log(actividad.value);
			document.querySelector("#sector").value = actividad.value;
			enviarformsearch();
		});

		orgonizador.addEventListener("change", function (event) {
			console.log(orgonizador.value);
			document.querySelector("#porganizar").value = orgonizador.value;
			enviarformsearch();
		});

		paisResidencia.addEventListener("change", function (event) {
			console.log(paisResidencia.value);
			document.querySelector("#paisform").value = paisResidencia.value;
			enviarformsearch();
		});

		document.addEventListener("keyup", function (event) {
			if (event.keyCode === 13) {
				console.log(txtsearch.value);
				toggleLoading("open");
				document.querySelector("#textoform").value = txtsearch.value;
				document.querySelector("#letra").value = "";
				document.querySelector("#pagina").value = "";
				document.querySelector("#sector").value = "";
				document.querySelector("#paisform").value = "";
				setTimeout(() => {
					enviarformsearch();
				}, "500");
			}
		});

		if (descargarResultados) {
			descargarResultados.addEventListener("click", function (event) {
				console.log("inicia descarga");
			});
		}

		resentResultados.addEventListener("click", function (event) {
			console.log("se resetea");
			ruta = window.location.href;
			window.location.replace(ruta);
		});
	}
});

function paginar(dato) {
	console.log("pagina", dato);
	document.querySelector("#pagina").value = dato;
	enviarformsearch();
}

function cambioletra(dato) {
	toggleLoading("open");
	console.log("letra", dato);
	document.querySelector("#letra").value = dato;
	document.querySelector("#textoform").value = "";
	document.querySelector("#pagina").value = "";
	document.querySelector("#sector").value = "";
	document.querySelector("#paisform").value = "";
	setTimeout(() => {
		enviarformsearch();
	}, "5000");
	// enviarformsearch();
}

function enviarformsearch() {
	document.querySelector("#formsearch").submit();
}
