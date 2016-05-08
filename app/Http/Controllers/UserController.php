<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use App\User;


class UserController extends Controller
{

    public function settings(){

        return view('auth.settings');
    }

    public function settings_update(Request $request){


        if($request->user()->email != $request->email){
            $this->validate($request, [
                'email' => 'required|email|max:255|unique:users',
            ]);
        }
        if(!empty($request->password)){
            $this->validate($request, [
                'password' => 'required|confirmed|min:6',
            ]);
        }else{
            //echo("pas de mot de passe");
        }

        //$user = Auth::user();
        $user = User::find($request->user()->id);

        if(!empty($request->password)){
            $user->password = bcrypt($request->password);
        }
        if($request->user()->email != $request->email){
            $user->email = $request->email;
        }

        $user->save();

        Session::flash('flash_message', 'Your settings were updated !');
        return redirect('/settings');
    }
}