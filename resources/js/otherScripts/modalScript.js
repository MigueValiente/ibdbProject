document.addEventListener('DOMContentLoaded',function(){
    asociarEventos();
});



function asociarEventos(){
  let deleteForm = $("form[data-accion = 'delete']");

  deleteForm.submit(function(event){
    event.preventDefault();
    mostrarModal("ejemploModal");
    let form = $(event.target);
    let idLibro = form.attr("data-bookId");

    let botonAceptarModal = $("#aceptarModal");
    botonAceptarModal.click(function(){
      axios.delete(`/books/borrarAjax/${idLibro}`)
      .then(function(response){
        alert("Se ha eliminado correctamente el libro "+response.data);
        cerrarModal("ejemploModal");
        //se desactiva con off el evento asociado anteriormente
        botonAceptarModal.off('click');
        //cogemos el div del libro y lo eliminamos a el y a sus hijos
        let divLibro = $(`div[data-bookId=${idLibro}]`);
        divLibro.remove();
      }).catch(function(){
        alert("HA HABIDO UN ERROR");
      })
    })
  })

  let botonCerrarModal = $("#cerrarModal");
  botonCerrarModal.on("click",cerrarModal("ejemploModal"))


}

function mostrarModal(id){
    $("#"+id).modal('show');
}

function cerrarModal(id){
    $("#"+id).modal('hide');
}
