<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reviews')->insert([
            'id' => 1,
            'title' => 'I love it!',
            'rating' => 5,
            'review' => 'Its perfect, exactly what I needed for my gaming computer.',
            'user_id' => 1,
            'product_id' => 1,
            'likes' => 0,
            'dislikes' => 0,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('reviews')->insert([
            'id' => 2,
            'title' => 'Okay',
            'rating' => 3,
            'review' => 'Its pretty good, could be better though.',
            'user_id' => 4,
            'product_id' => 3,
            'likes' => 0,
            'dislikes' => 0,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('reviews')->insert([
            'id' => 3,
            'title' => 'Good',
            'rating' => 4,
            'review' => 'Works well, I like it.',
            'user_id' => 3,
            'product_id' => 4,
            'likes' => 0,
            'dislikes' => 0,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('reviews')->insert([
            'id' => 4,
            'title' => 'Not good',
            'rating' => 1,
            'review' => 'It gets hot and switches off.',
            'user_id' => 2,
            'product_id' => 5,
            'likes' => 0,
            'dislikes' => 0,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('reviews')->insert([
            'id' => 5,
            'title' => 'I like it!',
            'rating' => 5,
            'review' => 'Its great for my computer.',
            'user_id' => 3,
            'product_id' => 1,
            'likes' => 0,
            'dislikes' => 0,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('reviews')->insert([
            'id' => 6,
            'title' => 'Yes!',
            'rating' => 5,
            'review' => 'The pixels!!!!!',
            'user_id' => 2,
            'product_id' => 1,
            'likes' => 0,
            'dislikes' => 0,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('reviews')->insert([
            'id' => 7,
            'title' => 'Wow!',
            'rating' => 4,
            'review' => 'Much graphics',
            'user_id' => 5,
            'product_id' => 1,
            'likes' => 0,
            'dislikes' => 0,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('reviews')->insert([
            'id' => 8,
            'title' => 'Great',
            'rating' => 3,
            'review' => 'Quite as a mouse.',
            'user_id' => 4,
            'product_id' => 1,
            'likes' => 0,
            'dislikes' => 0,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('reviews')->insert([
            'id' => 9,
            'title' => 'Not too shabby',
            'rating' => 5,
            'review' => 'I like it.',
            'user_id' => 3,
            'product_id' => 1,
            'likes' => 0,
            'dislikes' => 0,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        DB::table('reviews')->insert([
            'id' => 10,
            'title' => 'Best gpu in market',
            'rating' => 5,
            'review' => 'I brought this for my 47yr old son and he said it was PERFECT he can now run 150 Fps+ on Cyberpunk on high graphic settings, This thing is 100% worth it and easily the best on the market ',
            'user_id' => 6,
            'product_id' => 1,
            'likes' => 0,
            'dislikes' => 0,
            'created_at' => DB::raw('CURRENT_TIMESTAMP'),
            'updated_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
    }
}
