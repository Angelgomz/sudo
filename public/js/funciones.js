const btnevent = document.getElementById('createEvent');
const closer = document.getElementById('close');
const enviarForm = document.getElementById('enviarForm');
const id_user = document.getElementById('id_user').value;
var calendar = "";
function crearSwalFire(title,text,icon){
    Swal.fire({
        title: title,
        text: text,
        icon: icon,
        confirmButtonText: 'OK'
      })
    
}
btnevent.addEventListener('click',openModal);
function openModal(){
    document.getElementsByClassName('modalDetail')[0].style.display = 'none';
    document.getElementById('modalForm').style.display = 'block';
    document.getElementById('modalEvent').style.display = 'block';
}
closer.addEventListener('click',cerrarModal);
function cerrarModal(){
    document.getElementById('modalEvent').style.display = 'none';
}

enviarForm.addEventListener('click',enviarFormulario);
function eliminarEvento(element)
{
    let id = element.getAttribute('data-id');
        axios.post('/sudo/public/api/deleteEventInGoogleCalendar',{
            method:"POST",
             headers: {
            "Content-Type": "application/json",
            "Accept": "application/json",
            "X-Requested-With": "XMLHttpRequest",
            "X-CSRF-Token": $('input[name="_token"]').val()
            },
            params:{'id_user':id_user,'id':id},
            }).then(function (response) {
               if(response.data.success == true){
                   document.getElementById(id).remove();
                   crearSwalFire('¡Buen trabajo!','El evento se ha eliminado','sucess');
                   cerrarModal();
               }  
               else{
                crearSwalFire('Ups!','Algo ha salido mal, intenta de nuevo.','error');
               }
            });
 
            
}
async function sendFormEdit(id,id_user){
    let nombre = document.getElementById('nombreevento').value;
    let fecha = document.getElementById('fechaevento').value;
    let begin = document.getElementById('beginalt').value;
    let end = document.getElementById('endalt').value;
    let descripcion = document.getElementById('descripcion').value;
    axios.post('/sudo/public/api/editEventInGoogleCalendar',{
        method:"POST",
         headers: {
        "Content-Type": "application/json",
        "Accept": "application/json",
        "X-Requested-With": "XMLHttpRequest",
        "X-CSRF-Token": $('input[name="_token"]').val()
        },
        params: {
            'id_user':id_user,'id':id,'nombre':nombre,'fecha':fecha,'begin':begin,'end':end,'descripcion':descripcion
          },
        }).then(function (response) {
            console.log(response);
        });
}
function editarEvento(element){
    let id = element.getAttribute('data-id');
    axios.get('/sudo/public/api/geteventosCalendarPrimary').then(sendFormEdit(id,id_user)
    );
}
function enviarFormulario()
{
   
    let nombre = document.getElementById('name').value;
    let fecha = document.getElementById('fecha').value;
    let begin = document.getElementById('begin').value;
    let end = document.getElementById('end').value;
    let description = document.getElementById('description').value;
        axios.post('/sudo/public/api/saveEventInGoogleCalendar',{
        method:"POST",
         headers: {
        "Content-Type": "application/json",
        "Accept": "application/json",
        "X-Requested-With": "XMLHttpRequest",
        "X-CSRF-Token": $('input[name="_token"]').val()
        },
        params: {
            'nombre':nombre,'fecha':fecha,'begin':begin,'end':end,'description':description
          },
        }).then(function (response) {
            if(response.data.success == true){
            console.log(response.data.event);
                crearSwalFire('¡Buen trabajo!','Se creo el evento','success');
                calendar.addEvent({
                    id:response.data.event.id,
                    title: response.data.event.summary,
                    start: response.data.event.start.dateTime,
                    end:response.data.event.end.dateTime,
                    extraParams:{'id_google':response.data.event.id,'descripcion':response.data.event.description}
                  });
                  cerrarModal();
            }
            else{
                crearSwalFire('¡Ups!','No se ha logrado crear el evento, sigue intentando','error');
            }
      });
}
function cargarApi(){
    axios.post('/sudo/public/api/geteventosCalendarPrimary', {
        id_user: id_user
      })
      .then(function (response) {
            let jsonevent = [];
            for(let i=0;i<response.data.length;i++){
                let event = {"title":response.data[i]['nombre'],
                "start":response.data[i]['begin'],
                "end":response.data[i]['end'],
                "extraParams":{'id_google':response.data[i].id_google,'descripcion':response.data[i].description}}
                jsonevent.push(event);
            }
        setTimeout(function(){  
           var calendarEl = document.getElementById('calendar');
             calendar = new FullCalendar.Calendar(calendarEl, {
              initialView: 'dayGridMonth',
              themeSystem: 'bootstrap',  
              locale: 'es',
              events: jsonevent,
              eventClick: function(info) {
                info.el.setAttribute('id',info.event.extendedProps.extraParams.id_google);
                document.getElementById('modalForm').style.display = 'none';
                document.getElementsByClassName('modalDetail')[0].style.display = 'block';
                document.getElementById('editarCalendar').setAttribute('data-id',info.event.extendedProps.extraParams.id_google);
                document.getElementById('eliminarCalendar').setAttribute('data-id',info.event.extendedProps.extraParams.id_google);
                document.getElementById('editarCalendar').setAttribute('data-el',info.el);
                document.getElementById('eliminarCalendar').setAttribute('data-el',info.el);
                document.getElementById('nombreevento').value = info.event.title;
                console.log(info.event.start);
                console.log(info.event.end);
                let fecha = info.event.start.getDate() + "/" + '0' + parseInt(info.event.start.getMonth()+ 1) + "/" + info.event.start.getFullYear();
                let begin = (info.event.start.getHours() < 10 ? '0'+ info.event.start.getHours() : info.event.start.getHours())
                begin = begin + ':' + (info.event.start.getMinutes() < 10 ? '0'+ info.event.start.getMinutes() : info.event.start.getMinutes());
                begin = begin + ':' + (info.event.start.getSeconds() < 10 ? '0'+ info.event.start.getSeconds() : + info.event.start.getSeconds()); 
                let end = (info.event.end.getHours() < 10 ? '0'+ info.event.end.getHours() : info.event.end.getHours())
                end = end + ':' + (info.event.end.getMinutes() < 10 ? '0'+ info.event.end.getMinutes() : info.event.end.getMinutes());
                end = end + ':' + (info.event.end.getSeconds() < 10 ? '0'+ info.event.end.getSeconds() : + info.event.end.getSecondsends());
                document.getElementById('fechaevento').value = fecha;
                document.getElementById('beginalt').value = begin;
                document.getElementById('endalt').value = end;
                document.getElementById('descripcion').value = info.event.extendedProps.extraParams.descripcion;
                document.getElementById('modalEvent').style.display = 'block';
              }
           
            });
          calendar.render();
        }, 2000);
      })
      .catch(function (error) {
            console.log(error);
      });
}
 function init(){  
    axios.get('/sudo/public/api/geteventosCalendarPrimary').then(
       cargarApi()
    );
} 
    $("#fecha").datepicker({
        dateFormat:'YYYY-MM-DD'
    });
    $('#fechaevento').datepicker({
        dateFormat:'YYYY-MM-DD'
    });
    $('input.timepicker').timepicker({timeFormat: 'HH:mm:ss',
    interval: 60,
    defaultTime: '11',
    startTime: '01:00',
    language:'en',
    dynamic: false,
    dropdown: true,
    scrollbar: true});
    window.onload = function(){
        //hide the preloader
        document.querySelector(".preloader").style.display = "none";
    }
init();