<?php

namespace Database\Seeders;
use APP\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user       = new User();
        $user->name ="Azim";
        $user->email="azimuddin807@gmail.com";
        $user->password = bcrypt(value:'password');
        $user->save();

    }
}
