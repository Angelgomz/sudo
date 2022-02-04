<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\GoogleCalendar\Event;
use App\Evento;
use Carbon\Carbon;
use DateTime;
use Laravel\Socialite\Facades\Socialite;
use Session;
use App\Http\Controllers\HomeController;
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
    public function index(){
        //  $user = Socialite::driver('google')->user();
         // if(!empty($user)){
           // Session::put('user',$user);
            return view('home');
         // }  
    }
    public function getHome(){
        return view('home');
    }
    public function getEvents(){
        dd($events);
    
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
}

