<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaketTour extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paket_tour', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('collection_photos_id')->index();
            $table->string('name', 50);
            $table->unsignedInteger('price');
            $table->longText('detail');
            $table->longText('trip_plan');
            $table->longText('best_offer');
            $table->longText('prepare');
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
        Schema::dropIfExists('paket_tour');
    }
}
