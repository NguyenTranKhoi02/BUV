<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\CacheManagerRedisController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\RssController;
use App\Http\Controllers\ApiRedisCacheController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ThreadController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\MediaController;

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Language switcher routes
Route::get('/language/{locale}', [App\Http\Controllers\LanguageController::class, 'switch'])
    ->name('language.switch')
    ->where('locale', 'vi|en');

//Redirect link tĩnh
require __DIR__.'/route-redirect.php';
//End

Route::get('/404.htm', function () {
    return abort(404);
});


//Chú ý khi đặt thứ tự route, Chỉ sử dụng middleware Redirect khi site cũ có đá 301 qua mapping

// Routes for Vietnamese (default - no prefix)
Route::group(['middleware' => ['ResponseRedisCache', 'locale']], function () {
    //Home
    Route::get('/', [HomeController::class, 'index'])->name('page_home');
    Route::get('/stories', [HomeController::class, 'stories'])->name('page_stories');
});

// Routes for English (with /en prefix)
Route::group([
    'prefix' => 'en',
    'middleware' => ['ResponseRedisCache', 'locale']
], function () {
    //Home
    Route::get('/', [HomeController::class, 'index'])->name('en.page_home');
    Route::get('/stories', [HomeController::class, 'stories'])->name('en.page_stories');
});