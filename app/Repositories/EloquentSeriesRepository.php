<?php

namespace App\Repositories;

use App\Http\Requests\SeriesFromRequest;
use App\Models\Episode;
use App\Models\Season;
use App\Models\Series;
use Illuminate\Support\Facades\DB;

class EloquentSeriesRepository implements SeriesRepository
{

    public function add(SeriesFromRequest $request): Series
    {
        return DB::transaction(function () use ($request) {

        $serie = Series::create([
            'name' => $request->name,
            'seasonsQty' => $request->seasonsQty,
            'episodesPerSeason' => $request->episodesPerSeason,
            'cover' => $request->coverPath
        ]);
        $seasons = [];
        for ($i = 1; $i <= $request->seasonsQty; $i++) {
            $seasons[] = [
                'number' => $i,
                'series_id' => $serie->id
            ];

        }
        Season::insert($seasons);

            $episodes = [];
            foreach ($serie->seasons as $season) {        
            for ($j = 1; $j <= $request->episodesPerSeason; $j++) {
                $episodes[] = [
                    'number' => $j,
                    'season_id' => $season->id
                ];
            }
        }
        Episode::insert($episodes);

        return $serie;
        });
    }
}    