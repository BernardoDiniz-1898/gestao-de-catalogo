@extends('layouts.app')

@section('title', 'Editar Equipamento')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="d-flex align-items-center mb-4">
            <a href="{{ route('equipamentos.index') }}" class="btn btn-light rounded-circle me-3 shadow-sm">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
            <div>
                <h2 class="fw-bold mb-0">Editar Equipamento</h2>
                <p class="text-muted small mb-0">Atualize as informações técnicas e o status do item.</p>
            </div>
        </div>

        <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
                <form action="{{ route('equipamentos.update', $equipamentos->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="row g-4">
                        <!-- Seção Principal -->
                        <div class="col-md-12">
                            <h5 class="text-primary border-bottom pb-2 mb-3">
                                <i class="fa-solid fa-info-circle me-2"></i>Informações Gerais
                            </h5>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold text-secondary">Nome do Equipamento</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0 text-muted">
                                    <i class="fa-solid fa-tag"></i>
                                </span>
                                <input type="text" name="nome" class="form-control border-start-0" 
                                       value="{{ old('nome', $equipamentos->nome) }}" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold text-secondary">Status Operacional</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0 text-muted">
                                    <i class="fa-solid fa-toggle-on"></i>
                                </span>
                                <select name="status" class="form-select border-start-0">
                                    @foreach(['Ativo', 'Manutenção', 'Inativo', 'Disponível'] as $status)
                                        <option value="{{ $status }}" {{ $equipamentos->status == $status ? 'selected' : '' }}>
                                            {{ $status }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Detalhes Técnicos -->
                        <div class="col-md-4">
                            <label class="form-label fw-semibold text-secondary">Modelo</label>
                            <input type="text" name="modelo" class="form-control" value="{{ old('modelo', $equipamentos->modelo) }}">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label fw-semibold text-secondary">Fabricante</label>
                            <input type="text" name="fabricante" class="form-control" value="{{ old('fabricante', $equipamentos->fabricante) }}">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label fw-semibold text-secondary">Valor Estimado</label>
                            <div class="input-group">
                                <span class="input-group-text">R$</span>
                                <input type="number" step="0.01" name="valor_estimado" class="form-control" 
                                       value="{{ old('valor_estimado', $equipamentos->valor_estimado) }}">
                            </div>
                        </div>

                        <div class="col-12">
                            <label class="form-label fw-semibold text-secondary">Descrição e Notas Técnicas</label>
                            <textarea name="descricao" class="form-control" rows="4" 
                                      placeholder="Detalhes sobre garantia, estado físico ou observações...">{{ old('descricao', $equipamentos->descricao) }}</textarea>
                        </div>

                        <!-- Ações -->
                        <div class="col-12 mt-5">
                            <div class="d-flex justify-content-between align-items-center bg-light p-3 rounded-3">
                                <span class="text-muted small">
                                    <i class="fa-regular fa-clock me-1"></i> 
                                    Última atualização: {{ $equipamentos->updated_at->format('d/m/Y H:i') }}
                                </span>
                                <div>
                                    <a href="{{ route('equipamentos.index') }}" class="btn btn-outline-secondary me-2">
                                        Cancelar
                                    </a>
                                    <button type="submit" class="btn btn-primary px-4 shadow-sm">
                                        <i class="fa-solid fa-floppy-disk me-2"></i>Salvar Alterações
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection