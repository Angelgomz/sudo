<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\GoogleCalendar\Event;
use App\Evento;
use Carbon\Carbon;
use DateTime;
class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
    }
    public function getEvents(){
        $events = Event::get();
        return view('home');
    
    }
    public function saveInGoogleCalendar($nombre,$fecha,$begin,$end,$description){
        $eventcalendar = new Event;
        $eventcalendar->name = $nombre;
        $eventcalendar->description = $description;
        $format = 'Y-m-d h:i:s';
        $fechabegin = Carbon::createFromFormat($format, $fecha.' '.$begin);
        $fechaend = Carbon::createFromFormat($format, $fecha.' '.$end);
        $eventcalendar->startDateTime = $fechabegin;
        $eventcalendar->endDateTime = $fechaend;
        $eventcalendar->save();
    }
    public function saveFecha(Request $request){
       $data = $request->all();
       $event = new Evento();
       $data['fecha'] = strtotime($data['fecha']);
       $data['fecha']  = date('Y-m-d', $data['fecha']);
       $data['begin'] = strtotime($data['begin']);
       $data['begin'] = date('h:m:s', $data['begin']);
       $data['end'] = strtotime($data['end']);
       $data['end'] = date('h:m:s', $data['end']);
       $data['description'] = $data['description'];
       $event->name = $data['nombre'];
       $event->fecha = $data['fecha'];
       $event->begin = $data['begin'];
       $event->end = $data['end'];
       $event->description = $data['description'];
       $event->created_by = 1;
       $event->isActive = 1;
       $event->save();
       $this->saveInGoogleCalendar($data['nombre'],$data['fecha'],$data['begin'],$data['end'],$data['description']);
    }
}
