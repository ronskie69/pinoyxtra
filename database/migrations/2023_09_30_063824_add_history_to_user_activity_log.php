<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddHistoryToUserActivityLog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_activity_log', function (Blueprint $table) {
            //
            $table->string('blog_id');
            $table->string('user_id');
            $table->string('vote');
            $table->string('activity_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_activity_log', function (Blueprint $table) {
            //
            $table->dropColumn('blog_id');
            $table->dropColumn('user_id');
            $table->dropColumn('vote');
            $table->dropColumn('activity_date');
        });
    }
}
