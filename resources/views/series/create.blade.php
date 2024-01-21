<x-layout title="Nova Serie">
    <form action="{{route('series.store')}}" method="post">
        @csrf
        <div class="row mb-3">
            <div class="row">
                <label for="name" class="form-label">Nome:</label>
                <input autofocus name="name" id="name" type="text" class="form-control" 
                    value="{{old('name')}}">
            </div>

            <div class="row">
                <label for="seasons" class="form-label">Temporadas:</label>
                <input name="seasons" id="seasons" type="text" class="form-control" 
                    value="{{old('seasons')}}">
            </div>

            <div class="row">
                <label for="episodes" class="form-label">Episódios por temporada:</label>
                <input name="episodes" id="episodes" type="text" class="form-control" 
                    value="{{old('episodes')}}">
            </div>
        </div>
    
        <button type="submit" class="btn btn-primary">Adicionar</button>
    </form>
</x-layout>