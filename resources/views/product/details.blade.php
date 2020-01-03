@extends('app')

@section('content')
    <h3>Detalhes do produto</h3><br>
    <h4>Nome: {{$product->name}}</h4>
    <h4>Valor: {{$product->value}}</h4>
    <h4>Quantidade: {{$product->quantity}}</h4>
    <h4>Categoria: {{$product->category_id}}</h4>
@endsection
