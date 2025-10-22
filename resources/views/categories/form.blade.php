@extends('layouts.app')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h3 class="card-title">{{ isset($category) ? 'Editar Categoria' : 'Criar Categoria' }}</h3>
                </div>

                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form 
                        action="{{ isset($category) ? route('categories.update', $category->id) : route('categories.store') }}" 
                        method="POST" 
                        novalidate
                    >
                        @csrf
                        @if(isset($category))
                            @method('PUT')
                        @endif

                        <div class="form-group mb-3">
                            <label for="name">Nome da Categoria</label>
                            <input 
                                type="text" 
                                class="form-control @error('name') is-invalid @enderror"
                                id="name" 
                                name="name"
                                value="{{ old('name', $category->name ?? '') }}"
                                placeholder="Digite o nome da categoria"
                            >
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="description">Descrição</label>
                            <textarea 
                                class="form-control @error('description') is-invalid @enderror"
                                id="description" 
                                name="description"
                                placeholder="Adicione uma descrição"
                            >{{ old('description', $category->description ?? '') }}</textarea>
                            @error('description')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group d-flex justify-content-start mt-3">
                            <button type="submit" id="saveButton" class="btn btn-success">
                                {{ isset($category) ? 'Salvar Alterações' : 'Criar Categoria' }}
                            </button>
                            <a href="{{ route('categories.index') }}" class="btn btn-secondary ms-2">Cancelar</a>
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
