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
//guest
Route::get('/', 'GuestController@index')->name("home");

Route::get('/currencies', 'CurrencyController@index')->name('currencies');

Route::get('/contact',  'GuestController@contact')->name('contact');

Route::get('/posts/',  'GuestController@posts')->name('posts');
Route::get('/posts/{id}',  'GuestController@show')->name('showposts');

Route::get('/locations', 'GuestController@location')->name('location');

Route::get('/calculateCurrency','CurrencyController@calculateChange')->name("currencies");

//AUTH ROUTE
Auth::routes();

//user

Route::get('/userhome', 'UserhomeController@index')->name('userhome');

Route::get('/userhome/products', function (){return view('ibank.products');});

Route::get('/userhome/card', 'UserhomeController@card')->name('cards');
Route::get('/userhome/card/{id}', 'UserhomeController@showcard')->name('showcards');

Route::get('/userhome/transfers', 'TransfersController@index')->name('transfers');
Route::post('/userhome/transfers/send', 'TransfersController@send')->name('sendtransfers');
Route::post("/userome/requestcard","UserhomeController@requestcard")->name("requestcard");
Route::post('/userhome/card', 'UserCardController@index')->name('usercard');

//admin 

Route::get('/admin',  'AdminController@posts')->name('adminposts');
Route::get('admin/create', 'AdminController@create')->name('create');
Route::get('admin/edit/{id}', 'AdminController@edit')->name('edit');
Route::get('/admin/posts/',  'AdminController@posts')->name('adminposts');
Route::get('/admin/users/',  'AdminController@users')->name('adminusers');
Route::get('/admin/cards/',  'AdminController@cards')->name('admincards');
Route::get('/admin/cardreqs/',  'AdminController@cardrequests')->name('cardrequests');

Route::post('/admin/cards/block',  'AdminController@cardsblock')->name('blockcards');
Route::post('/admin/cards/unblock',  'AdminController@cardsunblock')->name('unblockcards');
Route::post('/admin/cardreqs/accept',  'AdminController@acceptcard')->name('acceptcard');
Route::post('/admin/cardreqs/reject',  'AdminController@rejectcard')->name('rejectcard');
Route::post('/admin/users/block',  'AdminController@blockuser')->name('blockuser');
Route::post('/admin/users/unblock',  'AdminController@unblockuser')->name('unblockuser');
Route::post('admin/posts/store', 'AdminController@store')->name('store');
Route::post('admin/posts/update', 'AdminController@update')->name('update');
Route::post('admin/posts/delete', 'AdminController@delete')->name('update');


Auth::routes();
