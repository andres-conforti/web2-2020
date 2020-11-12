{literal}
    
    <div>
        <div>
                    <ul>
                        <li v-for="comment in comments">
                        <div>
                        <div>
                            <div>
                                <div>
                                    <div>
                                            <span>{{comment.puntaje}} <i class="fas fa-star"></i></span>
                                    </div>
                                </div>
                                <div>
                                    <blockquote>
                                    <p>{{ comment.texto }}</p>
                                    <footer>{{ comment.nombreUsuario }}</footer>
                                    </blockquote>
                                </div>
                            </div>
                        </div>
                        <div>
                        <div>
                        <span v-if="admin == 1"><a v-on:click="del(comment.id_comentario)"  :data-id="comment.id_comentario" class="btn-eliminar"><i class="fas fa-trash-alt"></i></a></span>
            </div>
        </div>
                        </li>
                    </ul>
            </div>
        </div>
    </div>

{/literal}