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
        Schema::create('organizations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rank_id');
            $table->string('name');
            $table->string('nip');
            $table->string('slug')->unique();
            $table->string('position');
            $table->string('image')->nullable();
            $table->string('fb')->nullable();
            $table->string('tw')->nullable();
            $table->string('ig')->nullable();
            $table->string('in')->nullable();
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
        Schema::dropIfExists('organisasis');
    }
};
