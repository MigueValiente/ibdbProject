document.addEventListener("DOMContentLoaded", function(event) {
    alert("Se ha cargado el DOM xiabalhes");

    $("#name").on("change",validarNombre);
    $("#email").on("change",validarEmail);
});

function validarNombre(){
  axios.post('/register/validar',{
    name: $('#name').val()
  }).then(function(response){
      gestionarErrores($('#name'),response.data.name);
  }).catch(function(error){
      alert("Ha Habido un Error");
      console.log(error);
  });
}

function validarEmail(){
  axios.post('/register/validar',{
    email: $('#email').val()
  }).then(function(response){
      gestionarErrores($('#email'),response.data.email);
  }).catch(function(error){
      alert("Ha Habido un Error");
      console.log(error);
  });
}

function gestionarErrores(input,errores){
    let hayErrores = false;
    let divErrores = input.next();
    divErrores.html("");
    input.removeClass("bg-success bg-danger");
    if (errores.length === 0) {
        input.addClass("bg-success");
    } else {
        hayErrores = true;
        input.addClass("bg-danger");
        for (let error of errores) {
            divErrores.append("<div>"+error+"</div>");
        }
    }
    //Para quitar el spinner
    // input.parent().next().remove();
    return hayErrores;
}

function validarFormularioAxios(){
  let datosFormularios = $("#formulario").serialize;

  axios.post("/register/validar", datosFormularios)
    .then(function(response){
    let formularioCorrecto=true;

    for(let campo of response.data){
      if(!gestionarErrores($(`#${campo}`),
          response.data[$campo])
      ){
        formularioCorrecto = false;
      }
    }
    if(formularioCorrecto){
      let formulario = document.getElementById("formulario");
      formulario.submit;
    }
  })
}
