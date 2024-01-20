<x-layout title="Nova Serie">
    <form action="/series/save" method="post">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nome:</label>
            <input name="name" id="name" type="text" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Adicionar</button>
    </form>
</x-layout>