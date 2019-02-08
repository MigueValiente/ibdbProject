$(function(){
    $('#myTabPill a').on('show.bs.tab', function (e) {
      axios.get(`/obtenerVista/${e.target.id}`
      ).then(function(response){
            $(`#div-${e.target.id}`).html(response.data);
            console.log(response.data);
        }).catch(function(error){
            alert("Ha Habido un Error");
            console.log(error);
        });
      });
});
