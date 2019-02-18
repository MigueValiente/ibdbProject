document.addEventListener('DOMContentLoaded',function(){
    asociarEventos();
});

function asociarEventos(){
    //cogemos el formulario de busqueda por JQuery
    let formBuscar = $('#searchForm');
    formBuscar.submit(function(event){
        event.preventDefault();
        mostrarModal("searchModal");
        //Realizamos la peticion AJAX por Axios
        axios.post('/books/buscarLibrosAjax',
            {
                //Obtenemos el valor del input y lo pasamos por POST
                inputBuscador:  $('#inputBuscador').val()
            }
        )
        .then(function(response){
            //Obtenemos el div donde se muestran los libros;
            let divLibros = $("#mostrarLibros");
            let books = response.data;
            //Añadimos los libros obtenidos de la respuesta al div de los libros
            divLibros .html(books);
            cerrarModal("searchModal");
        }).catch(function(error){
                alert("HA HABIDO UN ERROR");
                console.log(error);
        })
    })
    
    let botonBuscar = $('#botonBusqueda');
    botonBuscar.click(function(){
        cargarBusqueda();
    })
}

function cargarBusqueda(){
    for(let i= 0;i<= 100;i++){
        setTimeout(function(){
            $("#barra").css("width",i+"%");
        },i*100)
    }
}

function mostrarModal(id){
$("#"+id).modal('show');
}

function cerrarModal(id){
$("#"+id).modal('hide');
}