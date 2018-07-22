<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Place;
use App\Models\Placetype;
use App\Models\Picture;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\PlaceRequest;
use App\Http\Requests\PictureRequest;

class PlaceController extends Controller
{

    public function placeList()
    {
        $listset = Place::all();
        $placetypes = Placetype::all();
        $types = [];

        foreach ($placetypes as $pt)
            $types[$pt->id] = $pt->name;

        return view('placelist', compact('listset', 'types'));
    }

    public function addPlace()
    {
        $types = Placetype::all();

        return view('addplace', compact('types'));
    }

    public function doAddPlace(PlaceRequest $request)
    {
        $newplace = $request->only('name', 'placetype_id');
        Place::create($newplace);

        return redirect()->route('place.show_all');
    }

    public function showPlace($id)
    {
        $placename = urldecode($id);
        $place = Place::place($placename)->first();
        $listset = Place::find($place->id)->pictures;

        return view('showplace', compact('placename', 'listset'));
    }

    public function addPhoto(Request $request, $id)
    {
        $referer = $request->server('HTTP_REFERER');
        $name = urldecode($id);
        $place = Place::place($name)->first();
        $places = Place::all();

        return view('add_linked_photo', compact('places', 'place', 'referer'));
    }

    public function addAnyPhoto()
    {
        $places = Place::all();
        return view('add_wildcard_photo', compact('places'));
    }

    public function doAddPhoto(PictureRequest $request)
    {
        $file = $request->file('image');
        $path = $file->storeAs('collection', $file->getClientOriginalName(), 'public');
        list($width, $height) = getimagesize(storage_path('app/public') . "/{$path}");

        $location = Storage::url($path);

        $place_id = intval($request->input('place_id'));
        $place = Place::placeById($place_id)->first();

        Picture::create(['place_id' => $place_id, 'location' => $location, 'width' => $width, 'height' => $height]);

        return redirect("places/{$place->name}/");
    }
}

