"use strict"

let app = new Vue({
    el: '#vue-comentarios',
    data: {
        comments: [], // esto es como un assign de smarty
    }, 
});

document.addEventListener('DOMContentLoaded', () => {
    
    getComentario();


    //agregar comentario
    document.querySelector('.btn-primary').addEventListener('submit', e => {
        e.preventDefault();
        AgregarComment();
    });

});


function GetComments() {
    fetch('api/comentarios')
        .then(response => response.json())
        .then(comentarios => {app.comments = comentarios})
        
        .catch(error => console.log(error));
}

function getComentario() {
    let id = window.location.pathname.split('/')[3]; //id del producto  
    fetch("api/comentarios/" + id) //comentarios/:ID
    .then(response => response.json())
    .then(comments => {
        app.comments = comments; // similar a $this->smarty->assign("tasks", $tasks)
    })
    .catch(comments => {
        app.comments = comments});
}



function AgregarComment() {

    // armo la tarea
    const coment = {
       
        idServicio: window.location.pathname.split('/')[3],
        idUsuario: document.querySelector('input[name=idUsuario]').value,
        texto: document.querySelector('textarea[name=texto]').value,
        puntaje: document.querySelector('select[name=puntaje]').value

    }
    console.log(coment);

    fetch('api/comentarios', {
        method: 'POST',
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(coment)
    })
        .then(response => {getComentario()})
        
        .catch(error => console.log(error));



}
