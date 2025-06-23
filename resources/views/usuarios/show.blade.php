@extends('layouts.app')

@section('content')
<style>
    .user-details-container {
        width: 90%;
        max-width: 600px;
        margin: 40px auto;
        padding: 25px;
        background-color: #fdfdfd;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    .user-details-container h1 {
        text-align: center;
        margin-bottom: 20px;
    }

    .user-details-container p {
        font-size: 1.1rem;
        margin-bottom: 10px;
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

<div class="user-details-container">
    <h1>Usuário: {{ $usuario->nome }}</h1>

    <p><strong>Email:</strong> {{ $usuario->email }}</p>

    <div class="btn-group">
        <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">← Voltar</a>
        <a href="{{ route('dashboard') }}" class="btn btn-outline-primary">Dashboard</a>
    </div>
</div>
@endsection
