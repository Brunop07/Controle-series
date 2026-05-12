<?php

namespace App\Http\Controllers;

use App\Models\Series;
use Illuminate\Http\Request;
use App\Http\Requests\SeriesFromRequest;
use Illuminate\Support\Facades\DB;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
        $series = Series::all();
        $messagemSucesso = session('message.sucesso');

        return view('series.index')->with('series', $series)
        ->with('messageSucesso', $messagemSucesso);
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(SeriesFromRequest $request)
    {
        
        $serie = Series::create($request->all());

        return to_route('series.index')
        ->with('message.sucesso', "Série '{$serie->name}' adicionada com sucesso!");
    }

    public function destroy(Series $series)
    {
        $series->delete();

        return to_route('series.index')
        ->with('message.sucesso', "Série '{$series->name}' removida com sucesso!");
    }

    public function edit(Series $series)
    {
        return view('series.edit')->with('series', $series);
    }

    public function update(SeriesFromRequest $request, Series $series)
    {
        $series->update($request->all());

        return to_route('series.index')
        ->with('message.sucesso', "Série '{$series->name}' atualizada com sucesso!");
    }
}    
