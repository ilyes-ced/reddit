<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('profile_image')->default('pic5.jpg');

            $table->integer('heat')->default(0);            
            $table->json('bookmarks');
            $table->json('joined_subs');
            $table->json('comments');
            $table->json('my_posts');
            $table->json('my_subs');
            
            $table->json('up_votes');
            $table->json('down_votes');
            $table->json('up_votes_comments');
            $table->json('down_votes_comments');

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
};
