<?php

namespace App\Actions\Fortify;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
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
    public function create(array $input): User
    {

        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'npm' => [
                'required',
                'numeric',
                'size:9', //123170157
                Rule::unique(User::class),
            ],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
            'captcha' => [
                            'required','numeric',
                            function ($attribute, $value, $fail) {
                                if (!verify_captcha($value)) {
                                    $fail('Jawaban CAPTCHA salah cuy, gimana sih');
                                }
                            },
                        ],
        ])->validate();
        $slug = md5($input['npm']);
        $username = $input['npm'];
        $role = Role::where('u_id', 1)->first()->id;

//dd($slug);
        $user = User::create([
            'name' => $input['name'],
            'username' => $username,
            'slug' => $slug,
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
        $user->roles()->attach($role);
        return $user;
    }
}
