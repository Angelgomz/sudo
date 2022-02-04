<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;
use App\User;
use Auth;
class AutenticacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getClient()
    {
    
    }
    public function logout(){
        Auth::logout();
        Session::flush();
        return redirect('/');
    }
    public function crearUsuario($email,$token){
        $user = new User();
        $user->name = 'Test';
        $user->email = $email;
        $user->tokengoogle = $token;
        $saved = $user->save();
        if($saved){
        Session::put('token',$token);
        Session::put('email', $email);
        Session::put('id',$user->id);
        Auth::login($user);
        $success = true;
        }
        else{   
          $sucess = false;
        }
    }
    public function index(){
        $client = new \Google_Client();
        $client->setApplicationName('Google Calendar API PHP Quickstart');
        $client->setScopes([\Google_Service_Calendar::CALENDAR,\Google_Service_Oauth2::USERINFO_EMAIL]);
        $client->setAuthConfig($_SERVER['DOCUMENT_ROOT'].env('CREDENTIALS'));
        $client->setAccessType('offline');
        $client->setPrompt('select_account consent');
        $tokenPath = 'token.json';
        if (file_exists($tokenPath)) {
            $accessToken = json_decode(file_get_contents($tokenPath), true);
            $client->setAccessToken($accessToken);
        }
        if(empty($_GET['code'])){
        if ($client->isAccessTokenExpired()){ 
            if ($client->getRefreshToken()) {
                $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
                $gauth = new \Google_Service_Oauth2($client);
                $email = $gauth->userinfo->get();
                return view('home');
            } else{
                $authUrl = $client->createAuthUrl();
                return view('layouts/login')->with('urlauth',$authUrl);
            }
        }
        else{
            $gauth = new \Google_Service_Oauth2($client);
            $email = $gauth->userinfo->get();
            return view('home');
            }
        }
        else{
            $token = $client->fetchAccessTokenWithAuthCode($_GET["code"]);
            $client->setAccessToken($token);
            if (array_key_exists('error', $token)) {
                throw new Exception(join(', ', $token));
            }
            else{
                $gauth = new \Google_Service_Oauth2($client);
                $email = $gauth->userinfo->get();
                $email = $email->email;
                $this->crearUsuario($email,$token['access_token']);
                $refreshtoken = $client->getRefreshToken();
                    if (!file_exists(dirname($tokenPath))) {
                        mkdir(dirname($tokenPath), 0700, true);
                    }
                file_put_contents($tokenPath, json_encode($client->getAccessToken()));
                return view('home')->with('token',$refreshtoken);
            }
        }
    }
    
    public function getEvents(){
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
