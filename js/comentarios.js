"use strict"

let app = new Vue({
    el: '#vue-comentarios',
    data: {
        comments: [], // esto es como un assign de smarty
        admin : document.querySelector('#isAdmin').value,
        auth : true,
    }, 

    methods: {
        del: function (id) { //id del comentario, no del servicio
          fetch("api/comentarios/" + id, {
              method: 'DELETE',
           })
           .then(response => { getComentario();})
           .catch(error => console.log(error));
         }
      }
    });


document.addEventListener('DOMContentLoaded', () => {
    
    getComentario();


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



function AgregarComment() {

    // armo la tarea
    let coment = {
       
        id_servicio: window.location.pathname.split('/')[3],
        id_user: document.querySelector('#idUser').value,
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
