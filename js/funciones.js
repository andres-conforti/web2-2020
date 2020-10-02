function cargarPagina(){

    function filtrar(id){
        if ( id == " "){
            document.querySelector(".filtro").classList.add("desaparecer");
            let div = document.querySelectorAll(".primero");
            for(let i=0; div.length;i++){
                div[i].classList.remove("desaparecer");
            }
        }
        if ( id == 1 || id == 2 || id == 3 || id == 4){
            let filtro = document.querySelector(".filtro");
            filtro.classList.remove("desaparecer");
            filtro.innerHTML = "<p>chau</p>";
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