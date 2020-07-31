<?php

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





//Classification

Route::get('/classifications', 'ClassificationController@ClassificationStore')->name('ClassificationStore');

Route::get('/classifications/{id}', 'ClassificationController@Details')->name('ClassificationDetails');

Route::post('/classifications/comment', 'ClassificationController@AddComment')->name('ClassificationComments');


//Classification Admin

Route::get('/Admin/classifications', 'ClassificationController@Index');

Route::get('/Admin/classifications/Create', "ClassificationController@Create");

Route::post('/Admin/classifications/Create', "ClassificationController@Store");

Route::get('/Admin/classifications/Delete/{id}', "ClassificationController@Delete");

Route::get('/Admin/classifications/Edit/{id}', "ClassificationController@Edit");

Route::get('/Admin/classifications/{id}', "ClassificationController@Show");

Route::post('/Admin/classifications/Edit', "ClassificationController@Update");

Route::delete('/Admin/classifications/Delete', "ClassificationController@Remove");



//Combats

Route::get('/combats', 'CombatController@CombatStore')->name('CombatStore');

Route::get('/combats/{id}', 'CombatController@Details')->name('CombatDetails');

Route::post('/combats/comment', 'CombatController@AddComment')->name('CombatComments');


//Combats Admin


//Movesets

Route::get('/movesets', 'MovesetController@MovesetStore')->name('MovesetStore');

Route::get('/movesets/{id}', 'MovesetController@Details')->name('MovesetDetails');

Route::post('/movesets/comment', 'MovesetController@AddComment')->name('MovesetComments');

//Movesets admin

Route::get('/Admin/movesets', 'MovesetController@Index');

Route::get('/Admin/movesets/Create', "MovesetController@Create");

Route::post('/Admin/movesets/Create', "MovesetController@Store");

Route::get('/Admin/movesets/Delete/{id}', "MovesetController@Delete");

Route::get('/Admin/movesets/Edit/{id}', "MovesetController@Edit");

Route::get('/Admin/movesets/{id}', "MovesetController@Show");

Route::post('/Admin/movesets/Edit', "MovesetController@Update");

Route::delete('/Admin/movesets/Delete', "MovesetController@Remove");


//PocketMonster

Route::get('/pocketmonsters', 'PocketmonsterController@PocketmonsterStore')->name('PocketmonsterStore');

Route::get('/pocketmonsters/{id}', 'PocketmonsterController@Details')->name('PocketmonsterDetails');

Route::post('/pocketmonsters/comment', 'PocketmonsterController@AddComment')->name('PocketmonsterComments');

//Pocket Monster pero admin


Route::get('/Admin/pocketmonsters', 'PocketmonsterController@Index');

Route::get('/Admin/pocketmonsters/Create', "PocketmonsterController@Create");

Route::post('/Admin/pocketmonsters/Create', "PocketmonsterController@Store");

Route::get('/Admin/pocketmonsters/Delete/{id}', "PocketmonsterController@Delete");

Route::get('/Admin/pocketmonsters/Edit/{id}', "PocketmonsterController@Edit");

Route::get('/Admin/pocketmonsters/{id}', "PocketmonsterController@Show");

Route::post('/Admin/pocketmonsters/Edit', "PocketmonsterController@Update");

Route::delete('/Admin/pocketmonsters/Delete', "PocketmonsterController@Remove");


//combats ADMIN
Route::get('/Admin/combats', 'CombatController@Index');

Route::get('/Admin/combats/Create', "CombatController@Create");

Route::post('/Admin/combats/Create', "CombatController@Store");

Route::get('/Admin/combats/Delete/{id}', "CombatController@Delete");

Route::get('/Admin/combats/Edit/{id}', "CombatController@Edit");

Route::get('/Admin/combats/{id}', "CombatController@Show");

Route::post('/Admin/combats/Edit', "CombatController@Update");

Route::delete('/Admin/combats/Delete', "CombatController@Remove");




Route::get('/', function () {
    return view('welcome');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
