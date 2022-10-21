<?php

namespace App\Controllers;

class WinesController extends Controller
{
    public function index()
    {
        response([
            'message' => 'WinesController@index output'
        ]);
    }
}
