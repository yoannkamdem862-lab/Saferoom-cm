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
    Schema::table('listings', function (Blueprint $table) {

        $table->boolean('wifi')->default(false);

        $table->boolean('parking')->default(false);

        $table->boolean('climatisation')->default(false);

        $table->boolean('television')->default(false);

        $table->boolean('eau_chaude')->default(false);

        $table->boolean('groupe_electrogene')->default(false);

        $table->boolean('securite')->default(false);

        $table->boolean('cuisine')->default(false);

    });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
{
    Schema::table('listings', function (Blueprint $table) {

        $table->dropColumn([
            'wifi',
            'parking',
            'climatisation',
            'television',
            'eau_chaude',
            'groupe_electrogene',
            'securite',
            'cuisine'
        ]);

    });
}
};
