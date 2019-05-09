<?php

namespace App\Http\Controllers;

use App\Concert;
use Illuminate\Http\Request;

class ConcertsController extends Controller
{

    public function show($concert)
    {
        //        $concert_obj = Concert::whereNotNull('published_at')
        //          ->findOrFail($concert);

        $concert_obj = Concert::published()->findOrFail($concert);

        return view('concerts.show', ['concert' => $concert_obj]);
    }
}
