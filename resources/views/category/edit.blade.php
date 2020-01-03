@extends('app')

@section('content')
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h3>Editar categoria</h3>
            <div>
                <form method="post" action="{{ route('categories.update', $category->id) }}">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="name">Nome:</label>
                        <input type="text" class="form-control" name="name" id="name" value={{ $category->name }}>
                    </div>
                    <button type="submit" class="btn btn-success">Atualizar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
