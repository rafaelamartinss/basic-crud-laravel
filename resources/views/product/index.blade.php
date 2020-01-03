@extends('app')

@section('content')
<h3>Produtos</h3>

<a class="btn btn-small btn-info" href="{{ URL::to('products/create') }}">Novo Produto</a><br><br>

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
        <td>Valor</td>
        <td>Quantidade</td>
        <td></td>
        <td></td>
    </tr>
    </thead>
    <tbody>
    @foreach($products as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->name }}</td>
            <td>{{ $value->value }}</td>
            <td>{{ $value->quantity }}</td>
            <td>
                <a class="btn btn-small btn-info" href="{{ route('products.edit', $value->id) }}">Editar</a>
                <a class="btn btn-small btn-primary" href="{{ route('products.show', $value->id) }}">Detalhes</a>
            </td>
            <td>
                <form action="{{ route('products.destroy', $value->id)}}" method="post">
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
