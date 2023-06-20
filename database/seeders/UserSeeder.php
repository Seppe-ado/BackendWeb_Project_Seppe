<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        
        User::create([
        'name' => 'admin',
        'email' => 'admin@ehb.be',
        'password' => 'Password!321',
        'is_admin' => '1'

        ]);
        User::create([
            'name' => 'user1',
            'email' => 'user1@ehb.be',
            'password' => 'Password!321'
    
            ]);
            User::create([
                'name' => 'user2',
                'email' => 'user2@ehb.be',
                'password' => 'Password!321'
        
                ]);

                User::create([
                    'name' => 'user3',
                    'email' => 'user3@ehb.be',
                    'password' => 'Password!321'
            
                    ]);
        
        
    }
}
