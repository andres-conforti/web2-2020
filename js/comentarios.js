"use strict"
const el = document.querySelector('#data');


let app = new Vue({
    el: '#vue-comentarios',
    data: {
        comments: [], // esto es como un assign de smarty
        admin : el.dataset.isAdmin,
    }, 

});



document.addEventListener('DOMContentLoaded', () => {
    
    getComentario();
    document.querySelector('#btn-borrar').addEventListener('click', e=>{borrarComment();})

    //agregar comentario
    document.querySelector('.btn-primary').addEventListener('click', e => {
        e.preventDefault();
        AgregarComment();
    });
    
});


function getComentario() {
    let id = window.location.pathname.split('/')[3]; //id del producto  
    fetch('api/comentarios/' + id) //comentarios
    .then(response => response.json())
    .then(comments => {
        app.comments = comments; // similar a $this->smarty->assign("tasks", $tasks)
    })
    .catch(comments => {
        app.comments = comments});
}

function borrarComment(id){
    fetch("api/comentarios/" + id, {
        method: 'DELETE',
    })
     .then(response => { getComentario();})
     .catch(error => console.log(error));
}

function AgregarComment() {
    

    // armo la tarea
    let coment = {
       
        id_servicio: el.dataset.serv,
        id_user: el.dataset.user,
        texto: document.querySelector('#input-text').value,
        puntaje: document.querySelector('#select-puntaje').value

    }

    fetch('api/comentarios', {
        method: 'POST',
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(coment)
    })
        .then(response => {getComentario()})

        .catch(error => console.log(error));


}
