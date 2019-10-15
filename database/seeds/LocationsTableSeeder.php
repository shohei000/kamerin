<?php

use Illuminate\Database\Seeder;

class LocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('locations')->truncate();

      $locations = config('location');

      foreach ($locations as $key => $location) {
        DB::table('locations')->insert([
          'name' => $location
        ]);
      }
    }
}
