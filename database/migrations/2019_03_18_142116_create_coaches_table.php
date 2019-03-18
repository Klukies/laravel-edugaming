<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoachesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coaches', function (Blueprint $table) {
            $table->bigIncrements('coach_id');
            $table->string('username');
            $table->string('email');
            $table->string('password');
            $table->text('summary')->nullable();
            $table->text('description')->nullable();
            $table->string('img_url')->default("http://localhost:3000/images/standard_avatar.png");
            $table->integer('price')->default(10);
            $table->integer('game_id')->default(1)->references('game_id')->on('games')->onDelete('cascade');
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
        Schema::dropIfExists('coaches');
    }
}
