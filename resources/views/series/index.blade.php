<x-layout title="Séries">

    <a href="/series/criar" class="btn btn-dark mb-2">Adicionar Série</a>
    
    <ul class="list-group">
        @foreach ($series as $serie)
            <li class="list-group-item">{{ $serie->name }}</li>
        @endforeach
    </ul>

    <script>
        const series = @json($series);
    </script>

</x-layout>