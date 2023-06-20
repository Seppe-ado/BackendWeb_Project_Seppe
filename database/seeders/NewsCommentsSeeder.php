<?php

namespace Database\Seeders;
use App\Models\NewsComments;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NewsCommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        NewsComments::create([
            
            'text' => 'This is a seeder comment to make this website functional, thank you for testing!',
            'user_id' => '1',
            'news_id' => '1'
            
    
            ]);
            NewsComments::create([
            
                'text' => 'This is a seeder comment to make this website functional, thank you for testing!',
                'user_id' => '2',
                'news_id' => '1'
                
        
                ]);
                NewsComments::create([
            
                    'text' => 'This is a seeder comment to make this website functional, thank you for testing!',
                    'user_id' => '1',
                    'news_id' => '3'
                    
            
                    ]);
                    NewsComments::create([
            
                        'text' => 'This is a seeder comment to make this website functional, thank you for testing!',
                        'user_id' => '3',
                        'news_id' => '3'
                        
                
                        ]);
    }
}
