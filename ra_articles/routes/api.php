<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/**
 * HK
 *!!!!!!!!!!!!!!!!
 * Для доступа используйте токен:
 * x-api-key => asd
 *!!!!!!!!!!!!!!!!
 */

Route::prefix('/articles')->group(function () {
    Route::get('/', ['uses' => 'ArticlesController@get']);
    Route::get('/{article_id}', ['uses' => 'ArticlesController@detail']);
    Route::post('/', ['uses' => 'ArticlesController@createArticle']);
    Route::delete('/delete/{article_id}', ['uses' => 'ArticlesController@delete']);
     Route::put('/{article_id}', ['uses' => 'ArticlesController@updateArticle']);//->where(['article_id' => '0-9+'])
});

Route::prefix('/tags')->group(function () {
    Route::get('/', ['uses' => 'TagsController@get']);
    Route::get('/{tag_name}', ['uses' => 'ArticlesController@listArticles']);
    /**
     * HK
     * Может когда-нибудь пригодится иметь доступ и к тегам отдельно ^^
     */
    //Route::post('/', ['uses' => 'TagsController@createTag']);
   // Route::delete('/{tag_id}', ['uses' => 'TagsController@delete'])->where(['tag_id' => '0-9+']);
 //   Route::put('/{tag_id}', ['uses' => 'TagsController@updateTag'])->where(['tag_id' => '0-9+']);
});
