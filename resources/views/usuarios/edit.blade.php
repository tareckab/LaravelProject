@extends('layouts.app')

<link rel="stylesheet" href="{{ asset('css/app.css') }}">

@section('content')
<div class="container">
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
        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

 <a href="{{ route('dashboard') }}">Voltar para o Dashboard</a>
@endsection
