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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', 'UsersController@login');
Route::post('/login', 'UsersController@login');
Route::get('/logout', 'UsersController@logout');

/*
 * Super user routes
 * */
Route::post('/superuser', 'superUserController@saveUser');
Route::get('/superuser', 'superUserController@saveUser');
Route::get('/superuser/users-list', 'superUserController@viewUsers');
Route::post('/superuser/users-edit', 'superUserController@editUsers');
Route::post('/superuser/users-delete', 'superUserController@deleteUsers');

/**
 * Admin Executive Manager routes
 */
Route::get('/qr-orders/add-qr-order', 'AEMController@addQROrder');
Route::post('/qr-orders/add-qr-order', 'AEMController@addQROrder');
Route::post('/editQROrder', 'AEMController@editQROrder');

Route::get('/qr-orders/view', 'AEMController@viewQROrder');

Route::get('suppliers/add-supplier', 'AEMController@addSupplier');
Route::post('suppliers/add-supplier', 'AEMController@addSupplier');

Route::get('suppliers/view-supplier', 'AEMController@viewSupplier');
Route::post('suppliers/edit-supplier', 'AEMController@editSupplier');
Route::post('suppliers/delete-supplier', 'AEMController@deleteSupplier');

Route::post('suppliers/invite-suppliers', 'AEMController@inviteSuppliers');
Route::get('suppliers/invite-suppliers', 'AEMController@inviteSuppliers');
Route::get('suppliers/invite', 'AEMController@inviteSuppliers');

/**
 * Director routes
 */

/**
 * Supplier routes
 */
Route::get('/profile', 'SupplierController@viewProfile');
Route::post('/profile/edit', 'SupplierController@editProfile');
