function cargarPagina(){

    function filtrar(id){
        if ( id == " "){
            document.querySelector(".filtro").classList.add("desaparecer");
            let div = document.querySelectorAll(".primero");
            for(let i=0; div.length;i++){
                div[i].classList.remove("desaparecer");
            }
        }
        if ( id > 0){ //condicion de prueba
            // como hacemos para pasarle devolver la ID como $categoria
            let filtro = document.querySelector(".filtro");
            filtro.classList.remove("desaparecer");
            
            let div = document.querySelectorAll(".primero");
            for(let i=0; div.length;i++){
                div[i].classList.add("desaparecer");
                
            }
        }
        console.log(id)
    }
    let select = document.querySelector(".filtroCategoria");
    select.addEventListener("change",function () { filtrar( select.value) });
    
}
document.addEventListener("DOMContentLoaded", cargarPagina);