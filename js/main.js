(function() {
    "use strict";


    document.addEventListener("DOMContentLoaded", function() {

        var map = L.map('mapa').setView([32.50636, -116.924068], 16);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        L.marker([32.50636, -116.924068]).addTo(map)
            .bindPopup('GLDWebCamp Boletos ya disponibles')
            .openPopup();


        //Campos Datos usuario
        var nombre = document.getElementById('nombre');
        var apellido = document.getElementById('apellido');
        var email = document.getElementById('email');

        //Campos pases
        var pase_dia = document.getElementById('pase_dia');
        var pase_dosdias = document.getElementById('pase_dosdias');
        var pase_completo = document.getElementById('pase_completo');

        //Botones y divs
        var calcular = document.getElementById('calcular');
        var error = document.getElementById('error');
        var btnRegistro = document.getElementById('btnRegistro');
        var resultado = document.getElementById('resultado');
        var suma_total = document.getElementById('suma_total');


        //Extras
        var camisa_evento = document.getElementById('camisa_evento');
        var etiquetas = document.getElementById('etiquetas');

        calcular.addEventListener("click", calcularMontos);
        pase_dia.addEventListener("blur", mostrarDias);
        pase_dosdias.addEventListener("blur", mostrarDias);
        pase_completo.addEventListener("blur", mostrarDias);

        var regalo = document.getElementById('regalo');

        nombre.addEventListener("blur", validarCampos);
        apellido.addEventListener("blur", validarCampos);
        email.addEventListener("blur", validarCampos);
        email.addEventListener("blur", validarEmail);


        function validarCampos() {
            if (this.value == "") {
                error.style.display = "block";
                error.innerHTML = "Este campo es obligatorio";
                this.style.border = "1px solid red";
                error.style.border = "1px solid red";
            } else {
                error.style.display = "none";
                this.style.border = "none";
            }
        }

        function validarEmail() {
            if (this.value.indexOf("@") > -1) {
                error.style.display = "none";
                this.style.border = "none";
            } else {
                error.style.display = "block";
                error.innerHTML = "debe tener almenos una @";
                this.style.border = "1px solid red";
                error.style.border = "1px solid red";

            }
        }

        function calcularMontos(event) {
            event.preventDefault();
            if (regalo.value === "") {
                alert("Debes elegir un regalo");
                regalo.focus();
            } else {
                var boletoDia = parseInt(pase_dia.value, 10) || 0,
                    boleto2Dias = parseInt(pase_dosdias.value) || 0,
                    boletoCompleto = parseInt(pase_completo.value) || 0,
                    cantCamisas = parseInt(camisa_evento.value) || 0,
                    cantEtiquetas = parseInt(etiquetas.value) || 0;
            }

            var TotalPagar = (boletoDia * 30) + (boleto2Dias * 45) + (boletoCompleto * 50) + ((cantCamisas * 10) * .93) + (cantEtiquetas * 2);

            var listadoProductos = [];
            if (boletoDia >= 1) {
                listadoProductos.push(boletoDia + " Pases por dia");
            }
            if (boleto2Dias >= 1) {
                listadoProductos.push(boleto2Dias + " Pases por 2 dia");
            }
            if (boletoCompleto >= 1) {
                listadoProductos.push(boletoCompleto + " Pases Completos");
            }
            if (cantCamisas >= 1) {
                listadoProductos.push(cantCamisas + " Camisas");
            }
            if (cantEtiquetas >= 1) {
                listadoProductos.push(cantEtiquetas + " Etiquetas");
            }

            //resultado = lista_productos//
            resultado.style.display = 'block';
            resultado.innerHTML = '';
            for (var i = 0; i < listadoProductos.length; i++) {
                resultado.innerHTML += listadoProductos[i] + '<br/>';
            }
            suma_total.innerHTML = '$ ' + TotalPagar.toFixed(2);


        }

        function mostrarDias() {
            var boletoDia = parseInt(pase_dia.value, 10) || 0,
                boleto2Dias = parseInt(pase_dosdias.value) || 0,
                boletoCompleto = parseInt(pase_completo.value) || 0;

            var diasElegidos = [];

            if (boletoDia > 0) {
                diasElegidos.push("viernes");
                console.log(diasElegidos);
            }
            if (boleto2Dias > 0) {
                diasElegidos.push("viernes", "sabado");
                console.log(diasElegidos);
            }
            if (boletoCompleto > 0) {
                diasElegidos.push("viernes", "sabado", "domingo");
                console.log(diasElegidos);
            }
            for (var i = 0; i < diasElegidos.length; i++) {
                console.log(diasElegidos[i]);
                document.getElementById(diasElegidos[i]).style.display = "block";
            }

        }

    }); //DOM CONTENT LOADED



})();