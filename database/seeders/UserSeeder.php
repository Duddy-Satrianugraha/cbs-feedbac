<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => "Super admin",
            'username' => "9999",
            'slug' => 'xxx_999_1',
            'email' => 'ultra@fk.ugj',
            'email_verified_at' => now(),
            'password' => Hash::make('buka'),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => "Mas IT",
            'username' => "0000",
            'slug' => 'xxx_999_2',
            'email' => 'it@fk.ugj',
            'email_verified_at' => now(),
            'password' => Hash::make('buka'),
            'remember_token' => Str::random(10),
        ]);
         User::create([
            'name' => "Mas Mahasiswa",
            'username' => "99",
            'slug' => 'xxx_999_2',
            'email' => 'mhs@fk.ugj',
            'email_verified_at' => now(),
            'password' => Hash::make('buka'),
            'remember_token' => Str::random(10),
        ]);




    }

}
