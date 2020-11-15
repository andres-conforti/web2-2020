"use strict";

function cargarPagina() {
    
    document.querySelector(".form-comentario").addEventListener('submit', addComentario);

    let app = new Vue({
        el: ".vue-comentarios",
        data: {
            admin : document.querySelector('input[name=admin-comentario]').value,
            comments: [], 
            auth : true,
        },

    methods: {
        del: function (id_comentario) {
          fetch("api/comentarios/" + id_comentario, {
              method: 'DELETE',
           })
           .then(response => {
                getComentario();
                //getComentarios();
           })
           .catch(error => console.log(error));
         }
      }
    });
  
    
    function addComentario(e) {
        e.preventDefault();

        let data = {
            "id_cerveza" :  window.location.pathname.split('/')[4],
            "texto" :  document.querySelector('textarea[name=text-comentario]').value ,
            "puntaje" :  document.querySelector('select[name=puntaje-comentario]').value ,
            "id_usuario": document.querySelector('input[name=id_usuario-comentario]').value,
        }
        
        
        fetch('api/comentarios', {
            method: 'POST',
            headers: {'Content-Type': 'application/json'},       
            body: JSON.stringify(data),
        })
        .then(response => {
            getComentario();
            //getComentarios();
        })
        .catch(error => console.log(error));
    }

    function getComentarios() {
        fetch('api/comentarios') //comentarios/:ID
        .then(response => response.json())
        .then(comments => {
            app.comments = comments; // similar a $this->smarty->assign("tasks", $tasks)
        })
        .catch(error => console.log(error));
    }

    function getComentario() {
        let id = window.location.pathname.split('/')[4]; //id del producto           
        fetch("api/comentarios/" + id) //comentarios/:ID
        .then(response => response.json())
        .then(comments => {
            app.comments = comments; // similar a $this->smarty->assign("tasks", $tasks)
        })
        .catch(comments => {
            app.comments = comments});
    }

    getComentario();

    //getComentarios();

}

document.addEventListener("DOMContentLoaded", cargarPagina);
