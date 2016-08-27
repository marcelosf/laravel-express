<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        App\User::truncate();
        
        factory(App\User::class, 1)->create([
            
            'name' => 'Marcelo',
            'email' => 'marcelo@marcelo.com',
            'password' => bcrypt(123),
            'remember_token' => str_random(10),
        
        ]);
        
    }
}
