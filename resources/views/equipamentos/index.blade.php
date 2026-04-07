@extends('layouts.app')

@section('title', 'Meus Equipamentos')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Os Meus Equipamentos</h2>
    <a href="{{ route('equipamentos.create') }}" class="btn btn-success">
        + Adicionar Equipamento
    </a>
</div>

<div class="card shadow-sm">
    <div class="card-body p-0">
        <table class="table table-hover mb-0">
            <thead class="table-light">
                <tr>
                    <th>Nome</th>
                    <th>Modelo</th>
                    <th>Fabricante</th>
                    <th>Status</th>
                    <th class="text-end">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($equipamentos as $equipamento)
                    <tr>
                        <td class="align-middle fw-bold">{{ $equipamento->nome }}</td>
                        <td class="align-middle">{{ $equipamento->modelo ?? '-' }}</td>
                        <td class="align-middle">{{ $equipamento->fabricante ?? '-' }}</td>
                        <td class="align-middle">
                            <span class="badge {{ $equipamento->status === 'Ativo' ? 'bg-success' : 'bg-warning text-dark' }}">
                                {{ $equipamento->status }}
                            </span>
                        </td>
                        <td class="text-end align-middle">
                            <div class="btn-group">
                                <a href="{{ route('equipamentos.edit', $equipamento->id) }}" class="btn btn-sm btn-outline-primary">
                                    Editar
                                </a>
                                <form action="{{ route('equipamentos.destroy', $equipamento->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Tem a certeza que deseja eliminar este equipamento?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                        Eliminar
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-4 text-muted">
                            Ainda não registou nenhum equipamento.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection