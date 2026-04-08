@extends('layouts.app')

@section('title', 'Cadastrar Equipamento')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="d-flex align-items-center mb-4">
            <a href="{{ route('equipamentos.index') }}" class="btn btn-light rounded-circle me-3 shadow-sm">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
            <div>
                <h2 class="fw-bold mb-0">Novo Equipamento</h2>
                <p class="text-muted small mb-0">Adicione um novo item ao seu catálogo de gestão.</p>
            </div>
        </div>

        <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
                <form action="{{ route('equipamentos.store') }}" method="POST">
                    @csrf
                    
                    <div class="row g-4">
                        <!-- Identificação -->
                        <div class="col-md-12">
                            <h5 class="text-primary border-bottom pb-2 mb-3">
                                <i class="fa-solid fa-id-card me-2"></i>Identificação Principal
                            </h5>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold text-secondary">Nome do Equipamento *</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0 text-muted">
                                    <i class="fa-solid fa-box"></i>
                                </span>
                                <input type="text" name="nome" class="form-control border-start-0" 
                                       placeholder="Ex: MacBook Pro M2" value="{{ old('nome') }}" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold text-secondary">Status Inicial</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0 text-muted">
                                    <i class="fa-solid fa-circle-info"></i>
                                </span>
                                <select name="status" class="form-select border-start-0">
                                    <option value="Disponível" selected>Disponível</option>
                                    <option value="Ativo">Ativo</option>
                                    <option value="Manutenção">Manutenção</option>
                                    <option value="Inativo">Inativo</option>
                                </select>
                            </div>
                        </div>

                        <!-- Detalhes Técnicos -->
                        <div class="col-md-12 mt-4">
                            <h5 class="text-primary border-bottom pb-2 mb-3">
                                <i class="fa-solid fa-gears me-2"></i>Detalhes Técnicos
                            </h5>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label fw-semibold text-secondary">Modelo</label>
                            <input type="text" name="modelo" class="form-control" placeholder="Ex: A2779" value="{{ old('modelo') }}">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label fw-semibold text-secondary">Fabricante</label>
                            <input type="text" name="fabricante" class="form-control" placeholder="Ex: Apple" value="{{ old('fabricante') }}">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label fw-semibold text-secondary">Número de Série</label>
                            <input type="text" name="numero_serie" class="form-control" placeholder="Ex: SN12345678" value="{{ old('numero_serie') }}">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold text-secondary">Data de Aquisição</label>
                            <input type="date" name="data_aquisicao" class="form-control" value="{{ old('data_aquisicao') }}">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold text-secondary">Valor Estimado</label>
                            <div class="input-group">
                                <span class="input-group-text">R$</span>
                                <input type="number" step="0.01" name="valor_estimado" class="form-control" 
                                       placeholder="0,00" value="{{ old('valor_estimado') }}">
                            </div>
                        </div>

                        <div class="col-12">
                            <label class="form-label fw-semibold text-secondary">Descrição Complementar</label>
                            <textarea name="descricao" class="form-control" rows="3" 
                                      placeholder="Informações adicionais como especificações de hardware, acessórios inclusos..."></textarea>
                        </div>

                        <!-- Rodapé de Ações -->
                        <div class="col-12 mt-4">
                            <hr class="my-4">
                            <div class="d-flex justify-content-end align-items-center">
                                <a href="{{ route('equipamentos.index') }}" class="btn btn-link text-secondary text-decoration-none me-3">
                                    Descartar
                                </a>
                                <button type="submit" class="btn btn-primary px-5 py-2 shadow-sm fw-bold">
                                    <i class="fa-solid fa-check me-2"></i>Finalizar Cadastro
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection