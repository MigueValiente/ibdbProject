$(function(){
    $('#myTabPill a').on('show.bs.tab', function (e) {
      axios.get('/profile/validar',{
        tab: e.target.id
        }).then(function(response){
            console.log(response);
        }).cath(function(error){
            alert("Ha Habido un Error");
            console.log(error);
        });
      });
});
