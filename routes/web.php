<?php

use Illuminate\Support\Facades\Route;
use App\Models\Phone;
use App\Models\Name;


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
    
    $x = Name::search('klaud')->get();
    dd($x[0]->name);
    
});