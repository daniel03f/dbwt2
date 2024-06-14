<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\HomepageController::class, 'index'])->name('homepage');

Route::get('/welcome', function () {
    return view('welcome');
});

Route::any('/test', [App\Http\Controllers\TestController::class, 'test'])->name('test');
Route::view('/testview', 'testview');
Route::get('/testdata',[\App\Http\Controllers\TestDataController::class,'index']);

Route::get('/login', [App\Http\Controllers\AuthController::class, 'login'])->name('login');
Route::get('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
Route::get('/isloggedin', [App\Http\Controllers\AuthController::class, 'isloggedin'])->name('haslogin');

Route::get('/articles', [App\Http\Controllers\ArticlesController::class, 'articles'])->name('articles');
//Route::post('/articles', [\App\Http\Controllers\ArticlesController::class, 'createNewArticle'])->name('addnewarticle');

Route::get('/newarticle',[\App\Http\Controllers\ArticlesController::class, 'getNewArticleInfo'])->name('newarticle');

Route::get('/search_articles', [\App\Http\Controllers\ArticlesController::class, 'search_articles_view'])->name('search_articles_view');
