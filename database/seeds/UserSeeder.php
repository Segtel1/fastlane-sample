<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        User::create([
            
            'email' => 'admin@mail.com',
            'password' => bcrypt('Test1234'),
            'admin' => 1
        ]);

    }
}
