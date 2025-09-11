<?php

namespace App\Actions\Fortify;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class CustomLoginHandler
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'password' => 'required',
            'username' => ['required','numeric'],
            'captcha' => [
            'required','numeric',
            function ($attribute, $value, $fail) {
                if (!verify_captcha($value)) {
                    $fail('Jawaban CAPTCHA salah cuy, gimana sih');
                }
            },
        ],
        ],
    [
        'username.required' => 'Nomor Pokok mahasiswa tidak boleh kosong',
        'username.numeric' => 'Nomor Pokok mahasiswa harus berupa angka',
        'password.required' => 'Password tidak boleh kosong',
        'captcha.required' => 'Jawaban captcha tidak boleh kosong',
        'captcha.numeric' => 'Jawaban captcha harus berupa angka',

    ]);
        $username = $request->username;
    //dd($request->all());
        $user = User::where('username', $username)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);
            return $user;
        }

        return null;
    }
}
