const btnevent = document.getElementById('createEvent');
btnevent.addEventListener('click',openModal);
function openModal(){
    document.getElementById('modalEvent').style.display = 'block';
}

//boton datetime.
$(document).ready(function() {
  /*  $("#datetime").datetimepicker({
        format: 'yyyy-mm-dd hh:ii'
    }); */ 
    $("#fecha").datepicker({
        language: 'es'
    });
});