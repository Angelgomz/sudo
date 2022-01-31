const btnevent = document.getElementById('createEvent');
const closer = document.getElementById('close');
const enviarForm = document.getElementById('enviarForm');

btnevent.addEventListener('click',openModal);
function openModal(){
    document.getElementById('modalEvent').style.display = 'block';
}


closer.addEventListener('click',cerrarModal);
function cerrarModal(){
    document.getElementById('modalEvent').style.display = 'none';
}

enviarForm.addEventListener('click',enviarFormulario);
function enviarFormulario()
{
    event.preventDefault();
    let nombre = document.getElementById('name').value;
    let fecha =  document.getElementById('fecha').value;
    let begin =  document.getElementById('begin').value;
    let end =     document.getElementById('end').value;
    async function sendForm() {
        const response = await fetch('/sudo/public/saveFecha',{
        method:"POST",
         headers: {
        "Content-Type": "application/json",
        "Accept": "application/json",
        "X-Requested-With": "XMLHttpRequest",
        "X-CSRF-Token": $('input[name="_token"]').val()
        },
        body: JSON.stringify({'nombre':nombre,'fecha':fecha,'begin':begin,'end':end})
        });
         response = await response.json();
        return response;
      }
        sendForm().then(response => {
        response; //
      });
}





$(document).ready(function() {
    $("#fecha").datepicker({
        dateFormat:'YYYY-MM-DD'
    });
    $('input.timepicker').timepicker({timeFormat: 'h:mm:ss p',
    interval: 60,
    defaultTime: '11',
    startTime: '10:00',
    dynamic: false,
    dropdown: true,
    scrollbar: true});
});