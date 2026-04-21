<x-layout title="Nova Série">
    <form action="/series" method="post">
        <div class="mb-3">
            <label for="name" class="form-label">Nome da série:</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <button type="submit" class="btn btn-primary">Adicionar</button>
    </form>
</x-layout>
