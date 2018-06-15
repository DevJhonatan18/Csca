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

Auth::routes();

Route::get('/home', 'HomeController@index')
    ->name('home');

Route::get('/admin', 'AdminController@admin')    
    ->middleware('is_admin')    
    ->name('admin');

// <-- Servicios -->
    
Route::get('/admin/servicios', 'ServiceController@index')->name('services.index');

Route::get('/admin/servicios/nuevo', 'ServiceController@create')->name('services.create');

Route::post('/admin/servicios', 'ServiceController@store');

Route::get('/admin/servicios/{id}/editar', 'ServiceController@edit')->name('services.edit');

Route::put('/admin/servicios/{service}', 'ServiceController@update');

Route::delete('/admin/servicios/{service}', 'ServiceController@delete')->name('services.delete');

// <-- Productoss -->
    
Route::get('/admin/productos', 'ProductController@index')->name('products.index');

Route::get('/admin/productos/nuevo', 'ProductController@create')->name('products.create');

Route::post('/admin/productos', 'ProductController@store');

Route::get('/admin/productos/{id}/editar', 'ProductController@edit')->name('products.edit');

Route::put('/admin/productos/{product}', 'ProductController@update');

Route::delete('/admin/productos/{product}', 'ProductController@delete')->name('products.delete');

// <-- Categorias -->
    
Route::get('/admin/categorias', 'ProductCategoryController@index')->name('categories.index');

Route::get('/admin/categorias/nueva', 'ProductCategoryController@create')->name('categories.create');

Route::post('/admin/categorias', 'ProductCategoryController@store');

Route::get('/admin/categorias/{id}/editar', 'ProductCategoryController@edit')->name('categories.edit');

Route::put('/admin/categorias/{category}', 'ProductCategoryController@update');

Route::delete('/admin/categorias/{category}', 'ProductCategoryController@delete')->name('categories.delete');

// <-- Control -->
    
Route::get('/admin/control/', 'ControlController@inicio')->name('control.caja.inicio');

Route::get('/admin/control/caja/inicio', 'ControlController@inicio')->name('control.caja.inicio');

Route::get('/admin/control/caja/ingresos', 'ControlController@ingresos')->name('control.caja.ingresos');

Route::post('/admin/control/caja/ingresos', 'ControlController@historial_ingresos');

Route::post('/admin/control/caja/ingresos/{nombre}', 'ControlController@historial_ingreso');

Route::get('/admin/control/caja/cierre/', 'ControlController@cierre')->name('control.caja.cierre');

Route::post('/admin/control/', 'ControlController@store');

Route::get('/admin/control/caja/retiros', 'ControlController@retiros')->name('control.caja.retiros');

Route::post('/admin/control/caja/retiros', 'ControlController@historial_retiros');

// Control.Gastos

Route::get('/admin/control/gastos/limpieza', 'ControlController@gastos')->name('control.gastos.limpieza');

Route::get('/admin/control/gastos/servicios', 'ControlController@gastos')->name('control.gastos.servicios');

Route::post('/admin/control/gastos/limpieza', 'ControlController@historial_gastos');

Route::post('/admin/control/gastos/servicios', 'ControlController@historial_gastos');

// Control.Sueldos

Route::get('/admin/control/sueldos/profesores', 'ControlController@sueldos')->name('control.sueldos.profesores');

Route::get('/admin/control/sueldos/otros', 'ControlController@sueldos')->name('control.sueldos.otros');

Route::post('/admin/control/sueldos/profesores', 'ControlController@historial_sueldos_all');

Route::post('/admin/control/sueldos/otros', 'ControlController@historial_sueldos_all');


Route::get('/admin/control/sueldos/profesores/{nombre}', 'ControlController@historial_sueldos_one')->name('control.sueldos.profesor');

Route::get('/admin/control/sueldos/otros', 'ControlController@historial_sueldos_one')->name('control.sueldos.otros');

//Route::post('/admin/control/sueldos/profesores/{nombre}', 'ControlController@historial_sueldo');

//Route::post('/admin/control/sueldos/otros', 'ControlController@historial_sueldos');

// nande (prueba commit)

// <-- Usuarios -->
    
Route::get('/admin/{type}s', 'UserController@index')->name('users.index');

Route::get('/admin/{type}s/nuevo', 'UserController@create')->name('users.create');

Route::post('/admin/{type}s', 'UserController@store');

Route::get('/admin/{type}s/{nombre}', 'UserController@show')->name('users.show'); // ID por USER

Route::get('/admin/{type}s/{nombre}/editar', 'UserController@edit')->name('users.edit');

Route::put('/admin/{type}s/{user}', 'UserController@update')->name('users.update');

Route::delete('/admin/{type}s/{user}', 'UserController@delete')->name('users.delete');