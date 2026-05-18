<?php

namespace App\Http\Controllers;

use App\Models\Season;
use App\Http\Controllers\Controller;


class EpisodesController extends Controller
{
    public function index(Season $season)
    {
        return view('episodes.index', [
            'episodes' => $season->episodes,
            'season' => $season
        ]);
    }
}