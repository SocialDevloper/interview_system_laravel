<?php


namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Exception;
use Illuminate\Support\Facades\Hash;
use Socialite;


class FacebookController extends Controller
{


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleFacebookCallback()
    {
        try {
            $user = Socialite::driver('facebook')->user();

            $finduser = User::where('facebook_id', $user->id)->first();
     
            if($finduser){
     
                Auth::login($finduser);
    
                return redirect('/home');
     
            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'facebook_id'=> $user->id,
                    'password' => Hash::make('123456')
                ]);
    
                Auth::login($newUser);
     
                return redirect('/home');
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }    
    }
}