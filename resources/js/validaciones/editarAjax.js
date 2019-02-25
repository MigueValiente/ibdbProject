document.addEventListener("DOMContentLoaded", function(event) {
    asociarEventos();
});

function asociarEventos(){
    $('#updateForm').submit(function(event){
        event.preventDefault();
        validarFormularioAxios(event);
      });
}


function validarFormularioAxios(event){
    let datosFormularios = $("#updateForm").serialize();
    let form = $(event.target);
    let idLibro = form.attr("data-bookId");
    let editResult = $("#editResult");
  
    axios.put(`/books/editarAjax/${idLibro}`,datosFormularios)
      .then(function(response){
        vaciarDiv(editResult);
        editResult.html('<div class="alert alert-success" role="alert"> Se ha editado correctamente</div>');
      }).catch(function(message){
        console.log(message);
        vaciarDiv(editResult);
        editResult.html('<div class="alert alert-danger" role="alert"> Ha habido un Error</div>');
      })
  }

  function vaciarDiv(div){
      div.html("");
  }