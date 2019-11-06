<?php

use Illuminate\Database\Seeder;

class GenresTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    
    DB::table('genres')->truncate();

    $genres = config('genre');

    foreach ($genres as $genre) {
      DB::table('genres')->insert([
        'name' => $genre
      ]);
    }
    

  }
}
