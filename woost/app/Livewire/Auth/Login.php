<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class Login extends Component
{
    public $email = '';
    public $password = '';

    // Message d'erreurs lors de la validation

    protected function messages()
    {
        return [
            'email.required' => "L'adresse mail est obligatoire.",
            'email.email' => 'Veuillez entrer une adresse mail valide.',
            'password.required' => "Le mot de passe est obligatoire.",
        ];
    }

    public function login()
    {
        $validatedData = Validator::make(
            [
                'email' => $this->email,
                'password' => $this->password,
            ],
            [
                'email' => ['required', 'email'],
                'password' => ['required'],
            ], $this->messages()

        )->validate();

        
        if (Auth::attempt(
            [
                'email' => $this->email,
                'password' => $this->password,
            ]
        )) {
            session()->flash('message', "Bienvenue !");
        } else {
            session()->flash('error', 'Vos informations sont inexactes.');
        }
    }

}
