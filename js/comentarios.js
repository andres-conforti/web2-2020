"use strict"
const servicio = document.querySelector('#servicio');//section

const usuario = document.querySelector('#usuario');

let app = new Vue({
    el: '#vue-comentarios',
    data: {
        comments: [], // esto es como un assign de smarty
        admin : servicio.dataset.isadmin,
        
    },
    methods: {
        del: function (id_comentario) {
          fetch("api/comentarios/" + id_comentario, {
              method: 'DELETE',
           })
           .then(response => {
                getComentario();

           })
           .catch(error => console.log(error));
         }
      } 

});



document.addEventListener('DOMContentLoaded', () => {
    
    getComentario();

    
    if(usuario.dataset.user !== ""){
    //agregar comentario
    document.querySelector('.btn-primary').addEventListener('click', e=>{
        e.preventDefault();
        AgregarComment();
    });
    }


});

//traer comentarios
function getComentario() {
    let id = servicio.dataset.id; //id del producto  
    fetch('api/comentarios/' + id) //comentarios
    .then(response => response.json())
    .then(comments => {
        app.comments = comments; // similar a $this->smarty->assign("tasks", $tasks)
    })
    .catch(comments => {
        app.comments = comments});
}


//agregar comentarios
function AgregarComment() {
  

    // armo la tarea
    let coment = {
       
        id_servicio: servicio.dataset.id,
        id_user: usuario.dataset.user,
        texto: document.querySelector('#input-text').value,
        puntaje: document.querySelector('#select-puntaje').value

    }

    fetch('api/comentarios', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(coment)
    })
        .then(response => {getComentario()})

        .catch(error => console.log(error));


}

//console.log("Servicio: ",servicio.dataset);
//console.log("User: ", user.dataset);