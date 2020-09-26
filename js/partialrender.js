"use strict";

function cargarPagina() {
    //MENU
    document.querySelector(".btnmenu").addEventListener("click", toggleMenu);

    function toggleMenu() {
        document.querySelector(".navigation").classList.toggle("show");
    }

    //TABLA
    let urlBase = "https://web-unicen.herokuapp.com/api/groups/018alvarezjorge/vencimientos";
    let datos = [];

    function cargarTablas() {

        //--------------------------------INICIAR TABLA-------------------------------
        async function iniciarTabla() {
            let tabla = document.querySelector("#tabla");
            tabla.innerHTML = " ";
            try {
                let r = await fetch(urlBase, {
                    "method": "GET",
                    "mode": "cors",
                });
                let json = await r.json();
                datos = json.vencimientos;
                for (let dato of datos) {
                    insertarFila(dato.thing);
                }
                cargarBotones();
            }
            catch (e) {
                console.log("Fallo en levantar la tabla");
            }
        }

        function insertarFila(fila) {
            document.querySelector("#tabla").innerHTML = document.querySelector("#tabla").innerHTML + "<tr class='estiloTabla'><td>" + fila.impuesto + "</td>" + "<td>" + fila.primervencimiento + "</td>" + "<td>" + fila.segundovencimiento + "</td>" + "<td>" + fila.tercervencimiento + "</td>" + "<td class=btnEdita></td>" + "<td class=btnBorra></td></tr>"; //agrega el bojeto a la lista del DOM
        }

        //-------------------------AGREGAR BOTONES Y EVENTOS------------------
        async function cargarBotones() {
            let btnEditar = document.querySelectorAll(".btnEdita");
            let btnBorrar = document.querySelectorAll(".btnBorra");
            for (let i = 0; i < datos.length; i++) {
                let id = datos[i]._id; // se posiciona en el id a modificar
                let botonBorrar = document.createElement("button");
                botonBorrar.innerText = "x ";
                let botonEditar = document.createElement("button"); // crea un elemento de tipo boton
                botonEditar.innerText = "! ";
                btnBorrar[i].appendChild(botonBorrar); // agrega el boton en la tabla
                btnEditar[i].appendChild(botonEditar);
                btnBorrar[i].addEventListener("click", function () { borraFila(id) });
                btnEditar[i].addEventListener("click", function () { actualizarFila(id) });
            }
        }

        //------------------------------BORRAR FILAS---------------------------
        async function borraFila(id) {
            let url = urlBase + "/" + id;
            try {
                let r = await fetch(url, {
                    "method": "DELETE",
                    "mode": "cors",
                });
                iniciarTabla();
            }
            catch (e) {
                console.log("Fallo el borrado de informacion");
            }
        }

        //-------------------------------EDITAR FILAS----------------------------
        async function actualizarFila(id) {
            document.querySelector(".impuesto").focus();
            let i = buscarID(id);
            if (i != -1) {
                document.querySelector(".impuesto").value = datos[i].thing.impuesto;
                document.querySelector(".primercuit").value = datos[i].thing.primervencimiento;
                document.querySelector(".segundocuit").value = datos[i].thing.segundovencimiento;
                document.querySelector(".tercercuit").value = datos[i].thing.tercervencimiento;
                let btnEdit = document.querySelector("#edit")
                btnEdit.classList.toggle("btnOculto");
                btnEdit.addEventListener("click", function () { editarfila(id) });
                document.querySelector("#agregar").classList.toggle("btnOculto");
                document.querySelector("#auto").classList.toggle("btnOculto");
                document.querySelector("#eliminar").classList.toggle("btnOculto");

            }
        }

        function buscarID(id) {
            let i = 0;
            while (i < datos.length) {
                if (datos[i]._id == id) {
                    return i;
                }
                i++;
            }
            return -1;
        }

        async function editarfila(id) {
            let url = urlBase + "/" + id;
            let nuevafila = {
                "thing": {
                    "impuesto": impuesto.value,
                    "primervencimiento": primervencimiento.value,
                    "segundovencimiento": segundovencimiento.value,
                    "tercervencimiento": tercervencimiento.value,
                }
            };
            try {
                let r = await fetch(url, {
                    "method": "PUT",
                    "headers": { "Content-Type": "application/json" },
                    "body": JSON.stringify(nuevafila),
                });
                iniciarTabla();
                let btnEdit = document.querySelector("#edit")
                btnEdit.classList.toggle("btnOculto");
                document.querySelector("#agregar").classList.toggle("btnOculto");
                document.querySelector("#auto").classList.toggle("btnOculto");
                document.querySelector("#eliminar").classList.toggle("btnOculto");
            }
            catch (e) {
                console.log("Fallo la actulizacion de informacion");
            }
        }

        //---------------------------AGREGAR UNA FILA, DESDE EL FORM-------------------------
        async function agregaUno() {
            let fila = {
                "thing": {
                    "impuesto": impuesto.value,
                    "primervencimiento": primervencimiento.value,
                    "segundovencimiento": segundovencimiento.value,
                    "tercervencimiento": tercervencimiento.value,
                }
            };
            try {
                let r = await fetch(urlBase, {
                    "method": "POST",
                    "headers": { "Content-Type": "application/json" },
                    "body": JSON.stringify(fila),
                });
                iniciarTabla();

            }
            catch (e) {
                console.log("Fallo en cargar datos");
            }
        }

        async function agregaTres() {
            for (let i = 0; i < 3; i++) {
                await agregaUno();
            }
        }

        //-------------------Borra todos los datos de la tabla------------------------
        async function borraTodo() {
            let nodoLista = document.querySelectorAll(".estiloTabla");
            let id;
            try {
                for (let i = 0; i < datos.length; i++) {
                    id = datos[i]._id;
                    eliminaServidor(id);
                    nodoLista[i].remove();
                }
            }
            catch (e) {
                console.log("Error");
            }
        }
        async function eliminaServidor(id) {
            let url = urlBase + "/" + id;
            try {
                let r = await fetch(url, {
                    "method": "DELETE",
                });
            }
            catch (e) {
                console.log("Fallo el borrado de informacion");
            }
        }

        //---------------------------------FILTROS--------------------------------------------------
        let colum1 = document.querySelector(".filtro1");
        colum1.addEventListener("change", function () { filtrar(1, colum1.value) });

        let colum2 = document.querySelector(".filtro2");
        colum2.addEventListener("change", function () { filtrar(2, colum2.value) });

        let colum3 = document.querySelector(".filtro3");
        colum3.addEventListener("change", function () { filtrar(3, colum3.value) });

        function filtrar(columna, valores) {
            restableceTabla();
            let valor = parseInt(valores);
            let nodoTabla = document.querySelectorAll(".estiloTabla");
            for (let i = 0; i < nodoTabla.length; i++) {
                let fecha = nodoTabla[i].getElementsByTagName("td")[columna].innerHTML;
                if (fecha > valor) {
                    let tr = nodoTabla[i];
                    tr.classList.add("filaOculta");
                }
                if (valor == 20) {
                    if (fecha < 11) {
                        let tr = nodoTabla[i];
                        tr.classList.add("filaOculta");
                    }
                }
                if (valor == 31) {
                    if (fecha < 21) {
                        let tr = nodoTabla[i];
                        tr.classList.add("filaOculta");
                    }
                }
            }
            if (valor == 0) {
                restableceTabla();
            }

        }
        function restableceTabla() {
            let nodoTabla = document.querySelectorAll(".estiloTabla");
            let cantidad = nodoTabla.length;
            for (let i = 0; i < cantidad; i++) {
                let tr = nodoTabla[i];
                tr.classList.remove("filaOculta");
            }
        }

        iniciarTabla();

        let nodoAgregaUno = document.querySelector("#agregar"); //boton agregar de a uno
        nodoAgregaUno.addEventListener("click", agregaUno);

        let nodoAgregaTres = document.querySelector("#auto"); //boton agregar de a tres
        nodoAgregaTres.addEventListener("click", agregaTres);

        let nodoBorrarTodo = document.querySelector("#eliminar");
        nodoBorrarTodo.addEventListener("click", borraTodo);

        let impuesto = document.querySelector(".impuesto");
        let primervencimiento = document.querySelector(".primercuit");
        let segundovencimiento = document.querySelector(".segundocuit");
        let tercervencimiento = document.querySelector(".tercercuit");

    }

    //VERIFICACION
    function cargarVerificaciones() {
        function verificarNombre(nombre) {
            if (!nombreValido(nombre.value)) {
                alert('El nombre ingresado no es válido');
                nombre.focus();
                return;
            }
        }

        function nombreValido(nombre) {
            let re = /^[a-zA-ZÑñÁáÉéÍíÓóÚúÜü\s]+$/;
            return re.test(nombre);
        }

        function verificarTelefono(telefono) {
            if (!telefonoValido(telefono.value)) {
                alert('El telefono ingresado no es válido');
                telefono.focus();
                return;
            }
        }

        function telefonoValido(telefono) {
            let re = /^(?:(?:00)?549?)?0?(?:11|[2368]\d)(?:(?=\d{0,2}15)\d{2})??\d{8}$/;
            return re.test(telefono);
        }


        function verificarMail(mail) {
            if (!emailValido(mail.value)) {
                alert('Debe ingresar un email válido');
                mail.focus();
                return;
            }
        }

        function emailValido(mail) {
            let re = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            return re.test(mail);
        }

        let nodoInputNombre = document.querySelector("#inputNombre");
        nodoInputNombre.addEventListener("change", function (e) { verificarNombre(nodoInputNombre) });

        let nodoInputTelefono = document.querySelector("#inputTelefono");
        nodoInputTelefono.addEventListener("change", function (e) { verificarTelefono(nodoInputTelefono) });

        let nodoInputMail = document.querySelector("#inputMail");
        nodoInputMail.addEventListener("change", function (e) { verificarMail(nodoInputMail) });
    }

    //CAPTCHA
    function cargarCaptcha() {
        function randomValores() {
            valor1 = Math.floor((Math.random() * 9) + 1);
            valor2 = Math.floor((Math.random() * 9) + 1);
            operacion = Math.floor((Math.random() * 2) + 1);
            document.querySelector("#imagenCaptcha1").src = "images/nro" + valor1 + ".jpg";
            document.querySelector("#imagenCaptcha2").src = "images/op" + operacion + ".jpg";
            document.querySelector("#imagenCaptcha3").src = "images/nro" + valor2 + ".jpg";
            if (operacion == 1) {
                resultado = valor1 + valor2;
            }
            else {
                resultado = valor1 - valor2;
            }
        }

        function comparaResultadoCaptcha() {
            if (resultado != nodoInputCaptcha.value) {
                alert('El captcha ingresado es incorrecto');
                return;
            }
            else
                nodoBotonEnviarFormulario.classList.remove("deshabilitado");
        }

        let valor1, valor2, operacion, resultado;
        let nodoBotonEnviarCaptcha = document.querySelector("#btnActualizarCaptcha");
        nodoBotonEnviarCaptcha.addEventListener("click", randomValores);
        let nodoInputCaptcha = document.querySelector("#resultadoCaptcha");
        let nodoBotonEnviarFormulario = document.querySelector("#btnContacto");
        nodoInputCaptcha.addEventListener("change", function (e) { comparaResultadoCaptcha() });
        randomValores();
    }

    //PARTIAL RENDER
    async function loadIndex(contacto) {
        let container = document.querySelector("#use-ajax");
        container.innerHTML = "<div class='loading'><h1>Loading...</h1></div>";
        try {
            let response = await fetch("pages/home.html");
            if (response.ok) {
                let t = await response.text()
                container.innerHTML = t;
                cargarVerificaciones();
                cargarCaptcha();
                cargarTablas();
                if (contacto == "contacto") {
                    document.querySelector("#inputNombre").focus();
                }
            }
            else
                container.innerHTML = "<div class='loading'><h1>Error - Failed URL!</h1></div>";
        }
        catch (response) {
            container.innerHTML = "<div class='loading'><h1>Connection error</h1></div>";
        };
    }

    async function loadFaq(event) {
        event.preventDefault();
        let url = event.target.href;
        let container = document.querySelector("#use-ajax");
        container.innerHTML = "<div class='loading'><h1>Loading...</h1></div>";
        try {
            let response = await fetch(url);
            if (response.ok) {
                let t = await response.text()
                container.innerHTML = t;

            }
            else
                container.innerHTML = "<div class='loading'><h1>Error - Failed URL!</h1></div>";
        }
        catch (response) {
            container.innerHTML = "<div class='loading'><h1>Connection error</h1></div>";
        };
    }

    async function loadServicios(event) {
        event.preventDefault();
        let url = event.target.href;
        let container = document.querySelector("#use-ajax");
        container.innerHTML = "<div class='loading'><h1>Loading...</h1></div>";
        try {
            let response = await fetch(url);
            if (response.ok) {
                let t = await response.text()
                container.innerHTML = t;

            }
            else
                container.innerHTML = "<div class='loading'><h1>Error - Failed URL!</h1></div>";
        }
        catch (response) {
            container.innerHTML = "<div class='loading'><h1>Connection error</h1></div>";
        };
    }

    document.querySelector("#indexPartial").addEventListener("click", loadIndex);
    document.querySelector("#faqPartial").addEventListener("click", loadFaq);
    document.querySelector("#serviciosPartial").addEventListener("click", loadServicios);
    document.querySelector("#contactoPartial").addEventListener("click", function () { loadIndex("contacto") });

    loadIndex();

}
document.addEventListener("DOMContentLoaded", cargarPagina);


