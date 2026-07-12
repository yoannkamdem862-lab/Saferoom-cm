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
    Schema::create('bookings', function (Blueprint $table) {
        $table->id();

        $table->unsignedInteger('listing_id');

        $table->string('client_name');

        $table->string('phone');

        $table->date('start_date');

        $table->date('end_date');

        $table->string('status')->default('En attente');

        $table->timestamps();

        $table->foreign('listing_id')
              ->references('id')
              ->on('listings')
              ->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
{
    Schema::dropIfExists('bookings');
}
};
