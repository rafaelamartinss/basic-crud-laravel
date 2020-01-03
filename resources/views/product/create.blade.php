@extends('app')

@section('content')
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h3>Novo produto</h3>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif

            <div>
                <form method="post" action="{{ route('products.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nome:</label>
                        <input type="text" class="form-control" id="name" name="name">

                        <label for="value">Valor:</label>
                        <input type="number" step="any" class="form-control" id="value" name="value">

                        <label for="quantity">Quantidade:</label>
                        <input type="text" class="form-control" id="quantity" name="quantity">

                        <label for="category_id">Categoria:</label>
                        <select class="form-control" name="category_id" id="category_id">
                            <option value="">Selecione uma categoria</option>
                            @foreach( $categories as $key => $category )
                                <option value={{ $category->id }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary-outline">Salvar</button>
                    <a href="{{ route('products.list') }}" class="btn btn-danger">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
@endsection

