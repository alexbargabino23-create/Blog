<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BlogSeeder extends Seeder
{
    public function run()
    {
        // Disable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Clear tables
        DB::table('comments')->truncate();
        DB::table('posts')->truncate();
        DB::table('users')->truncate();

        // Re-enable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Insert sample users
        DB::table('users')->insert([
            [
                'name' => 'Juan Dela Cruz',
                'email' => 'juan@example.com',
                'password' => bcrypt('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Maria Clara',
                'email' => 'maria@example.com',
                'password' => bcrypt('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

        // Insert sample posts
        DB::table('posts')->insert([
            [
                'user_id' => 1,
                'title' => 'My First Blog Post',
                'body' => 'This is a sample blog post. Welcome to my blog!',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'title' => 'Laravel is Awesome',
                'body' => 'Laravel makes building web apps super easy and fun!',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

        // Insert sample comments
        DB::table('comments')->insert([
            [
                'post_id' => 1,
                'user_id' => 2,
                'body' => 'Great first post, Juan!',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'post_id' => 2,
                'user_id' => 1,
                'body' => 'Absolutely! Laravel rocks!',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }

}
