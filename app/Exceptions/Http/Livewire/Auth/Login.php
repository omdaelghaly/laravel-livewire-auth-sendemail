<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Login extends Component
{


    public $email, $password;



    public function render()
    {
        return view('livewire.auth.login');     
    }



    public function login()
    {
        $validate = $this->validate($this->getrules(),$this->getmessages());

        //check email
    $user = User::where('email', $this->email)->first();
    if($user){
        //check password
        if(Hash::check($this->password, $user->password))
        {//pass true
                  if(Auth::attempt(array('email' => $this->email, 'password' => $this->password))){
                         return redirect('/verifyemail');                    }
        }else{
            //pass false 
            session()->flash('error.email', 'هناك خطا فى كلمة المرور ');
        }
         

    }else{
       session()->flash('error.email', 'هذا الايميل غير موجود ');
          };

    
     }



     public function updated()
     {
         $validate = $this->validate($this->getrules(),$this->getmessages());
     }
       
 
    public function getrules(){
        return [
     'email' => 'required|email',
     'password' => 'required',
      ] ;
     }
 
    public function getmessages(){
        return [
       
         'email.required'=>'الايميل مطلوب',
         'email.email'=>'اكتب ايميل صحيح',
         'password.required'=>'كلمة المرور مطلوبة',
        ];
 
         }



}
