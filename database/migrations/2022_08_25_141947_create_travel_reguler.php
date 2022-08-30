<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTravelReguler extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('travel_reguler', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('collection_photos_id')->index();
            $table->string('name', 50);
            $table->longText('trip');
            $table->longText('transport');
            $table->longText('door');
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
        Schema::dropIfExists('travel_reguler');
    }
}
