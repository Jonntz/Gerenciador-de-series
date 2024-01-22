<x-layout title="Series">
    <a href="{{ route('series.create')}}">
        <button class="btn btn-dark mb-2">Adicionar serie</button>
    </a>

    @isset($messageSuccess)
        <div class="alert alert-success">
            {{ $messageSuccess }}
        </div>
    @endisset

    <ul class="list-group">
        @foreach ($series as $serie)
            <li class="list-group-item d-flex justify-content-between align-items-center"> 
                <a href="{{ route('seasons.index', $serie->id) }}">
                    {{$serie->name}}
                </a>
                
                <span class="d-flex">
                    <a class="btn btn-link" href="{{route('series.edit', $serie->id)}}">
                        <i class="fa-solid fa-pen" style="color: #3600f8;"></i>
                    </a>

                    <form action="{{ route('series.destroy', $serie->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-link">
                            <i class="fa-solid fa-trash" style="color: #d10000;"></i>
                        </button>
                    </form> 
    
                </span>
            </li>
        @endforeach
    </ul>
</x-layout>
