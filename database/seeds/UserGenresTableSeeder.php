<?php

use Illuminate\Database\Seeder;

class UserGenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_genres')->truncate();
        $genres = config('genre');
        foreach (range(1, 10) as $num) {
            DB::table('user_genres')->insert([
                'user_id' => rand(1,10),
                'genre_id' => rand(1,3)
            ]);
        }
    }
}
