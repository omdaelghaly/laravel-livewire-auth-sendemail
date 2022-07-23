<?php

namespace App\Http\Livewire\Auth;

use App\Mail\newvm;
use App\Mail\Verifye;
use App\Models;
use App\Models\Checkemail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class Verifyemail extends Component
{
    public $code, $token,$email,$status ,$d,$h,$i,$name,$setexpiretime, $expire;

    public function render()
    {
    date_default_timezone_set('Africa/Cairo');
  

    

     $name= auth()->user()->name;
     $email= auth()->user()->email;
     $this->name =$name;
     $this->email =$email;
     $this->setexpiretime=(60 * 60)-60;
       $this->sendcode();
        return view('livewire.auth.verifyemail');
    }

 

 //save code token function
 public function savetokencode()
 {
   $code = rand(10000,1000000);
   $this->code=$code;
//   $token = Hash::make($code);
   $token = md5($code);
   $this->token =$token;

   $this->d =date("d");
   $this->h = date("h");
   $this->i =date("i");
   $n =  date("H:i:s");
   $now= strtotime($n)+ $this->setexpiretime ;
    $this->expire=$this->setexpiretime;
    Checkemail::create([
       'user_id'     => auth()->user()->id,
        'code'       =>$this->code,
        'verifytoken'=>$this->token, 
        'h'          =>$this->h,
         'm'          =>$this->i,
         'd'          =>$this->d,  
         'expire'     =>$now,  

  ]);

  //Mail::to('emad.nour54@yahoo.com')->send(new Verifye($this->code,$this->token,$this->name));
  $this->status=" تم ارسال الكود قم بزيارة ايميلك  ";
}
 
/////send email with info if not in db
    public function sendcode()
    {
    
     $id= auth()->user()->id;
     $name= auth()->user()->name;
     $this->name =$name;
     $user = Checkemail::where('user_id',$id)->first();
         // check if there is token or not ...is still have time 

        if($user){

            $time= $user->expire ;
            $n =  date("Y-m-d H:i:s");
            $now= strtotime($n);
            $expire = $time - $now;
             $this->expire= $expire;

             if($expire <= 1){
                $user->delete();
                $this->savetokencode();
            }else{ 

             $this->expire =$expire;              
             $this->code = $user->code;
             $this->token = $user->verifytoken;
             $this->d  = $user->d;
             $this->h = $user->h;
             $this->i = $user->m;
             // Mail::to('emad.nour54@yahoo.com')->send(new Verifye($this->code,$this->token,$this->name));
               $this->status=" تم ارسال الكود مره اخرى قم بزيارة ايميلك  ";
            };

            
        }else{
            $this->savetokencode();
        }
 


    }






}
