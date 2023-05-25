<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Models\Picture;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/picture/{picture}', function(Picture $picture) {
    //dd($picture->place_name.'/'.$picture->filename);
    return response()->file($picture->place_name.'/'.$picture->filename, ['Content-Type' => 'image/jpeg']);
});