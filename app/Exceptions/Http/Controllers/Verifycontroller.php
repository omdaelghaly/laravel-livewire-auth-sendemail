<?php

namespace App\Http\Controllers;

use App\Models\Checkemail;
use App\Models\User;
use Illuminate\Http\Request;

class Verifycontroller extends Controller
{
    
    public function verifyemail($token)
    {
       if($token){
         $userv = Checkemail::where('verifytoken',$token)->first();
         if($userv){
            $id = auth()->user()->id;
            $user = User::find($id);
            $user->verify = 1;
            $user->save();
            $userv->delete();

            return redirect('/home');

         }else{
            return redirect('/verifyemail');
         }
       }else{
           return redirect('/verifyemail');
       }
    }




    public function notfound()
    {
        return view('nopage.nopage');
    }

}
