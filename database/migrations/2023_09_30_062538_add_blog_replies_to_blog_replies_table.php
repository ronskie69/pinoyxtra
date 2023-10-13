<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBlogRepliesToBlogRepliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('blog_replies', function (Blueprint $table) {
            $table->string('reply_id');
            $table->string('viewer_username');
            $table->string('reply_content');
            $table->string('reply_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('blog_replies', function (Blueprint $table) {
            $table->dropColumn('reply_id');
            $table->dropColumn('viewer_username');
            $table->dropColumn('reply_content');
            $table->dropColumn('reply_date');
        });
    }
}
