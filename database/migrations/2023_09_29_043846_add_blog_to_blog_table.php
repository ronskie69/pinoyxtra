<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBlogToBlogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->string("blog_id");
            $table->string("blog_title");
            $table->string("blog_content");
            $table->string("blog_creator");
            $table->string("blog_date");
            $table->string('blog_likes');
            $table->string('blog_dislikes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->dropColumn("blog_id");
            $table->dropColumn("blog_title");
            $table->dropColumn("blog_content");
            $table->dropColumn("blog_creator");
            $table->dropColumn("blog_date");
            $table->dropColumn('blog_likes');
            $table->dropColumn('blog_dislikes');
        });
    }
}
