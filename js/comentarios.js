"use strict"

const app = new Vue({
    el: "#app",
    data: {
        comentarios: [], // esto es como un assign de smarty
    }, 
});

document.addEventListener('DOMContentLoaded', e => {
    
    GetComments();


    //agregar comentario
    document.querySelector('#comentarios-form').addEventListener('submit', e => {
        e.preventDefault();
        AgregarComment();
    });

});


async function GetComments() {
    try {
        const response = await fetch('api/comentarios/' + window.location.pathname.split('/')[4]); 
        const comment = await response.json();
        
        // imprimo las tareas
        app.comentarios = comment;

    } catch(e) {
        console.log(e);
    }
}



async function AgregarComment() {

    // armo la tarea
    const comment = {
       
        idServicio: window.location.pathname.split('/')[4],
        idUsuario: document.querySelector('input[name=idUsuario]').value,
        comentario: document.querySelector('textarea[name=comentario]').value,
        puntaje: document.querySelector('select[name=puntaje]').value
        
    }

    try {
        const response = await fetch('api/comentarios/' , {
            method: 'POST',
            headers: {'Content-Type': 'application/json'}, 
            body: JSON.stringify(comment)
        });

        const t = await response.json();
        app.comentarios.push(t);

    } catch(e) {
        console.log(e);
    }


}
