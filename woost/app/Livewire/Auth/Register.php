<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

use Livewire\Component;

class Register extends Component
{
    public $firstname ='';
    public $lastname ='';
    public $email = '';
    public $password = '';
    public $password_confirm = '';

    // Message d'erreurs lors de la validation

    protected function messages()
    {
        return [
            'email.required' => "L'adresse mail est obligatoire.",
            'email.email' => 'Veuillez entrer une adresse mail valide.',
            'password.required' => "Le mot de passe est obligatoire.",
        ];
    }

    public function register()
    {
        $validatedData = Validator::make(
            [
                'firstname' => $this->firstname,
                'lastname' => $this->lastname,
                'email' => $this->email,
                'password' => $this->password,
                'password_confirm' => $this->password_confirm,
            ],
            [
                'firstname' => ['required'],
                'lastname' => ['required'],
                'email' => ['required', 'email','unique:email'],
                'password' => ['required', 'min:8'],
                'password_confirm' => ['required', 'min:8'],
            ],
            $this->messages()

        )->validate();

        foreach (['firstname', 'lastname'] as $val) {
            $validatedData[$val] = Str::ucfirst($validatedData[$val]);
        }

    }
}
