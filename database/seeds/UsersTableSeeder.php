<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([

            'name' => 'admin',
            'email' => 'Bhumitpatel58@gmail.com',
            'password' => bcrypt('password'),
            'admin' => 1
        
        ]);

        App\User::create([

            'name' => 'Bhumit Patel',
            'email' => 'Bhumitpatel7924@gmail.com',
            'password' => bcrypt('bhumit123'),
        
        ]);

        App\User::create([

            'name' => 'Jaanvi Patel',
            'email' => 'Bhumitpatel003@gmail.com',
            'password' => bcrypt('jaanvi123'),
        
        ]);
    }
}
