function cargarPagina(){
    console.log("HOLA");
    
    function ControlDatos(nodoinput){
        if(nodoinput.value == ""){
            alert("Completar todos los campos");
        }

    }
    let inputnombre = document.querySelector(".servicioNombre");
    inputnombre.addEventListener("blur",function(e){ControlDatos(inputnombre)});
    let inputhonorarios = document.querySelector(".honorarios");
    inputhonorarios.addEventListener("blur",function(e){ControlDatos(inputhonorarios)});
    let inputdescripcion = document.querySelector(".descripcion");
    inputdescripcion.addEventListener("blur",function(e){ControlDatos(inputdescripcion)});
    let selectcategoria = document.querySelector(".filtroCategoria");
    selectcategoria.addEventListener("blur",function(e){ControlDatos(selectcategoria)});
    
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

    let nodoInputMail = document.querySelector("#inputMail");
    nodoInputMail.addEventListener("change", function (e) { verificarMail(nodoInputMail) });


}
document.addEventListener("DOMContentLoaded", cargarPagina);