@extends('layouts.app')

@section('content')
<div class="card shadow">
    <div class="card-header bg-warning">
        <h4 class="mb-0">Editar: {{ $equipamentos->nome }}</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('equipamentos.update', $equipamentos->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Nome</label>
                    <input type="text" name="nome" class="form-control" value="{{ $equipamentos->nome }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select">
                        @foreach(['Ativo', 'Manutenção', 'Inativo', 'Disponível'] as $status)
                            <option value="{{ $status }}" {{ $equipamentos->status == $status ? 'selected' : '' }}>
                                {{ $status }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Descrição</label>
                <textarea name="descricao" class="form-control" rows="3">{{ $equipamentos->descricao }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Atualizar</button>
            <a href="{{ route('equipamentos.index') }}" class="btn btn-link">Voltar</a>
        </form>
    </div>
</div>
@endsection