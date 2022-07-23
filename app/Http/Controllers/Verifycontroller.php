<?php

namespace App\Http\Controllers;

use App\Models\Changepwd;
use App\Models\Checkemail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class Verifycontroller extends Controller
{
    ///// verifyyyyyyy emailllllllllllllllllllllllllll/////////////////////

    public function verifyemail($token)
    {
       if($token){
         $userv = Checkemail::where('verifytoken',$token)->first();
         if($userv){

                 //check expire link 
       $time =$userv->expire;
       $n =  date("Y-m-d H:i:s");
       $now= strtotime($n);
       $expire = $time - $now;

       if($expire <= 1){
           $userv->delete();
           return view('nopage.nolink');
       }else{
             /////////////////////////
            $id = auth()->user()->id;
            $user = User::find($id);
            $user->verify = 1;
            $user->save();
            $userv->delete();
            

            return redirect('/home');
       }
//////////////////////////////
         }else{
            return redirect('/verifyemail');
         }
       }else{
           return redirect('/verifyemail');
       }
    }



////////////////////////verifyyyyyyyyy passsssssssworddddddd/////////
public function changepassword($email,$token){
    
 $vuser=Changepwd::where(['email'=>$email, 'verifytoken'=>$token])->first();
   if($vuser){

       //check expire link 
       $time =$vuser->expire;
       $n =  date("Y-m-d H:i:s");
       $now= strtotime($n);
       $expire = $time - $now;

       if($expire <= 1){
           $vuser->delete();
           return view('nopage.nolink');
       }else{
       return view('livewire/auth/changepwdform')
        ->with([
            'email'=>$email,
            'token'=>$token,
        ]);
       }
   }else{
       return redirect('/login');
   }
     

}


public function changepwdform(Request $request)
{

    $validate= validator::make($request->all(),$this->getrules(),$this->getmessages());

    if ($validate->fails()) {
        return response()->json([
                                'data'  => $validate->errors(),
                                'status'=>'errors'
                                ]);
        }else{
            
      
      ///chang pass
           $user = User::where('email',$request->email)->first();
           $user->password = Hash::make($request->password);
           $user->save();
            
       

        // //    //delete token  no use
           $vuser = Changepwd::where('email',$request->email)->first();
           $vuser->delete();
           


           return redirect('login');
        }

}
public function getmessages(){
    return [
     'password.required'=>'كلمة المرور مطلوبة',
     'password2.required'=>'تاكيد كلمة المرور مطلوب',
     'password.min'=>'الحد الادنى لكلمة المرور 5 احرف او ارقام ',
     'password2.min'=>'الحد الادنى لكلمة المرور 5 احرف او ارقام ',
     'password.max'=>'  الحد الاقصى هو 20 حرف او رقم',
     'password.same'=>'لابد ان تكون كلمتا المرور متطابقتان',
     'password2.same'=>'لابد ان تكون كلمتا المرور متطابقتان',
    ];

     }
     public function getrules(){
        return [
    
     'password' => 'required|min:5|max:20',
     'password2'=> 'required|min:5|same:password'
      ] ;
     }

///////////////////////////////////////////////////////////////////////

    public function notfound()
    {
        return view('nopage.nopage');
    }

}
