<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Str;


use Livewire\Component;

class Register extends Component
{
    public string $firstname ='';
    public string $lastname ='';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    // Message d'erreurs lors de la validation

    protected function messages()
    {
        return [
            'firstname.required' => 'Le prénom est obligatoire.',
            'lastname.required' => 'Le nom est obligatoire.',
            'email.required' => "L'adresse mail est obligatoire.",
            'email.email' => 'Veuillez entrer une adresse mail valide.',
            'email.unique' => 'Cette adresse mail existe déjà.',
            'password.required' => 'Le mot de passe est obligatoire.',
            'password.min' => 'Le mot de passe doit avoir au moins 8 caractères.',
            'password.confirmed' => 'Les mots de passe sont différents.',
            'password_confirmation.required' => 'Le mot de passe est obligatoire.',
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
                'password_confirmation' => $this->password_confirmation,
            ],
            [
                'firstname' => ['required'],
                'lastname' => ['required'],
                'email' => ['required', 'email','unique:users'],
                'password' => ['required', 'confirmed', Password::min(8)],
                'password_confirmation' => ['required'],
            ],
            $this->messages()

        )->validate();

        foreach (['firstname', 'lastname'] as $val) {
            $validatedData[$val] = Str::ucfirst($validatedData[$val]);
        }

        $this->password = Hash::make($this->password); 

        User::create($validatedData);

        $this->reset([ 'firstname', 'lastname', 'email' , 'password', 'password_confirmation']);
        
        session()->flash('message', "Votre compte a été crée avec succès !");

    }
}
