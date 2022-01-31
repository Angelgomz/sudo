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
    public function saveFecha(Request $request){
       $data = $request->all();
       $event = new Evento();
       $eventcalendar = new Event;
       $data['fecha'] = strtotime($data['fecha']);
       $data['fecha']  = date('Y-m-d', $data['fecha']);
       $data['begin'] = strtotime($data['begin']);
       $data['begin'] = date('h:m:s', $data['begin']);
       $data['end'] = strtotime($data['end']);
       $data['end'] = date('h:m:s', $data['end']);
       $event->name = $data['nombre'];
       $event->fecha = $data['fecha'];
       $event->begin = $data['begin'];
       $event->end = $data['end'];
       $event->created_by = 1;
       $event->isActive = 1;
       $event->save();
       $eventcalendar->name = 'A new event';
       $eventcalendar->description = 'Event description';
       $eventcalendar->startDateTime =Carbon::now();
       $eventcalendar->endDateTime = Carbon::now()->addHour();
    /*   $eventcalendar->addAttendee(['email' => 'anotherEmail@gmail.com']); */ 
       $eventcalendar->save();
    }
}
