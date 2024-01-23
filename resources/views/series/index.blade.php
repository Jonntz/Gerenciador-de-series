<x-layout title="Series" :messageSuccess='$messageSuccess'>
    @auth
        <a href="{{ route('series.create')}}">
            <button class="btn btn-dark mb-2">Adicionar serie</button>
        </a>
    @endauth

    <ul class="list-group">
        @foreach ($series as $serie)
            <li class="list-group-item d-flex justify-content-between align-items-center"> 
                @auth <a href="{{ route('seasons.index', $serie->id) }}"> @endauth
                    {{$serie->name}}
                    @auth </a> @endauth
                
                <span class="d-flex">
                    @auth
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
                    @endauth
                </span>
            </li>
        @endforeach
    </ul>
</x-layout>
