<?php

namespace App\Http\Livewire\Auth;

use App\Mail\Verifypass;
use App\Models\Changepwd;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class Verifypwd extends Component
{
    public $expire,$setexpiretime,$useremail,$token,
    $status,$sendstatus,$name,$userid,$funstatus,$now ;
  
    public function render()
    {
       /// date_default_timezone_set('Africa/Cairo');

        $code = rand(1000,10000);
        $token = md5($code);
        $this->token =$token;
        $nowx=date("Y-m-d H:i:s");
        $this->now= strtotime($nowx);

        $this->setexpiretime=(60 * 60 )-60;
        if($this->expire==''){
            $this->expire = $this->setexpiretime;
        }

        $this->checkemail();

        return view('livewire.auth.verifypwd');
    }


     /// check email 

     public function checkemail()
     {
         if($this->useremail)
         {
             $user = User::where('email',$this->useremail)->first();
             if($user)
             {
                //  $vuser=Changepwd::where('email',$this->useremail)->first();
                //  if($vuser){
                //  $this->expire = $vuser->expire - $this->now;
                //  }
                 $this->status = ' هذا الايميل موجود  ';
                 $this->sendstatus='';
             }else{
                 $this->status = ' هذا الايميل غير موجود  ';
                 $this->sendstatus='disabled';
             }
         }else{
            $this->status = ' اكتب ايميلك .......... ';
            $this->sendstatus='disabled';
                 }
     }


    ////////////////senddddd email for passssss verify//

        public function verifypassword()
        {
            if($this->sendstatus==''){

        //////////////////////////////////////////////////////////////////////////

                $user= User::where('email',$this->useremail)->first();
                   $this->name = $user->name;
                   $this->userid  = $user->id;
                 

                // check if he send before and still ther is  time left////
                    $client = Changepwd::where('email', $this->useremail)->first();
               
                 if($client){ /// user send before

                    $time  = $client->expire;
                    $expire = $time - $this->now ;
                        
                        if($expire <=1){
                          $client->delete();
                          $this->saveverifypass();

                        }else{
                            $this->expire = $expire ;

                           Mail::to($client->email)->send(new Verifypass($client->email,$client->verifytoken,$this->name));
                           $this->funstatus=" تم ارسال رابط تغير كلمة المرور مره اخرى  قم بزيارة ايميلك  ";

                        }
                       
                   }else{
                   $this->saveverifypass();
                }


    //////////////  /////////////////////////////////////////////////////////////////
            }else{
                $this->funstatus="  هذا الايميل غير صحيح  ";

            }          
           
        }



       public function saveverifypass()
       {
        $nowx=date("Y-m-d H:i:s");
        $now= strtotime($nowx);
        $alltime=($now + $this->setexpiretime);
            Changepwd::create([
               'user_id'      => $this->userid,
               'email'        =>$this->useremail,
                'verifytoken'  =>$this->token,
                 'expire'      =>$alltime,
            ]);
            Mail::to($this->useremail)->send(new Verifypass($this->useremail,$this->token,$this->name));
           $this->funstatus=" تم ارسال رابط تغير كلمة المرور قم بزيارة ايميلك  ";
           $this->expire = $this->setexpiretime;

        }




}
