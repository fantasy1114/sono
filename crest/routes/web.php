<?php

use App\Http\Controllers\OrganisationsController;
use App\Http\Controllers\ManagersController;
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

Route::get('/', function () {
    return view('index');
});

Route::group([
    'prefix' => 'organisations',
], function () {
    Route::get('/', 'App\Http\Controllers\OrganisationsController@index')
         ->name('organisations.organisation.index');
    Route::get('/create','App\Http\Controllers\OrganisationsController@create')
         ->name('organisations.organisation.create');
    Route::get('/show/{organisation}','App\Http\Controllers\OrganisationsController@show')
         ->name('organisations.organisation.show')->where('id', '[0-9]+');
    Route::get('/{organisation}/edit','App\Http\Controllers\OrganisationsController@edit')
         ->name('organisations.organisation.edit')->where('id', '[0-9]+');
    Route::post('/', 'App\Http\Controllers\OrganisationsController@store')
         ->name('organisations.organisation.store');
    Route::put('organisation/{organisation}', 'App\Http\Controllers\OrganisationsController@update')
         ->name('organisations.organisation.update')->where('id', '[0-9]+');
    Route::delete('/organisation/{organisation}','App\Http\Controllers\OrganisationsController@destroy')
         ->name('organisations.organisation.destroy')->where('id', '[0-9]+');
});


Route::group([
    'prefix' => 'managers',
], function () {
    Route::get('/', 'App\Http\Controllers\ManagersController@index')
         ->name('managers.manager.index');
    Route::get('/create','App\Http\Controllers\ManagersController@create')
         ->name('managers.manager.create');
    Route::get('/show/{manager}','App\Http\Controllers\ManagersController@show')
         ->name('managers.manager.show')->where('id', '[0-9]+');
    Route::get('/{manager}/edit','App\Http\Controllers\ManagersController@edit')
         ->name('managers.manager.edit')->where('id', '[0-9]+');
    Route::post('/', 'App\Http\Controllers\ManagersController@store')
         ->name('managers.manager.store');
    Route::put('manager/{manager}', 'App\Http\Controllers\ManagersController@update')
         ->name('managers.manager.update')->where('id', '[0-9]+');
    Route::delete('/manager/{manager}','App\Http\Controllers\ManagersController@destroy')
         ->name('managers.manager.destroy')->where('id', '[0-9]+');
});

Route::group([
    'prefix' => 'employees',
], function () {
    Route::get('/', 'App\Http\Controllers\EmployeesController@index')
         ->name('employees.employee.index');
    Route::get('/create','App\Http\Controllers\EmployeesController@create')
         ->name('employees.employee.create');
    Route::get('/show/{employee}','App\Http\Controllers\EmployeesController@show')
         ->name('employees.employee.show')->where('id', '[0-9]+');
    Route::get('/{employee}/edit','App\Http\Controllers\EmployeesController@edit')
         ->name('employees.employee.edit')->where('id', '[0-9]+');
    Route::post('/', 'App\Http\Controllers\EmployeesController@store')
         ->name('employees.employee.store');
    Route::put('employee/{employee}', 'App\Http\Controllers\EmployeesController@update')
         ->name('employees.employee.update')->where('id', '[0-9]+');
    Route::delete('/employee/{employee}','App\Http\Controllers\EmployeesController@destroy')
         ->name('employees.employee.destroy')->where('id', '[0-9]+');
});

Route::group([
    'prefix' => 'worksites',
], function () {
    Route::get('/', 'App\Http\Controllers\WorksitesController@index')
         ->name('worksites.worksite.index');
    Route::get('/create','App\Http\Controllers\WorksitesController@create')
         ->name('worksites.worksite.create');
    Route::get('/show/{worksite}','App\Http\Controllers\WorksitesController@show')
         ->name('worksites.worksite.show')->where('id', '[0-9]+');
    Route::get('/{worksite}/edit','App\Http\Controllers\WorksitesController@edit')
         ->name('worksites.worksite.edit')->where('id', '[0-9]+');
    Route::post('/', 'App\Http\Controllers\WorksitesController@store')
         ->name('worksites.worksite.store');
    Route::put('worksite/{worksite}', 'App\Http\Controllers\WorksitesController@update')
         ->name('worksites.worksite.update')->where('id', '[0-9]+');
    Route::delete('/worksite/{worksite}','App\Http\Controllers\WorksitesController@destroy')
         ->name('worksites.worksite.destroy')->where('id', '[0-9]+');
});

Route::group([
    'prefix' => 'keys',
], function () {
    Route::get('/', 'App\Http\Controllers\KeysController@index')
         ->name('keys.key.index');
    Route::get('/create','App\Http\Controllers\KeysController@create')
         ->name('keys.key.create');
    Route::get('/show/{key}','App\Http\Controllers\KeysController@show')
         ->name('keys.key.show');
    Route::get('/{key}/edit','App\Http\Controllers\KeysController@edit')
         ->name('keys.key.edit');
    Route::post('/', 'App\Http\Controllers\KeysController@store')
         ->name('keys.key.store');
    Route::put('key/{key}', 'App\Http\Controllers\KeysController@update')
         ->name('keys.key.update');
    Route::delete('/key/{key}','App\Http\Controllers\KeysController@destroy')
         ->name('keys.key.destroy');
});

Route::group([
    'prefix' => 'registries',
], function () {
    Route::get('/', 'App\Http\Controllers\RegistriesController@index')
         ->name('registries.registry.index');
    #Route::get('/create','App\Http\Controllers\RegistriesController@create')
    #     ->name('registries.registry.create');
    Route::get('/show/{registry}','App\Http\Controllers\RegistriesController@show')
         ->name('registries.registry.show')->where('id', '[0-9]+');
    #Route::get('/{registry}/edit','App\Http\Controllers\RegistriesController@edit')
    #     ->name('registries.registry.edit')->where('id', '[0-9]+');
    #Route::post('/', 'App\Http\Controllers\RegistriesController@store')
    #     ->name('registries.registry.store');
    #Route::put('registry/{registry}', 'App\Http\Controllers\RegistriesController@update')
    #     ->name('registries.registry.update')->where('id', '[0-9]+');
    #Route::delete('/registry/{registry}','App\Http\Controllers\RegistriesController@destroy')
    #     ->name('registries.registry.destroy')->where('id', '[0-9]+');
});
