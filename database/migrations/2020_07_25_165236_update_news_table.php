<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('news', function (Blueprint $table) {
            $table->dropColumn('image');
        });

        Schema::table('news', function (Blueprint $table) {
            $table->tinyInteger('sourceId');
            $table->string('sourceUrl');
            $table->text('content');
            $table->string('hash', 32);
            $table->string('image', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('news', function (Blueprint $table) {
            $table->dropColumn('sourceId');
            $table->dropColumn('sourceUrl');
            $table->dropColumn('content');
            $table->dropColumn('hash');
        });
    }
}
