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

           $validator = Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'username' => [
                'required',
                'numeric',
                'digits:9',
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
                        $fail('Jawaban CAPTCHA salah cuy, gimana sih 😅');
                    }
                },
            ],
        ], [
            // custom messages di sini
            'name.required'     => 'Nama wajib diisi.',
            'name.max'          => 'Nama maksimal 255 karakter.',
            'username.required' => 'NPM wajib diisi.',
            'username.numeric'  => 'NPM harus berupa angka.',
            'username.digits'   => 'NPM harus terdiri dari 9 digit angka.',
            'username.unique'   => 'NPM ini sudah terdaftar, silakan login.',
            'email.required'    => 'Email wajib diisi.',
            'email.email'       => 'Format email tidak valid.',
            'email.max'         => 'Email terlalu panjang, maksimal 255 karakter.',
            'email.unique'      => 'Email ini sudah digunakan.',
            'password.required' => 'Kata sandi wajib diisi.',
            'captcha.required'  => 'CAPTCHA harus diisi.',
            'captcha.numeric'   => 'Jawaban CAPTCHA harus berupa angka.',
        ]);

        $validator->validate();
        $slug = md5($input['username']);
        $username = $input['username'];
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
