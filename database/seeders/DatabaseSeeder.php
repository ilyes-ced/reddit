<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


        Db::table('users')->insert([
            'username' => 'ilyes',
            'email' => 'ilyes@gmail.com',
            'password' => Hash::make('11062001'),
            'profile_image' => 'pic5.png'
        ]);  
        
        Db::table('subs')->insert([
            'owner_id' => 1,
            'name' => 'deep rock galactica',
            'description' => 'sub reddit for all deep rock fans',
            'number_of_members' => 1,
            'images' => json_encode(['pic5.jpg', 'pic2.jpg']),
        ]);          
        Db::table('subs')->insert([
            'owner_id' => 1,
            'name' => 'dark souls',
            'description' => 'sub reddit for all dark souls fans',
            'number_of_members' => 1,
            'images' => json_encode(['pic11.jpg', 'pic12.jpg']),
        ]);  
        
        Db::table('subs')->insert([
            'owner_id' => 1,
            'name' => 'web design',
            'description' => 'sub reddit ui/ux design',
            'number_of_members' => 1,
            'images' => json_encode(['17.png', '18.png']),
        ]);


        Db::table('posts')->insert([
            'owner_id' => 1,
            'sub_id' => '1',
            'content' => '',
            'views' => 1,
            'heat' => json_encode(['17.png', '18.png']),
        ]);
    }
}
