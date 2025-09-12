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
        $mhs1= User::where('username','124170114')->first();
         $mhs2= User::where('username','124170118')->first();
         $mhs3= User::where('username','124170157')->first();
         $mhs4= User::where('username','124170162')->first();
         $mhs5= User::where('username','124170039')->first();



        $r_ultra = Role::where('u_id', 99)->first()->id;
        $r_it = Role::where('u_id', 98)->first()->id;
        $r_mhs = Role::where('u_id', 1)->first()->id;



        $ultra->roles()->attach($r_ultra);
        $it->roles()->attach($r_it);
        $mhs->roles()->attach($r_mhs);
        $mhs1->roles()->attach($r_mhs);
        $mhs2->roles()->attach($r_mhs);
        $mhs3->roles()->attach($r_mhs);
        $mhs4->roles()->attach($r_mhs);
        $mhs5->roles()->attach($r_mhs); 

    }
}
