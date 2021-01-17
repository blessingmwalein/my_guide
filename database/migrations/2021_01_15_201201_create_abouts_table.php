<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->integer('profile_id');
            $table->text('about_user')->default('');
            $table->string('github_link')->default('');
            $table->string('social_media_link')->default('');
            $table->string('city')->default('');
            $table->string('personal_site')->default('');
            $table->text('current_status')->default('');
            $table->text('techs_uses');
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
        Schema::dropIfExists('abouts');
    }
}
