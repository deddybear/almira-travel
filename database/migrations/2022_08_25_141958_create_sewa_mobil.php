<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSewaMobil extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sewa_mobil', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('collection_photos_id')->index();
            $table->string('name', 50);
            $table->unsignedInteger('price');
            $table->longText('detail');
            $table->string('slug');
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
        Schema::dropIfExists('sewa_mobil');
    }
}
