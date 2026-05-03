<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
        $series = Serie::query()->orderBy('name')->get();
        $messagemSucesso = session('message.sucesso');

        return view('series.index')->with('series', $series)
        ->with('messageSucesso', $messagemSucesso);
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(Request $request)
    {
        $serie = Serie::create($request->all());

        return to_route('series.index')
        ->with('message.sucesso', "Série '{$serie->name}' adicionada com sucesso!");
    }

    public function destroy(Serie $series)
    {
        $series->delete();

        return to_route('series.index')
        ->with('message.sucesso', "Série '{$series->name}' removida com sucesso!");
    }

    public function edit(Serie $series)
    {
        return view('series.edit')->with('series', $series);
    }

    public function update(Request $request, Serie $series)
    {
        $series->update($request->all());

        return to_route('series.index')
        ->with('message.sucesso', "Série '{$series->name}' atualizada com sucesso!");
    }
}    
