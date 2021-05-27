<?php

use App\Http\Controllers\EndPointController;
use App\Http\Controllers\FillController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [MainController::class, 'landing']);

Route::group(['prefix' => 'delivery'], function () {
    Route::get('/', [MainController::class, "delivery"]);

    Route::get('/box', [MainController::class, "box"]);

    Route::get('/del', [MainController::class, 'del']);
    Route::post('/del', [MainController::class, 'createDel']);

    Route::get('/pizza', [MainController::class, 'pizza']);
    Route::get('/snack', [MainController::class, 'snack']);
    Route::get('/salad', [MainController::class, 'salad']);
    Route::get('/main', [MainController::class, 'main']);
    Route::get('/dessert', [MainController::class, 'dessert']);
    Route::get('/drink', [MainController::class, 'drink']);

    Route::get('/{type}/{id}', [MainController::class, 'det']);
});

Route::group(['prefix'=>'restaurant'], function (){
    Route::get('/', function (){
        return view('error');
    });
});

Route::get('/fill', [FillController::class, 'fill']);
Route::get('/fill/ing', [FillController::class, 'fillIng']);
Route::get('/fill/add', [FillController::class, 'fillAdd']);

Route::get('/addresses', [EndPointController::class, 'getAdd']);
Route::get('/ing', [EndPointController::class, 'getIng']);
Route::get('/item', [EndPointController::class, 'getItem']);

Route::get('/reg', [MainController::class, 'reg']);
Route::post('/reg', [MainController::class, 'userReg']);

Route::get('/login', [MainController::class, 'login']);
Route::post('/login', [MainController::class, 'userLog']);

Route::get('/exit', [MainController::class, 'exit']);

Route::get('/test', [MainController::class, 'test']);
