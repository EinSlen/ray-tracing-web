<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Validator\UserValidator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input)
    {

        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],

            'email' => ['required', 'string', 'email', 'max:255', Rule::unique(User::class)],
            //'password' => $this->passwordRules(),
            'password' => ['required', 'string', 'max:20'],
            'password_confirmation' => ['required', 'same:password'],

        ])->validate();


            return User::create([
                'name' => $input['name'],
                'email' => $input['email'],
                'password' => Hash::make($input['password']),
                'admin' => false,
                'avatar' =>'sample.png'
            ]);

    }
}
