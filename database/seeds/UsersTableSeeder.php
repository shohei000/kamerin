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

    DB::table('users')->insert([
      'role' => 1,
      'name' => 'テスト太郎',
      'email' => 'sainoshohei@dande-lion.co.jp',
      'icon_url' => '/assets/img/human/1.jpeg',
      'opend' => rand(0,1),
      'dm_ok' => 1,
      'twitter' => 'https://twitter.com',
      'profile_text' => 'テストのプロフィールのテキストプロフィールのテキストプロフィールのテキストプロフィールのテキスト',
      'location' => '東京,神奈川',
      'tool' => '一眼レフ',
      'price' => rand(1,2),
      'password' => \Hash::make('a10101010'),
      'email_verified_at' => new DateTime(),
      'created_at' => new DateTime(),
      'updated_at' => new DateTime(),
    ]);
    foreach (range(1, 10) as $num) {
      DB::table('users')->insert([
        'role' => 1,
        'name' => $num . 'ユーザー名',
        'email' => $faker->email,
        'icon_url' => '/assets/img/human/' . $num .'.jpeg',
        'opend' => rand(0,1),
        'dm_ok' => rand(0,1),
        'twitter' => 'https://twitter.com',
        'profile_text' => $num .'プロフィールのテキストプロフィールのテキストプロフィールのテキストプロフィールのテキスト',
        'location' => '東京,神奈川',
        'tool' => '一眼レフ',
        'price' => rand(1,2),
        'password' => $faker->password,
        'email_verified_at' => new DateTime(),
        'created_at' => new DateTime(),
        'updated_at' => new DateTime(),
      ]);
    }
  }

}
