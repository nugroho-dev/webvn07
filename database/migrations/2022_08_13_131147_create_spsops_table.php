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
        Schema::create('spsops', function (Blueprint $table) {
            $table->id();
            $table->foreignId('categorysp_id');
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('hukum')->nullable();
            $table->text('persyaratan')->nullable();
            $table->text('mekanisme')->nullable();
            $table->text('waktu')->nullable();
            $table->text('biaya')->nullable();
            $table->text('produk')->nullable();
            $table->text('sarana')->nullable();
            $table->text('kompetensi')->nullable();
            $table->text('pengawasan')->nullable();
            $table->text('pengaduan')->nullable();
            $table->text('pelaksana')->nullable();
            $table->text('jaminan')->nullable();
            $table->text('keamanan')->nullable();
            $table->text('kinerja')->nullable();
            $table->text('formulir')->nullable();
            $table->text('sop')->nullable();
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
        Schema::dropIfExists('spsops');
    }
};
