@extends('layouts.app')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ isset($category) ? 'Editar Categoria' : 'Criar Categoria' }}</h3>
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

                    <form action="{{ isset($category) ? route('categories.update', $category->id) : route('categories.store') }}" method="POST">
                        @csrf
                        @if(isset($category))
                            @method('PUT')
                        @endif

                        <div class="form-group">
                            <label for="name">Nome da Categoria</label>
                            <input type="text" class="form-control" id="name" name="name"
                                   value="{{ $category->name ?? old('name') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="description">Descrição</label>
                            <textarea class="form-control" id="description" name="description">{{ $category->description ?? old('description') }}</textarea>
                        </div>

                        <div class="form-group d-flex justify-content-start mt-3">
                            <button type="submit" class="btn btn-success">Salvar</button>
                            <a href="{{ route('categories.index') }}" class="btn btn-secondary ml-2">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
