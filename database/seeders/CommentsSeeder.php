<?php

namespace Database\Seeders;
use App\Models\Comments;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Comments::create([
            
            'text' => 'This is a seeder comment to make this website functional, thank you for testing!',
            'user_id' => '1',
            'post_id' => '1'
            
    
            ]);
            Comments::create([
            
                'text' => 'This is a seeder comment to make this website functional, thank you for testing!',
                'user_id' => '3',
                'post_id' => '1'
                
        
                ]);
                Comments::create([
            
                    'text' => 'This is a seeder comment to make this website functional, thank you for testing!',
                    'user_id' => '1',
                    'post_id' => '2'
                    
            
                    ]);
    }
}
