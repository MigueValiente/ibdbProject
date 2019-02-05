document.addEventListener("DOMContentLoaded", function(event) {
    alert("Se ha cargado el DOM xiabalhes");

    $("#name").on("change",validarNombre);
});

function validarNombre(){
  axios.post('/register/validar',{
    name: $('#name').val()
  }).then(function(response){
      console.log(response.data);
  }).cath(function(error){
      alert("Ha Habido un Error");
      console.log(error);
  });
}
