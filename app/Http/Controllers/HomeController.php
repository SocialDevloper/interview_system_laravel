<?php

namespace App\Http\Controllers;

use App\Notifications\TaskNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        /*$user = Auth::user();
        $to_name = $user->name;
        $to_email = $user->email;
        $data = array("name" => $to_name, "body" => "Logged In Time = ". now());
          
        Mail::send('loginEmail', $data, function($message) use ($to_name, $to_email) {
        $message->to($to_email, $to_name)
        ->subject('Laravel Login Mail - Interview System');
        $message->from('socialdevp786@gmail.com','Login Details Mail');
        });*/

        /* .ENV MA 
        MAIL_MAILER=smtp
        MAIL_HOST=smtp.googlemail.com
        MAIL_PORT=587
        MAIL_USERNAME=socialdevp786@gmail.com
        MAIL_PASSWORD=Social@786
        MAIL_ENCRYPTION=tls
        MAIL_FROM_ADDRESS=null
        MAIL_FROM_NAME="${APP_NAME}"
        */

        /* Notification send using queue */
        $user = Auth::user();
        //$user->notify(new TaskNotification);
        return view('home');
    }
}
