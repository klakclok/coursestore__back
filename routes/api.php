<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClaimController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\FaqController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//
//});

Route::group(['middleware' => ['auth:sanctum']], function(){
    Route::post('/course/insert', [CourseController::class, 'insert']);
    Route::post('/course/update', [CourseController::class, 'update']);
    Route::post('/course/delete/{id}', [CourseController::class, 'delete']);

    //Часто задаваемые вопросы
    Route::post('/faq/insert', [FaqController::class, 'insert']);
    Route::post('/faq/update', [FaqController::class, 'update']);
    Route::post('/faq/delete/{id}', [FaqController::class, 'delete']);

    //Дополнительная информация
    Route::post('/info/insert', [InfoController::class, 'insert']);
    Route::post('/info/update', [InfoController::class, 'update']);
    Route::post('/info/delete/{id}', [InfoController::class, 'delete']);

    //Заявки
    Route::post('/claim/delete/{id}', [ClaimController::class, 'delete']);
    Route::get('/claims', [ClaimController::class, 'get']);

    //Категории
    Route::post('/category/insert', [CategoryController::class, 'insert']);
    Route::post('/category/update', [CategoryController::class, 'update']);
    Route::post('/category/delete/{id}', [CategoryController::class, 'delete']);
});
Route::get('/courses', [CourseController::class, 'getCourses']);
Route::get('/course/{id}', [CourseController::class, 'getCourse']);
Route::get('/categories', [CategoryController::class, 'getCategory']);

Route::get('/faq', [FaqController::class, 'get']);
Route::get('/info', [InfoController::class, 'get']);
Route::post('/claim', [ClaimController::class, 'insert']);


Route::post('/login', [AuthController::class, 'login']);
