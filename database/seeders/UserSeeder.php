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

        User::create([
            'name' => "Tyara Carolina Zahra",
            'username' => "124170157",
            'slug' => '53a438380a7af42b5f68edf699cf361d',
            'email' => 'mhs1@fk.ugj',
            'email_verified_at' => now(),
            'password' => Hash::make('buka'),
            'remember_token' => Str::random(10),
        ]);
        User::create([
            'name' => "zahra adelia",
            'username' => "124170162",
            'slug' => '2113defd61e84a3c527f267e1f80c123',
            'email' => 'mhs2@fk.ugj',
            'email_verified_at' => now(),
            'password' => Hash::make('buka'),
            'remember_token' => Str::random(10),
        ]);
        User::create([
            'name' => "Elvina Amelia Putri",
            'username' => "124170039",
            'slug' => 'b9547ca07bb1d881b7d259e82cf96144',
            'email' => 'mhs3@fk.ugj',
            'email_verified_at' => now(),
            'password' => Hash::make('buka'),
            'remember_token' => Str::random(10),
        ]);
        User::create([
            'name' => "Noer Fathimah Azzahra ",
            'username' => "124170118",
            'slug' => '9b9d75d00f582ae1743b38d9b35c2af4',
            'email' => 'mhs4@fk.ugj',
            'email_verified_at' => now(),
            'password' => Hash::make('buka'),
            'remember_token' => Str::random(10),
        ]);
        User::create([
            'name' => "Nazla Amalia Bilqis ",
            'username' => "124170114",
            'slug' => 'bff4e5eacf22abc1c27de512671a765b',
            'email' => 'mhs5@fk.ugj',
            'email_verified_at' => now(),
            'password' => Hash::make('buka'),
            'remember_token' => Str::random(10),
        ]);




    }

}
