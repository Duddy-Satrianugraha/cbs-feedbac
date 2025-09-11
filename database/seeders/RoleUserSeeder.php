<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ultra= User::where('username','9999')->first();
        $it= User::where('username','0000')->first();
        $mhs= User::where('username','99')->first();



        $r_ultra = Role::where('u_id', 99)->first()->id;
        $r_it = Role::where('u_id', 98)->first()->id;
        $r_mhs = Role::where('u_id', 1)->first()->id;



        $ultra->roles()->attach($r_ultra);
        $it->roles()->attach($r_it);
        $mhs->roles()->attach($r_mhs);

    }
}
