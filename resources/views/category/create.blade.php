@extends('app')

@section('content')
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1 class="display-3">Nova categoria</h1>
            <div>
                <form method="post" action="{{ route('categories.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <button type="submit" class="btn btn-primary-outline">Salvar</button>
                    <a href="{{ route('categories.list') }}" class="btn btn-danger">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
@endsection

