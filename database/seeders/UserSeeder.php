<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
   
    public function run()
    {
        User::create([
            'name' => 'Enrique Chavez',
            'email' => 'enrique.chavez.r97@gmail.com',
            'password' => bcrypt('12345678')
    ])->assignRole('admin');

    }
}
