@extends('layouts.app')

@section('content')
<div class="card shadow">
    <div class="card-header bg-primary text-white">
        <h4 class="mb-0">Cadastrar Novo Equipamento</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('equipamentos.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Nome do Equipamento *</label>
                    <input type="text" name="nome" class="form-control" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label">Modelo</label>
                    <input type="text" name="modelo" class="form-control">
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label">Fabricante</label>
                    <input type="text" name="fabricante" class="form-control">
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label">Número de Série</label>
                    <input type="text" name="numero_serie" class="form-control">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Data de Aquisição</label>
                    <input type="date" name="data_aquisicao" class="form-control">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select">
                        <option value="Disponível">Disponível</option>
                        <option value="Ativo">Ativo</option>
                        <option value="Manutenção">Manutenção</option>
                        <option value="Inativo">Inativo</option>
                    </select>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Descrição</label>
                <textarea name="descricao" class="form-control" rows="3"></textarea>
            </div>

            <div class="d-flex justify-content-end">
                <a href="{{ route('equipamentos.index') }}" class="btn btn-secondary me-2">Cancelar</a>
                <button type="submit" class="btn btn-success">Salvar Equipamento</button>
            </div>
        </form>
    </div>
</div>
@endsection