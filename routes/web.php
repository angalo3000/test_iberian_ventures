<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;

use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

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
    return view('company.index');
});

Auth::routes([
    'register' => false,
    // 'login' => false,
]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('list', function () {
    return view('list.index');
});
Route::get('company/excel/{id}', [CompanyController::class, 'excel'])->name('company.excel');
Route::get('company/', [CompanyController::class, 'index'])->name('company.index');
Route::post('company/', [CompanyController::class, 'store'])->name('company.store');
