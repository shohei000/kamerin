<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
  public function run()
  {
    DB::table('users')->truncate();
    $faker = Faker\Factory::create('ja_JP');
    foreach (range(1, 10) as $num) {
      DB::table('users')->insert([
        'role' => 1,
        'name' => $num . 'ユーザー名',
        'email' => $faker->email,
        'icon_url' => '/assets/img/human/' . $num .'.jpeg',
        'twitter_url' => 'https://twitter.com',
        'profile_text' => $num .'プロフィールのテキストプロフィールのテキストプロフィールのテキストプロフィールのテキスト',
        'photo_1' => '/assets/img/1.jpeg',
        'photo_2' => '/assets/img/2.jpeg',
        'photo_3' => '/assets/img/3.jpeg',
        'photo_4' => '/assets/img/4.jpeg',
        'photo_5' => '/assets/img/1.jpeg',
        'equipment' => '一眼レフ',
        'price' => rand(1,2),
        'password' => $faker->password,
        'email_verified_at' => new DateTime(),
        'created_at' => new DateTime(),
        'updated_at' => new DateTime(),
      ]);
    }
  }

}
