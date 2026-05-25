<x-layout title="Episódios" :mensagem-sucesso="$mensagemSucesso">
    <form method="POST">
        @csrf
    <ul class="list-group">
        @foreach ($episodes as $episode)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Episódio {{ $episode->number }}
                
                <input type="checkbox"
                       name="episodes[]"
                       value="{{ $episode->id }}"
                       @checked($episode->watched)>
            </li>
        @endforeach
    </ul>
    <button class="btn btn-primary mt-3">Salvar</button>
    </form>
</x-layout>