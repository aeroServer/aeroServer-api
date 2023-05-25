<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\Picture;
use App\Models\Place;
use Illuminate\Http\Request;
use App\Rules\ValidPlaces;

class PictureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // La validation de données
        $this->validate($request, [
            'place' => ['required', 'max:100', new ValidPlaces],
        ]);

        $start = (isset($request->start)) ? strtotime($request->start) : strtotime(date('Y-m-d 00:00:00'));
        $end = (isset($request->end)) ? strtotime($request->end) : strtotime(date('Y-m-d 23:59:59'));

        return response()->json(Picture::where('place', Place::where('name', $request->place)->first()->id)->where('date', '>=', $start)->where('date', '<=', $end)->orderBy('date', 'ASC')->get(), 200);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'place' => ['required', 'max:100', new ValidPlaces],
            'date'  => 'required|string|size:19',
            'picture' => 'required|image|mimes:jpg',
        ]);

        $picture = Picture::create([
            'place' => Place::where('name', $request->place)->first()->id,
            'date' => strtotime($request->date),
            'info' => []
        ]);

        Storage::putFileAs($picture->place, $request->file('picture'), $picture->filename);

        return response()->json($picture, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Picture $picture)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Picture $picture)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Picture $picture)
    {
        //
    }
}
