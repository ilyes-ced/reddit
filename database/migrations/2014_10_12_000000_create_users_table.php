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
            $table->json('joined_subs')->default('[]');
            $table->json('liked_posts')->default('[]');
            $table->json('comments')->default('[]');
            $table->json('my_posts')->default('[]');
            $table->json('my_subs')->default('[]');
            
            $table->json('up_votes')->default('[]');
            $table->json('down_votes')->default('[]');

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
