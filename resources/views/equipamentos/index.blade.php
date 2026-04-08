@extends('layouts.app')

@section('title', 'Meus Equipamentos')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold mb-0">Meus Equipamentos</h2>
        <p class="text-muted small">Gerencie e monitore o inventário cadastrado.</p>
    </div>
    <a href="{{ route('equipamentos.create') }}" class="btn btn-primary shadow-sm">
        <i class="fa-solid fa-plus me-2"></i>Novo Equipamento
    </a>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light">
                    <tr>
                        <th class="ps-4">Equipamento</th>
                        <th>Modelo/Marca</th>
                        <th>Status</th>
                        <th>Valor Est.</th>
                        <th class="text-end pe-4">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($equipamentos as $equipamento)
                        <tr>
                            <td class="ps-4">
                                <div class="d-flex align-items-center">
                                    <div class="bg-light rounded p-2 me-3 text-primary">
                                        <i class="fa-solid fa-microchip fa-lg"></i>
                                    </div>
                                    <div>
                                        <div class="fw-bold text-dark">{{ $equipamento->nome }}</div>
                                        <div class="text-muted small">S/N: {{ $equipamento->numero_serie ?? 'N/A' }}</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="text-dark">{{ $equipamento->modelo ?? '-' }}</span>
                                <div class="text-muted small">{{ $equipamento->fabricante ?? 'Sem fabricante' }}</div>
                            </td>
                            <td>
                                @php
                                    $statusClasses = [
                                        'Ativo' => 'bg-success-subtle text-success border-success-subtle',
                                        'Manutenção' => 'bg-danger-subtle text-danger border-danger-subtle',
                                        'Inativo' => 'bg-secondary-subtle text-secondary border-secondary-subtle',
                                        'Disponível' => 'bg-info-subtle text-info border-info-subtle',
                                    ];
                                    $class = $statusClasses[$equipamento->status] ?? 'bg-light text-dark';
                                @endphp
                                <span class="badge border {{ $class }} px-2 py-1">
                                    <i class="fa-solid fa-circle font-xs me-1" style="font-size: 0.5rem;"></i>
                                    {{ $equipamento->status }}
                                </span>
                            </td>
                            <td>
                                <span class="fw-medium text-dark">
                                    R$ {{ number_format($equipamento->valor_estimado, 2, ',', '.') }}
                                </span>
                            </td>
                            <td class="text-end pe-4">
                                <div class="dropdown">
                                    <button class="btn btn-light btn-sm rounded-pill" type="button" data-bs-toggle="dropdown">
                                        <i class="fa-solid fa-ellipsis-vertical"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0">
                                        <li>
                                            <a class="dropdown-item" href="{{ route('equipamentos.edit', $equipamento->id) }}">
                                                <i class="fa-solid fa-pen-to-square me-2 text-primary"></i>Editar
                                            </a>
                                        </li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li>
                                            <form action="{{ route('equipamentos.destroy', $equipamento->id) }}" method="POST" onsubmit="return confirm('Excluir permanentemente este item?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item text-danger">
                                                    <i class="fa-solid fa-trash me-2"></i>Excluir
                                                </button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-5">
                                <img src="https://cdn-icons-png.flaticon.com/512/4076/4076432.png" alt="Vazio" style="width: 80px;" class="opacity-25 mb-3">
                                <p class="text-muted">Nenhum equipamento encontrado na sua conta.</p>
                                <a href="{{ route('equipamentos.create') }}" class="btn btn-sm btn-primary">Começar agora</a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection