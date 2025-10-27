<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'      =>'root',
            'username'  =>'root',
            'numdoc' =>'00000000',
            'rol'       =>'root',
            'estado'    =>'1',
            'email'     =>'root@root.com',
            'password'  =>bcrypt('admin123')
        ])->assignRole('root');

        User::create([
            'name'      =>'Jorge Luis Fiueroa Ormeño',
            'username'  =>'jfigueroa',
            'numdoc' =>'70919692',
            'rol'       =>'admin',
            'estado'    =>'1',
            'email'     =>'jfigueroa@gmail.com',
            'password'  =>bcrypt('70919692')
        ])->assignRole('admin');

    }
}
