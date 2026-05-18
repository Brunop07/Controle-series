<?php

namespace App\Repositories;

use App\Http\Requests\SeriesFromRequest;
use App\Models\Series;

interface SeriesRepository
{
    public function add(SeriesFromRequest $request): Series;
}