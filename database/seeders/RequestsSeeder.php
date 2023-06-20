<?php

namespace Database\Seeders;
use App\Models\Requests;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RequestsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Requests::create([
            'title' => 'Request1',
            'text' => 'This is seeder data for requests that should be handeled by the admins!',
            'user_id' => '2'
            
    
            ]);
    }
}
