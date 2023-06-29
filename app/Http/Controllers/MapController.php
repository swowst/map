<?php

namespace App\Http\Controllers;

use App\Models\MapModel;
use Illuminate\Http\Request;

class MapController extends Controller
{
    public function marker()
    {
        $markers = MapModel::all();
        return view('map-marker', compact('markers'));
    }
    public function add()
    {
        return view('map-marker-add');
    }
    public function store()
    {
        MapModel::create([
            'title'=>request()->title,
            'latitude'=>request()->latitude,
            'longitude'=>request()->longitude
        ]);
        return redirect()->route('marker');
    }
}
