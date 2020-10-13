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
    
}
document.addEventListener("DOMContentLoaded", cargarPagina);