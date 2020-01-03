@extends('app')

@section('content')
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h3>Editar produto</h3>
            <div>
                <form method="post" action="{{ route('products.update', $product->id) }}">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="name">Nome:</label>
                        <input type="text" class="form-control" name="name" id="name" value={{ $product->name }}>

                        <label for="value">Valor:</label>
                        <input type="text" class="form-control" name="value" id="value" value={{ $product->value }}>

                        <label for="quantity">Quantidade:</label>
                        <input type="text" class="form-control" name="quantity" id="quantity" value={{ $product->quantity }}>

                        <label for="category_id">Categoria:</label>
                        <select class="form-control" name="category_id" id="category_id">
                            <option value="">Selecione uma categoria</option>
                            @foreach( $categories as $key => $category )
                                <option
                                    value={{ $category->id }}
                                    @if ($product->category_id == $category->id))
                                        selected="selected"
                                    @endif
                                >{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success">Atualizar</button>
                    <a href="{{ route('products.list') }}" class="btn btn-danger">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
@endsection
