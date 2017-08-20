<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();


Route::group(['middleware' => ['auth']], function () {

	Route::get('/home', 'HomeController@index');
Route::get('/', 'HomeController@index');


Route::get('/items', 'itemController@getAll');
// Route::get('/additem', 'itemController@addItem');
Route::get('/items/additem', 'itemController@addItem');
Route::get('/items/delete/{id}', 'itemController@deleteItem');
Route::get('/items/find/{id}', 'itemController@findItem');
Route::get('/items/buy/{id}/{user}', 'itemController@buyItem');



Route::get('/items/edititem/{id}', 'itemController@editItemPage')->middleware('isAdmin');
Route::get('/items/edititem/edit/{id}', 'itemController@editItem')->middleware('isAdmin');
Route::get('/items/sortasc', 'itemController@sortasc');
Route::get('/items/sortdesc', 'itemController@sortdesc');





Route::get('/home1', 'HomeController@index1');



Route::get('/category', 'categoryController@getAll');
Route::get('/category/addcategory', 'categoryController@addcategory');





Route::get('/users', 'userController@getAll')->middleware('isAdmin');
Route::get('/users/edituser/{id}', 'userController@editUserPage')->middleware('isAdmin');
Route::get('/users/edituser/edit/{id}', 'userController@editUser')->middleware('isAdmin');
Route::get('/users/adduser', 'userController@addUser')->middleware('isAdmin');
Route::get('/users/delete/{id}', 'userController@deleteUser')->middleware('isAdmin');



Route::get('/orders', 'orderController@getAll');


    


});







Route::group(['prefix'=>'/api'],function (){


Route::get('/items', 'itemController@getAll');

Route::get('/items/find/{id}', 'productController@findItem');
Route::get('/items/buy/{id}/{user}', 'productController@buyItem');
Route::get('/category', 'productController@getAllcat');
Route::get('/orders', 'productController@getAllorder');


});


// Route::get('items', function () {

// })->middleware('auth');



// Route::group(['middleware'=>'auth.user'],function (){
// Route::get('/items', 'itemController@getAll');
//     Route::get('/auth/logout','UserController@logout');
// });

// Route::get('/login', ['middleware' =>'guest', function(){
//   return view('home');
// }]);
 