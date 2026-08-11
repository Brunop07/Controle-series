<x-layout title="Temporadas de {!! $series->name !!}">

    <img src="{{ asset('storage/' . $series->cover) }}" alt="Capa da série {!! $series->name !!}" class="img-fluid mb-3" style="max-width: 200px;">
    <ul class="list-group">
        @foreach ($seasons as $season)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="{{ route('episodes.index', $season->id) }}">
                    Temporada {{ $season->number }}
                </a>
            <span class="badge bg-primary rounded-pill">
                {{ $season->numberOfWatchedEpisodes() }} / {{ $season->episodes->count() }}
            </span>
        </li>
        @endforeach
    </ul>
</x-layout>