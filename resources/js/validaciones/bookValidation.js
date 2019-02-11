document.addEventListener('DOMContentLoaded',function(){
    asociarEventos();
});


function asociarEventos(){

  $('#createBookForm').submit(function(event){
    event.preventDefault();
    validarFormularioAxios();
    nuevoFormulario();
  });
  // eventoTitulo();
}

function validarFormularioAxios(){
  let datosFormularios = $("#createBookForm").serialize();

  axios.post("/books/crearLibroAjax",datosFormularios)
    .then(function(response){
      let divBookData = $("#bookData");
      divBookData.append(response.data);
    }).catch(function(){
      alert("Ha habido un ERROR")
    })
}

function nuevoFormulario(){

  axios.get("/books/nuevoFormulario")
    .then(function(response){
      $("#createBookForm").html(response.data);
      let botonEnviar = $("<button type='submit' class='btn btn-primary' name='saveBookButton' idea='saveBookButton'>Save Book</button>");
      $("#createBookForm").append(botonEnviar);
      // eventoTitulo();
    }).catch(function(){
      alert("Ha habido un ERROR con el nuevo formulario");
    })
}

// function eventoTitulo(){
//   let titulo = $("#title");
//   titulo.on("change", function(event){
//     let value = event.target.value;
//     alert(value);
//   })
// }
