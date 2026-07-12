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

        $table->string('image2')->nullable()->after('image');

        $table->string('image3')->nullable()->after('image2');

        $table->string('image4')->nullable()->after('image3');

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
            'image2',
            'image3',
            'image4'
        ]);

    });
}
};
