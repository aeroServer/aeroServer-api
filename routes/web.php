<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Models\Picture;
use App\Models\Place;

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
    return view('picture');
});

Route::get('/picture/{picture}', function(Picture $picture) {
    if (!Storage::exists($picture->place_name.'/'.$picture->filename)) {
        abort(404);
    }
    return response()->file(Storage::path($picture->place_name.'/'.$picture->filename), ['Content-Type' => 'image/jpeg']);
});

Route::get('/picture/place/{placename}', function(string $placename) {
    $place = Place::where('name', $placename)->first();
    if (is_null($place) || is_null($place->last_picture) || !Storage::exists($place->name.'/'.$place->last_picture->filename)) {
        abort(404);
    }
    return response()->file(Storage::path($place->name.'/'.$place->last_picture->filename), ['Content-Type' => 'image/jpeg']);
});