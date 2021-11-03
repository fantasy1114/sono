<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrganisationsController;
use App\Http\Controllers\ManagersController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\LanguageController;
use Illuminate\Support\Facades\Route;


Route::get('/blank', 'PageController@blankPage');
#Route::get('/test', 'PageController@testPage');
#Route::get('/page-collapse', 'PageController@collapsePage');

//Route::view('/','employees.index')->middleware('auth');
//Route::view('home','managers.index')->middleware('auth');

//Route::get('/', 'OrganisationsController@index')->name('organisations.organisation.index')->middleware('auth');
//Route::get('/', 'DashboardController@index')->name('dashboard')->middleware('auth');
//Route::get('out','AuthController@logout');

Route::get('/list', 'PageController@usersList');

# Default route -> Event Log
Route::get('/', 'RegistriesController@index')->name('registries.registry.index')->middleware('auth');


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


Route::group([
    'prefix' => 'organisations',
], function () {
     
    Route::get('/', 'OrganisationsController@index')
         ->name('organisations.organisation.index');
    Route::get('/create','OrganisationsController@create')
         ->name('organisations.organisation.create');
    Route::get('/show/{organisation}','OrganisationsController@show')
         ->name('organisations.organisation.show')->where('id', '[0-9]+');
    Route::get('/{organisation}/edit','OrganisationsController@edit')
         ->name('organisations.organisation.edit')->where('id', '[0-9]+');
    Route::post('/', 'OrganisationsController@store')
         ->name('organisations.organisation.store');
    Route::put('organisation/{organisation}', 'OrganisationsController@update')
         ->name('organisations.organisation.update')->where('id', '[0-9]+');
    Route::delete('/organisation/{organisation}','OrganisationsController@destroy')
         ->name('organisations.organisation.destroy')->where('id', '[0-9]+');
});


Route::group([
    'prefix' => 'managers',
], function () {
    Route::get('/', 'ManagersController@index')
         ->name('managers.manager.index');
    Route::get('/create','ManagersController@create')
         ->name('managers.manager.create');
    Route::get('/show/{manager}','ManagersController@show')
         ->name('managers.manager.show')->where('id', '[0-9]+');
    Route::get('/{manager}/edit','ManagersController@edit')
         ->name('managers.manager.edit')->where('id', '[0-9]+');
    Route::post('/', 'ManagersController@store')
         ->name('managers.manager.store');
    Route::put('manager/{manager}', 'ManagersController@update')
         ->name('managers.manager.update')->where('id', '[0-9]+');
    Route::delete('/manager/{manager}','ManagersController@destroy')
         ->name('managers.manager.destroy')->where('id', '[0-9]+');
});

Route::group([
    'prefix' => 'employees',
], function () {
    Route::get('/', 'EmployeesController@index')
         ->name('employees.employee.index');
    Route::get('/create','EmployeesController@create')
         ->name('employees.employee.create');
    Route::get('/show/{employee}','EmployeesController@show')
         ->name('employees.employee.show')->where('id', '[0-9]+');
    Route::get('/{employee}/edit','EmployeesController@edit')
         ->name('employees.employee.edit')->where('id', '[0-9]+');
    Route::post('/', 'EmployeesController@store')
         ->name('employees.employee.store');
    Route::put('employee/{employee}', 'EmployeesController@update')
         ->name('employees.employee.update')->where('id', '[0-9]+');
    Route::delete('/employee/{employee}','EmployeesController@destroy')
         ->name('employees.employee.destroy')->where('id', '[0-9]+');
});

Route::group([
    'prefix' => 'worksites',
], function () {
    Route::get('/', 'WorksitesController@index')
         ->name('worksites.worksite.index');
    Route::get('/create','WorksitesController@create')
         ->name('worksites.worksite.create');
    Route::get('/show/{worksite}','WorksitesController@show')
         ->name('worksites.worksite.show')->where('id', '[0-9]+');
    Route::get('/{worksite}/edit','WorksitesController@edit')
         ->name('worksites.worksite.edit')->where('id', '[0-9]+');
    Route::post('/', 'WorksitesController@store')
         ->name('worksites.worksite.store');
    Route::put('worksite/{worksite}', 'WorksitesController@update')
         ->name('worksites.worksite.update')->where('id', '[0-9]+');
    Route::delete('/worksite/{worksite}','WorksitesController@destroy')
         ->name('worksites.worksite.destroy')->where('id', '[0-9]+');
});

Route::group([
    'prefix' => 'keys',
], function () {
    Route::get('/', 'KeysController@index')
         ->name('keys.key.index');
    Route::get('/create','KeysController@create')
         ->name('keys.key.create');
    Route::get('/show/{key}','KeysController@show')
         ->name('keys.key.show');
    Route::get('/{key}/edit','KeysController@edit')
         ->name('keys.key.edit');
    Route::post('/', 'KeysController@store')
         ->name('keys.key.store');
    Route::put('key/{key}', 'KeysController@update')
         ->name('keys.key.update');
    Route::delete('/key/{key}','KeysController@destroy')
         ->name('keys.key.destroy');
});

Route::group([
    'prefix' => 'registries',
], function () {
    Route::get('/', 'RegistriesController@index')
         ->name('registries.registry.index');
    Route::get('/create','RegistriesController@create')
         ->name('registries.registry.create');
    Route::get('/show/{registry}','RegistriesController@show')
         ->name('registries.registry.show')->where('id', '[0-9]+');
    Route::get('/{registry}/edit','RegistriesController@edit')
         ->name('registries.registry.edit')->where('id', '[0-9]+');
    Route::post('/', 'RegistriesController@store')
         ->name('registries.registry.store');
    Route::put('registry/{registry}', 'RegistriesController@update')
         ->name('registries.registry.update')->where('id', '[0-9]+');
    Route::delete('/registry/{registry}','RegistriesController@destroy')
         ->name('registries.registry.destroy')->where('id', '[0-9]+');
});

#Shows all routes
Route::get('routes', function() {
     $routeCollection = Route::getRoutes();
 
     echo "<table style='width:100%'>";
     /*
         echo "<tr>";
             echo "<td width='10%'><h4>HTTP Method</h4></td>";
             echo "<td width='10%'><h4>Route</h4></td>";
             echo "<td width='10%'><h4>Name</h4></td>";
             echo "<td width='70%'><h4>Corresponding Action</h4></td>";
         echo "</tr>";
     */         
         foreach ($routeCollection as $value) {
             $method = $value->methods[0];
             #if ($method == 'POST') dd($value);
             $controller = 'NONE';
             if (array_key_exists('controller',$value->action)) {
                    $controller = $value->action['controller'];
             }
             echo "<tr>";
                 echo "<td>" . $method . "</td>";
                 echo "<td>" . $controller . "</td>";
                 //echo "<td>" . $value->getName() . "</td>";
                 //echo "<td>" . $value->getActionName() . "</td>";
             echo "</tr>";
         }
     echo "</table>";
 });

Route::group([
    'prefix' => 'devices',
], function () {
    Route::get('/', 'DevicesController@index')
         ->name('devices.device.index');
    Route::get('/create','DevicesController@create')
         ->name('devices.device.create');
    Route::get('/show/{device}','DevicesController@show')
         ->name('devices.device.show')->where('id', '[0-9]+');
    Route::get('/{device}/edit','DevicesController@edit')
         ->name('devices.device.edit')->where('id', '[0-9]+');
    Route::post('/', 'DevicesController@store')
         ->name('devices.device.store');
    Route::put('device/{device}', 'DevicesController@update')
         ->name('devices.device.update')->where('id', '[0-9]+');
    Route::delete('/device/{device}','DevicesController@destroy')
         ->name('devices.device.destroy')->where('id', '[0-9]+');
});
Route::get('lang/{locale}', [LanguageController::class, 'swap']);
