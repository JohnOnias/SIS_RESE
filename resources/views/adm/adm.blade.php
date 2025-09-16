@extends('layouts.app')

@section('content')



<h1>cadastrar equipamento teste</h1>
    
<form method='POST' id="login-form">
    @csrf
    <h2 class="h5 mb-4 fw-bold text-center">Cadastro de Equipamento</h2>
    
    <div class="mb-3">
        <label for="nome" class="form-label">Nome do Equipamento</label>
        <div class="input-group">
            <span class="input-group-text"><i class="fas fa-toolbox"></i></span>
            <input type="text" class="form-control" name="nome_equipamento" id='nome' placeholder="Nome do equipamento" required>
        </div>
    </div>

    <div class="mb-3">
        <label for="descricao" class="form-label">Descrição do Equipamento</label>
        <div class="input-group">
            <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
            <input type="text" class="form-control" name="descricao_equipamento" id="descricao" placeholder="Descrição do equipamento" required>
        </div>
    </div>

    <div class="mb-3">
        <label for="qtd" class="form-label">Quantidade</label>
        <div class="input-group">
            <span class="input-group-text"><i class="fas fa-hashtag"></i></span>
            <input type="number" class="form-control" min="0" name="quantidade_equipamento" id="qtd" placeholder="Quantidade" required>
        </div>
    </div>

    <button type="submit" class="btn btn-success w-100">
        <i class="fas fa-save me-2"></i> Cadastrar
    </button>
</form>



@endsection