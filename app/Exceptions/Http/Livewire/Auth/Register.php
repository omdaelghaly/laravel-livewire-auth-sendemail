<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Register extends Component
{
    public  $email, $password,$confirm, $name;

    public function render()
    {
        return view('livewire.auth.register');
    }



    public function register()
    {
        
        $validate = $this->validate($this->getrules(),$this->getmessages());

 
        $this->passwordhashed = Hash::make($this->password); 

        User::create([
            'name' => $this->name, 
            'email' => $this->email,
            'password' => $this->passwordhashed]);

        session()->flash('message', 'Your register successfully Go to the login page.');


 
          if( Auth::attempt(array('email' => $this->email, 'password' => $this->password)))
           {
                   return redirect('/verifyemail');
           }                  // $this->resetInputFields();

    }



    public function updated()
    {
        $validate = $this->validate($this->getrules(),$this->getmessages());
    }
      

   public function getrules(){
       return [
    'name' => 'required|min:5|max:25',
    'email' => 'required|email|max:30|unique:users',
    'password' => 'required|min:5|max:20|same:confirm',
    'confirm'=> 'required|min:5|same:password'
     ] ;
    }

   public function getmessages(){
       return [
        'name.required'=>'الاسم مطلوب',
        'name.min'=>'الحد الادنى هو 5 حروف',
        'name.max'=>'الحد الاقصى هو 20 حروف',
        'email.required'=>'الايميل مطلوب',
        'email.email'=>'اكتب ايميل صحيح',
        'email.unique'=>'هذا الايميل موجود ',
        'email.max'=>'الحد الاقصى هو 30 حروف',
        'password.required'=>'كلمة المرور مطلوبة',
        'confirm.required'=>'تاكيد كلمة المرور مطلوب',
        'password.min'=>'الحد الادنى لكلمة المرور 5 احرف او ارقام ',
        'confirm.min'=>'الحد الادنى لكلمة المرور 5 احرف او ارقام ',
        'password.max'=>'  الحد الاقصى هو 20 حرف او رقم',
        'password.same'=>'لابد ان تكون كلمتا المرور متطابقتان',
        'confirm.same'=>'لابد ان تكون كلمتا المرور متطابقتان',
       ];

        }

        public function resetInputFields(){
            $this->name ='';
            $this->email ='';
            $this->password ='';
            $this->confirm='';
        }

}
