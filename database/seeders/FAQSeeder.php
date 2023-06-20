<?php

namespace Database\Seeders;
use App\Models\FAQ;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FAQSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        FAQ::create([
            'title' => 'Why',
            'text' => 'This website is supposed to be all about being able to share your base location in game and thus inspire other people to potentially do the same as you.'
            
    
            ]);
            FAQ::create([
                'title' => 'FAQ1',
                'text' => 'This is a seeder FAQ to make this website functional, thank you for testing!'
                
        
                ]);
                FAQ::create([
                    'title' => 'FAQ2',
                    'text' => 'This is a seeder FAQ to make this website functional, thank you for testing!'
                    
            
                    ]);
                    FAQ::create([
                        'title' => 'FAQ3',
                        'text' => 'This is a seeder FAQ to make this website functional, thank you for testing!'
                        
                
                        ]);
    }
}
