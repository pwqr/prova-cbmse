<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="categories-table">
            <thead>
            <tr>
                <th>Nome</th>
                <th>Descrição</th>
                <th colspan="3">Ações</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->description ?? 'Sem descrição' }}</td>
                    <td style="width: 150px">
                        {!! Form::open(['route' => ['categories.destroy', $category->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            </a>
                            <a href="{{ route('categories.edit', $category->id) }}" class='btn btn-default btn-xs'>
                                <i class="far fa-edit"></i>
                            </a>
                            {!! Form::button('<i class="far fa-trash-alt"></i>', [
                                'type' => 'submit',
                                'class' => 'btn btn-danger btn-xs',
                                'onclick' => "return confirm('Tem certeza que deseja excluir?')"
                            ]) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    @if($categories instanceof \Illuminate\Pagination\LengthAwarePaginator && $categories->hasPages())
        <div class="card-footer clearfix">
            <div class="float-right">
                {{ $categories->links() }}
            </div>
        </div>
    @endif
</div>
