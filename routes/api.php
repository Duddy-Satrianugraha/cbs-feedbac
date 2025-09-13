<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/avatars', function (Request $request) {
    $npms = $request->input('npms', []);

    $result = [];
    foreach ($npms as $npm) {
        // Misalnya avatar tersimpan di storage atau DB mahasiswa
        $mahasiswa = \App\Models\User::where('username', $npm)->first();

        $result[$npm] = $mahasiswa && $mahasiswa->avatar
            ? basename($mahasiswa->avatar)
            : null;
    }

    return response()->json($result);
});
