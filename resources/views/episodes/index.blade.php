<x-layout title="Episódios" :messageSuccess='$messageSuccess'>
    

    <form method="post">
        @csrf
        <ul class="list-group mt-3 mb-3">
            @foreach ($episodes as $episode)
                <li class="list-group-item d-flex justify-content-between align-items-center"> 
                   
                    Episódio {{$episode->number + 1}}
                    
                    <input 
                        type="checkbox" 
                        class="form-check-input" 
                        name="episodes[]" 
                        value="{{ $episode->id }}"
                        @if ( $episode->watched) checked @endif
                    >               
                </li>
            @endforeach
        </ul>
        <button type="submit" class="btn btn-primary">
            Salvar
        </button>
    </form>

</x-layout>
