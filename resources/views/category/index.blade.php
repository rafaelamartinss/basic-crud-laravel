@extends('app')

@section('content')
<h3>Categorias</h3>

<a class="btn btn-small btn-info" href="{{ URL::to('categories/create') }}">Nova Categoria</a><br><br>

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

<table class="table table-striped table-bordered">
    <thead>
    <tr>
        <td>ID</td>
        <td>Nome</td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    </thead>
    <tbody>
    @foreach($categories as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->name }}</td>
            <td>
                <a class="btn btn-small btn-info" href="{{ route('categories.edit', $value->id) }}">Editar</a>
                <a class="btn btn-small btn-primary" href="{{ route('categories.show', $value->id) }}">Detalhes</a>
            </td>
            <td>
                <form action="{{ route('categories.destroy', $value->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Excluir</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
