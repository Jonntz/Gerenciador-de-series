<form action="{{ $action }}" method="post">
    @csrf

    @if($update)
        @method('PUT')
    @endif
    <div class="mb-3">
        <label for="name" class="form-label">Nome:</label>
        <input name="name" id="name" type="text" class="form-control" 
            @isset($name)value="{{ $name }}@endisset">
    </div>

    <button type="submit" class="btn btn-primary">Adicionar</button>
</form>