<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomePageController;
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

Route::get('/', [HomePageController::class, 'index']);

// $host = $request->getHost();
// $array = [
//     'pp2.alaravel-tenancy.test' => 'store',
//     'laravel-tenancy.test' => 'laravel',
// ];

// $keys = array_keys($array);

// dd($keys);

// if (in_array($host, $keys)) {
//     $db = $array[$host];
//     DB::purge('mysql');
//     Config::set('config.database.mysql.database', $db);
//     DB::reconnect('mysql');
// }

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');