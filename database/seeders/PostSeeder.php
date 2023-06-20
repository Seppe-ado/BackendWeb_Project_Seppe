<?php

namespace Database\Seeders;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Post::create([
            'title' => 'SeederPost1',
            'text' => 'This is a seeder post to make this website functional, thank you for testing!',
            'user_id' => '1'
            
    
            ]);
            Post::create([
                'title' => 'SeederPost2',
                'text' => 'This is a seeder post to make this website functional, thank you for testing!This is a seeder post to make this website functional, thank you for testing! This is a seeder post to make this website functional, thank you for testing! This is a seeder post to make this website functional, thank you for testing! This is a seeder post to make this website functional, thank you for testing! This is a seeder post to make this website functional, thank you for testing! ',
                'user_id' => '2'
                
        
                ]);
                Post::create([
                    'title' => 'SeederPost3',
                    'text' => 'This is a seeder post to make this website functional, thank you for testing!',
                    'user_id' => '3'
                    
            
                    ]);
                    Post::create([
                        'title' => 'SeederPost4',
                        'text' => 'This is a seeder post to make this website functional, thank you for testing! This is a seeder post to make this website functional, thank you for testing! This is a seeder post to make this website functional, thank you for testing! ',
                        'user_id' => '1'
                        
                
                        ]);
    }
}
