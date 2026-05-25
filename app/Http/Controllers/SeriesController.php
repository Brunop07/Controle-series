<?php

namespace App\Http\Controllers;


use App\Models\Series;
use Illuminate\Http\Request;
use App\Http\Requests\SeriesFromRequest;
use App\Repositories\SeriesRepository;


class SeriesController extends Controller
{

    public function __construct(
        private SeriesRepository $repository
        )
    {

    }

    public function index(Request $request)
    {
        $series = Series::all();
        $mensagemSucesso = session('mensagem.sucesso');

        return view('series.index')->with('series', $series)
        ->with('mensagemSucesso', $mensagemSucesso);
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(SeriesFromRequest $request)
    {
        $serie = $this->repository->add($request);
        return to_route('series.index')
        ->with('mensagem.sucesso', "Série '{$serie->name}' adicionada com sucesso!");
    }

    public function destroy(Series $series)
    {
        $series->delete($series->id);
    
        return to_route('series.index')
        ->with('mensagem.sucesso', "Série '{$series->name}' removida com sucesso!");
    }

    public function edit(Series $series)
    {
        return view('series.edit')->with('series', $series);
    }

    public function update(SeriesFromRequest $request, Series $series)
    {
        $series->update($request->all());

        return to_route('series.index')
        ->with('mensage.sucesso', "Série '{$series->name}' atualizada com sucesso!");
    }
}    
