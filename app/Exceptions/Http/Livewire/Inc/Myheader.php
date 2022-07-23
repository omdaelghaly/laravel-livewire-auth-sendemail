<?php

namespace App\Http\Livewire\Inc;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Myheader extends Component
{
    public function render()
    {
        return view('livewire.inc.myheader');
    }


    public function logout()
    {
        Auth::logout();
        
        return redirect('/login');
    }
}
