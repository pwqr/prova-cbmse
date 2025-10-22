@extends('layouts.app')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ isset($product) ? 'Editar Produto' : 'Novo Produto' }}</h3>
            </div>

            <div class="card-body">
                <form action="{{ isset($product) ? route('products.update', $product->id) : route('products.store') }}" method="POST">
                    @csrf
                    @if(isset($product))
                        @method('PUT')
                    @endif

                    <div class="form-group">
                        <label for="name">Nome do Produto</label>
                        <input 
                            type="text" 
                            class="form-control @error('name') is-invalid @enderror" 
                            id="name" 
                            name="name" 
                            value="{{ old('name', $product->name ?? '') }}"
                            placeholder="Digite o nome do produto">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="description">Descrição</label>
                        <textarea 
                            class="form-control @error('description') is-invalid @enderror" 
                            id="description" 
                            name="description"
                            placeholder="Descrição do produto">{{ old('description', $product->description ?? '') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="price">Preço</label>
                        <input 
                            type="number" 
                            step="0.01" 
                            class="form-control @error('price') is-invalid @enderror" 
                            id="price" 
                            name="price" 
                            value="{{ old('price', $product->price ?? '') }}"
                            placeholder="Ex: 199.99">
                        @error('price')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="quantity">Quantidade</label>
                        <input 
                            type="number" 
                            class="form-control @error('quantity') is-invalid @enderror" 
                            id="quantity" 
                            name="quantity" 
                            value="{{ old('quantity', $product->quantity ?? '') }}"
                            placeholder="Ex: 10">
                        @error('quantity')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="category_id">Categoria</label>
                        <select 
                            class="form-control @error('category_id') is-invalid @enderror" 
                            id="category_id" 
                            name="category_id">
                            <option value="">Selecione uma Categoria</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ (old('category_id', $product->category_id ?? '') == $category->id) ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group d-flex justify-content-start mt-3">
                        <button type="submit" id="saveButton" class="btn btn-success">Salvar</button>
                        <a href="{{ route('products.index') }}" class="btn btn-secondary ml-2">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');
    const saveButton = document.getElementById('saveButton');

    form.addEventListener('submit', function() {
        saveButton.disabled = true;
        saveButton.innerText = 'Salvando...';
    });
});
</script>
@endsection
