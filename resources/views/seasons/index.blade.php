<x-layout title="Temporadas de {!! $series->name !!}">
    
    <ul class="list-group mt-3 mb-5">
        @foreach ($seasons as $season)
            <li class="list-group-item d-flex justify-content-between align-items-center"> 
                <a href="{{ route('episodes.index', $season->id) }}">
                    Temporada: {{$season->number + 1}}
                </a>
                
                <span class="badge bg-secondary">
                   {{$season->numberOfWatchedEpisode()}} / {{$season->episodes->count()}}
                </span>
            </li>
        @endforeach
    </ul>
</x-layout>
