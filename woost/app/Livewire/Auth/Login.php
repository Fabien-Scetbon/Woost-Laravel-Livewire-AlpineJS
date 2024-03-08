<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Hash;
use App\User;

class Login extends Component
{
    public $users, $email, $password, $name;
    public $registerForm = false;

    public function render()
    {
        return view('livewire.login-register');
    }

    private function resetInputFields(){
        $this->name = '';
        $this->email = '';
        $this->password = '';
    }

    public function login()
    {
        $validatedDate = $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        
        if(\Auth::attempt(array('email' => $this->email, 'password' => $this->password))){
                session()->flash('message', "You are Login successful.");
        }else{
            session()->flash('error', 'email and password are wrong.');
        }
    }
}
