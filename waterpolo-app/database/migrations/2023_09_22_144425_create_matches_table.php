<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('home_id');
            $table->unsignedBigInteger('away_id');
            $table->unsignedBigInteger('user_id');
            $table->integer('bekeken')->nullable();
            $table->timestamps();
        });

//        Schema::table('matches', function (Blueprint $table) {
//            $table->foreign('home_id')->references('id')->on('teams')->onDelete('cascade');
//            $table->foreign('away_id')->references('id')->on('teams')->onDelete('cascade');
//        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matches');
    }
};
