@extends('layouts.app')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ isset($product) ? 'Editar Produto' : 'Novo Produto' }}</h3>
                </div>

                <div class="card-body">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ isset($product) ? route('products.update', $product->id) : route('products.store') }}" method="POST">
                        @csrf
                        @if(isset($product))
                            @method('PUT')
                        @endif

                        <div class="form-group">
                            <label for="name">Nome do Produto</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $product->name ?? old('name') ?? '' }}" required>
                        </div>

                        <div class="form-group">
                            <label for="description">Descrição</label>
                            <textarea class="form-control" id="description" name="description">{{ $product->description ?? old('description') ?? '' }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="price">Preço</label>
                            <input type="number" step="0.01" class="form-control" id="price" name="price" value="{{ $product->price ?? old('price') ?? '' }}" required>
                        </div>

                        <div class="form-group">
                            <label for="quantity">Quantidade</label>
                            <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $product->quantity ?? old('quantity') ?? '' }}" required>
                        </div>

                        <div class="form-group">
                            <label for="category_id">Categoria</label>
                            <select class="form-control" id="category_id" name="category_id" required>
                                <option value="">Selecione uma Categoria</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ (isset($product) && $product->category_id == $category->id) || old('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group d-flex justify-content-start mt-3">
                            <button type="submit" class="btn btn-success">Salvar</button>
                            <a href="{{ route('products.index') }}" class="btn btn-secondary ml-2">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
