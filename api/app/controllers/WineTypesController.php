<?php

namespace App\Controllers;

use App\Models\WineType;

class WineTypesController extends Controller
{
    public function index()
    {
        $types = WineType::all();

        return response()->json($types);
    }
}
