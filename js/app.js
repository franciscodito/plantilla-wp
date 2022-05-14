const searchForm = document.querySelectorAll('.wp-block-search .wp-block-search__input');
if(searchForm){
    for (const iterator of searchForm) {
        iterator.className += ' form-control mb-2';
    }
    
    const searchButton = document.querySelectorAll('.wp-block-search__button  ');

    for (const iterator of searchButton) {
        iterator.className += ' btn btn-primary btn-block';
    }
}

const widgetList = document.querySelector('.t1-wi ul');
if(widgetList){
    widgetList.className += ' list-group';
    widgetList.querySelectorAll('li').forEach(item => {
        item.className += ' list-group-item';
    });
}

// Estilos comentarios
const botonComentarios = document.querySelector('.form-submit #submit');
if(botonComentarios){
  botonComentarios.className = 'btn btn-primary';
}

const inputTextArea = document.querySelector('.comment-form-comment textarea');
if(inputTextArea){
  inputTextArea.className = 'form-control';
  inputTextArea.setAttribute('placeholder', 'Ingresa aquí tu comentario*');
}

const comentariosNuevos = document.querySelector('#commentform');
if(comentariosNuevos
  && comentariosNuevos.querySelector('.comment-form-author label')
  && comentariosNuevos.querySelector('.comment-form-author input')
  && comentariosNuevos.querySelector('.comment-form-email label')
  && comentariosNuevos.querySelector('.comment-form-email input')
  && comentariosNuevos.querySelector('.comment-form-url label')
  && comentariosNuevos.querySelector('.comment-form-url input')
  ){

  comentariosNuevos.querySelector('.comment-form-author label').className = 'd-none';
  comentariosNuevos.querySelector('.comment-form-author input').className = 'form-control';
  comentariosNuevos.querySelector('.comment-form-author input').setAttribute('placeholder', 'Nombre*');

  comentariosNuevos.querySelector('.comment-form-email label').className = 'd-none';
  comentariosNuevos.querySelector('.comment-form-email input').className = 'form-control';
  comentariosNuevos.querySelector('.comment-form-email input').setAttribute('placeholder', 'Email*');

  comentariosNuevos.querySelector('.comment-form-url label').className = 'd-none';
  comentariosNuevos.querySelector('.comment-form-url input').className = 'form-control';
  comentariosNuevos.querySelector('.comment-form-url input').setAttribute('placeholder', 'Sitio web');

}

const botonEditarComentarios = document.querySelectorAll('.comment-edit-link');
if(botonEditarComentarios){
  botonEditarComentarios.forEach(boton => {
    boton.className = 'btn btn-outline-warning btn-sm'
  })
}

const botonResponderComentarios = document.querySelectorAll('.comment-reply-link');
if(botonResponderComentarios){
  botonResponderComentarios.forEach(boton => {
    boton.className = 'btn btn-outline-primary btn-sm'
  })
}