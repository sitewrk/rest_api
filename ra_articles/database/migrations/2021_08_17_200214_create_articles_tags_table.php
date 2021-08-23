<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    /**
     * HK
     *!!!!!!!!!!!!!!!!
     * Если буду проблемы при миграции из-за связей между таблицами,
     * то запустите пожалуйста сначала все миграции кроме этой И эту 'articles_tags' в последнюю очередь ^^
     *!!!!!!!!!!!!!!!!
     */
    public function up()
    {
        Schema::create('articles_tags', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedbigInteger('article_id')->unsigned();
            $table->unsignedbigInteger('tag_id')->unsigned();

            $table->foreign('article_id')->references('id')->on('articles')->onDelete('cascade');
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles_tags');
    }
}
