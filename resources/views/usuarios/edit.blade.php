@extends('layouts.app')

@section('content')
<style>
    .form-container {
        width: 90%;
        max-width: 700px;
        margin: 40px auto;
        padding: 30px;
        background-color: #f9f9f9;
        border-radius: 8px;
        box-shadow: 0 0 8px rgba(0, 0, 0, 0.1);
    }

    h1 {
        text-align: center;
        margin-bottom: 20px;
    }

    .btn-group {
        display: flex;
        justify-content: space-between;
        margin-top: 20px;
    }

    .dashboard-link {
        text-align: center;
        margin-top: 30px;
    }
</style>

<div class="form-container">
    <h1>Editar Usuário</h1>

    <form action="{{ route('usuarios.update', $usuario->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nome</label>
            <input type="text" name="nome" value="{{ $usuario->name }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" value="{{ $usuario->email }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Banco</label>
            <select name="bank_id" class="form-control" required>
                <option value="">-- Selecione um banco --</option>
                @foreach ($banks as $bank)
                    <option value="{{ $bank->id }}" {{ $usuario->bank_id == $bank->id ? 'selected' : '' }}>
                        {{ $bank->name_bank }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="btn-group">
            <button type="submit" class="btn btn-primary">Atualizar</button>
            <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>

    <div class="dashboard-link">
        <a href="{{ route('dashboard') }}">← Voltar para o Dashboard</a>
    </div>
</div>
@endsection
