<x-layout title="Series">
    <a href="/series/create">
        <button class="btn btn-dark mb-2">Adicionar serie</button>
    </a>

    <ul class="list-group">
        @foreach ($series as $serie)
            <li class="list-group-item"> {{$serie->name}}</li>
        @endforeach
    </ul>
</x-layout>
