<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Illuminate\Support\Facades\Hash;

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
            'profile_image' => 'pic2.jpg',
            'bookmarks' => '[]',
            'joined_subs' => '[1, 2, 3]',
            'comments' => '[]',
            'my_posts' => '[]',
            'my_subs' => '[1]',
            'up_votes' => '[]',
            'down_votes' => '[]',
            'up_votes_comments' => '[]',
            'down_votes_comments' => '[]'
        ]);  
        Db::table('users')->insert([
            'username' => 'alex',
            'email' => 'alex@gmail.com',
            'password' => Hash::make('11062001'),
            'profile_image' => 'pic8.jpg',
            'bookmarks' => '[]',
            'joined_subs' => '[]',
            'comments' => '[]',
            'my_posts' => '[]',
            'my_subs' => '[]',
            'up_votes' => '[]',
            'down_votes' => '[]',
            'up_votes_comments' => '[]',
            'down_votes_comments' => '[]'
        ]);  
        Db::table('users')->insert([
            'username' => 'james',
            'email' => 'james@gmail.com',
            'password' => Hash::make('11062001'),
            'profile_image' => 'pic9.jpg',
            'bookmarks' => '[]',
            'joined_subs' => '[]',
            'comments' => '[]',
            'my_posts' => '[]',
            'my_subs' => '[]',
            'up_votes' => '[]',
            'down_votes' => '[]',
            'up_votes_comments' => '[]',
            'down_votes_comments' => '[]'
        ]);  
        Db::table('users')->insert([
            'username' => 'tomass',
            'email' => 'tomass@gmail.com',
            'password' => Hash::make('11062001'),
            'profile_image' => 'pic10.jpg',
            'bookmarks' => '[]',
            'joined_subs' => '[]',
            'comments' => '[]',
            'my_posts' => '[]',
            'my_subs' => '[]',
            'up_votes' => '[]',
            'down_votes' => '[]',
            'up_votes_comments' => '[]',
            'down_votes_comments' => '[]'
        ]);  
        

        Db::table('subs')->insert([
            'owner_id' => 1,
            'name' => 'deep rock galactica',
            'description' => 'sub reddit for all deep rock fans',
            'number_of_members' => 1,
            'images' => json_encode(['pic5.jpg', 'pic2.jpg']),
        ]);          
        Db::table('subs')->insert([
            'owner_id' => 2,
            'name' => 'dark souls',
            'description' => 'sub reddit for all dark souls fans',
            'number_of_members' => 1,
            'images' => json_encode(['pic11.jpg', 'pic12.jpg']),
        ]);  
        Db::table('subs')->insert([
            'owner_id' => 3,
            'name' => 'web design',
            'description' => 'sub reddit ui/ux design',
            'number_of_members' => 1,
            'images' => json_encode(['17.png', '18.png']),
        ]);


        Db::table('posts')->insert([
            'owner_id' => 1,
            'sub_id' => '1',
            'content' => json_encode([
                'title'=> 'my first post in deep rock sub',
                'body'=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quam id leo in vitae turpis massa sed. At quis risus sed vulputate odio. Proin fermentum leo vel orci porta non pulvinar neque laoreet. Massa ultricies mi quis hendrerit dolor magna eget. Vestibulum lectus mauris ultrices eros in cursus turpis. Quam viverra orci sagittis eu. Nascetur ridiculus mus mauris vitae ultricies. Porta non pulvinar neque laoreet suspendisse interdum consectetur libero. Velit sed ullamcorper morbi tincidunt. Natoque penatibus et magnis dis parturient montes nascetur ridiculus mus. Amet consectetur adipiscing elit duis tristique. Ut tristique et egestas quis ipsum suspendisse. Interdum posuere lorem ipsum dolor sit amet consectetur adipiscing elit. Sed nisi lacus sed viverra tellus in hac habitasse platea. Tincidunt vitae semper quis lectus nulla at volutpat diam ut. Ut consequat semper viverra nam libero justo. Consectetur purus ut faucibus pulvinar. A diam sollicitudin tempor id eu nisl nunc mi ipsum.',
                'images'=> json_encode(['pic5.jpg', 'pic3.jpg']),
            ])
        ]);
        Db::table('posts')->insert([
            'owner_id' => 1,
            'sub_id' => '2',
            'content' => json_encode([
                'title'=> 'my first post in dark souls sub',
                'body'=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quam id leo in vitae turpis massa sed. At quis risus sed vulputate odio. Proin fermentum leo vel orci porta non pulvinar neque laoreet. Massa ultricies mi quis hendrerit dolor magna eget. Vestibulum lectus mauris ultrices eros in cursus turpis. Quam viverra orci sagittis eu. Nascetur ridiculus mus mauris vitae ultricies. Porta non pulvinar neque laoreet suspendisse interdum consectetur libero. Velit sed ullamcorper morbi tincidunt. Natoque penatibus et magnis dis parturient montes nascetur ridiculus mus. Amet consectetur adipiscing elit duis tristique. Ut tristique et egestas quis ipsum suspendisse. Interdum posuere lorem ipsum dolor sit amet consectetur adipiscing elit. Sed nisi lacus sed viverra tellus in hac habitasse platea. Tincidunt vitae semper quis lectus nulla at volutpat diam ut. Ut consequat semper viverra nam libero justo. Consectetur purus ut faucibus pulvinar. A diam sollicitudin tempor id eu nisl nunc mi ipsum.',
                'images'=> json_encode(['pic15.jpg', 'pic16.jpg']),
            ])
        ]);
        Db::table('posts')->insert([
            'owner_id' => 1,
            'sub_id' => '3',
            'content' => json_encode([
                'title'=> 'my first post in ui ui ssb',
                'body'=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quam id leo in vitae turpis massa sed. At quis risus sed vulputate odio. Proin fermentum leo vel orci porta non pulvinar neque laoreet. Massa ultricies mi quis hendrerit dolor magna eget. Vestibulum lectus mauris ultrices eros in cursus turpis. Quam viverra orci sagittis eu. Nascetur ridiculus mus mauris vitae ultricies. Porta non pulvinar neque laoreet suspendisse interdum consectetur libero. Velit sed ullamcorper morbi tincidunt. Natoque penatibus et magnis dis parturient montes nascetur ridiculus mus. Amet consectetur adipiscing elit duis tristique. Ut tristique et egestas quis ipsum suspendisse. Interdum posuere lorem ipsum dolor sit amet consectetur adipiscing elit. Sed nisi lacus sed viverra tellus in hac habitasse platea. Tincidunt vitae semper quis lectus nulla at volutpat diam ut. Ut consequat semper viverra nam libero justo. Consectetur purus ut faucibus pulvinar. A diam sollicitudin tempor id eu nisl nunc mi ipsum.',
                'images'=> json_encode(['17.png', '19.png']),
            ])
        ]);



        Db::table('posts')->insert([
            'owner_id' => 2,
            'sub_id' => '1',
            'content' => json_encode([
                'title'=> 'my first post in dark souls sb',
                'body'=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quam id leo in vitae turpis massa sed. At quis risus sed vulputate odio. Proin fermentum leo vel orci porta non pulvinar neque laoreet. Massa ultricies mi quis hendrerit dolor magna eget. Vestibulum lectus mauris ultrices eros in cursus turpis. Quam viverra orci sagittis eu. Nascetur ridiculus mus mauris vitae ultricies. Porta non pulvinar neque laoreet suspendisse interdum consectetur libero. Velit sed ullamcorper morbi tincidunt. Natoque penatibus et magnis dis parturient montes nascetur ridiculus mus. Amet consectetur adipiscing elit duis tristique. Ut tristique et egestas quis ipsum suspendisse. Interdum posuere lorem ipsum dolor sit amet consectetur adipiscing elit. Sed nisi lacus sed viverra tellus in hac habitasse platea. Tincidunt vitae semper quis lectus nulla at volutpat diam ut. Ut consequat semper viverra nam libero justo. Consectetur purus ut faucibus pulvinar. A diam sollicitudin tempor id eu nisl nunc mi ipsum.',
            ])
        ]);
        Db::table('posts')->insert([
            'owner_id' => 2,
            'sub_id' => '2',
            'content' => json_encode([
                'title'=> 'my first post in dark souls sb',
                'body'=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quam id leo in vitae turpis massa sed. At quis risus sed vulputate odio. Proin fermentum leo vel orci porta non pulvinar neque laoreet. Massa ultricies mi quis hendrerit dolor magna eget. Vestibulum lectus mauris ultrices eros in cursus turpis. Quam viverra orci sagittis eu. Nascetur ridiculus mus mauris vitae ultricies. Porta non pulvinar neque laoreet suspendisse interdum consectetur libero. Velit sed ullamcorper morbi tincidunt. Natoque penatibus et magnis dis parturient montes nascetur ridiculus mus. Amet consectetur adipiscing elit duis tristique. Ut tristique et egestas quis ipsum suspendisse. Interdum posuere lorem ipsum dolor sit amet consectetur adipiscing elit. Sed nisi lacus sed viverra tellus in hac habitasse platea. Tincidunt vitae semper quis lectus nulla at volutpat diam ut. Ut consequat semper viverra nam libero justo. Consectetur purus ut faucibus pulvinar. A diam sollicitudin tempor id eu nisl nunc mi ipsum.',
            ])
        ]);
        Db::table('posts')->insert([
            'owner_id' => 3,
            'sub_id' => '3',
            'content' => json_encode([
                'title'=> 'my first post in dark souls sb',
                'body'=> 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quam id leo in vitae turpis massa sed. At quis risus sed vulputate odio. Proin fermentum leo vel orci porta non pulvinar neque laoreet. Massa ultricies mi quis hendrerit dolor magna eget. Vestibulum lectus mauris ultrices eros in cursus turpis. Quam viverra orci sagittis eu. Nascetur ridiculus mus mauris vitae ultricies. Porta non pulvinar neque laoreet suspendisse interdum consectetur libero. Velit sed ullamcorper morbi tincidunt. Natoque penatibus et magnis dis parturient montes nascetur ridiculus mus. Amet consectetur adipiscing elit duis tristique. Ut tristique et egestas quis ipsum suspendisse. Interdum posuere lorem ipsum dolor sit amet consectetur adipiscing elit. Sed nisi lacus sed viverra tellus in hac habitasse platea. Tincidunt vitae semper quis lectus nulla at volutpat diam ut. Ut consequat semper viverra nam libero justo. Consectetur purus ut faucibus pulvinar. A diam sollicitudin tempor id eu nisl nunc mi ipsum.',
            ])
        ]);
    }
}
