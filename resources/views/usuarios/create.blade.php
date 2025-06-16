@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Novo Usuario</h1>

    <form action="{{ route('usuarios.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Nome</label>
            <input type="text" name="nome" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Senha</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="bank_id">Banco:</label>
    <select name="bank_id" required>
        <option value="">-- Selecione o banco --</option>
        @foreach($banks as $bank)
            <option value="{{ $bank->id }}">{{ $bank->name_bank }}</option>
        @endforeach
    </select>
        </div>

        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

 <a href="{{ route('dashboard') }}">Voltar para o Dashboard</a>
@endsection
