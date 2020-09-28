function cargarPagina(){

    function Filtrar(id){
        document.querySelector(".primero").innerHTML;
        
    }
    let select = document.querySelector(".filtroCategoria")
    select.addEventListener("change",Filtrar(select.value))
}
document.addEventListener("DOMContentLoaded", cargarPagina);