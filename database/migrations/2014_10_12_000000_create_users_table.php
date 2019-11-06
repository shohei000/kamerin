<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('role')->default(1);
            $table->string('name');
            $table->string('email')->unique();
            $table->integer('opend')->nullable()->default(1);
            $table->boolean('dm_ok')->default(1);
            $table->string('icon_url')->nullable();
            $table->string('twitter')->nullable();
            $table->string('profile_text')->nullable();
            $table->string('location')->nullable();                       //活動場所
            $table->string('tool')->nullable();                           //機材
            $table->integer('price')->nullable();                         //料金
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
