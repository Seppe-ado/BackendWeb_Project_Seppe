<?php

namespace Database\Seeders;
use App\Models\News;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        News::create([
            'title' => 'Seedernews1',
            'text' => 'This is a seeder news to make this website functional, thank you for testing!',
            'user_id' => '1'
            
    
            ]);
            News::create([
                'title' => 'Seedernews2',
                'text' => 'This is a seeder news to make this website functional, thank you for testing!',
                'user_id' => '1'
                
        
                ]);
                News::create([
                    'title' => 'Seedernews3',
                    'text' => 'This is a seeder news to make this website functional, thank you for testing!',
                    'user_id' => '1'
                    
            
                    ]);
                    News::create([
                        'title' => 'Seedernews4',
                        'text' => 'This is a seeder news to make this website functional, thank you for testing!',
                        'user_id' => '1'
                        
                
                        ]);
    }
}
