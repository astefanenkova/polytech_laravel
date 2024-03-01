<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ArticleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::resource('article', ArticleCOntroller::class);

Route::get('signin',[AuthController::class,'signin']);
Route::post('registr',[AuthController::class,'registr']);


Route::get('/', [MainController::class, 'index']);
Route::get('/full-img/{img}', [MainController::class, 'show']);

// Route::get('/', function () {
//     return view('layout');
// });

Route::get('/contacts', function(){
    $contacts = [
        'univer' =>'Polytech',
        'phone' => '8(495)232-22-32',
        'email' => 'mospolytech@mospolytech.ru',
    ];
    return view('main.contact', ['contacts'=>$contacts]);
});
