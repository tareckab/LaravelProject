@extends('layout')

@section('content')
<style>
    .container {
        max-width: 600px;
        margin: 40px auto;
        padding: 20px;
        background: #f9f9f9;
        border-radius: 8px;
        box-shadow: 0 0 8px rgba(0,0,0,0.1);
    }

    h1 {
        text-align: center;
        margin-bottom: 25px;
    }

    p {
        font-size: 1.1rem;
        margin: 10px 0;
    }

    .links {
        margin-top: 30px;
        text-align: center;
    }

    .links a {
        margin: 0 10px;
        padding: 8px 16px;
        background-color: #6c757d;
        color: white;
        text-decoration: none;
        border-radius: 4px;
        transition: background-color 0.3s ease;
    }

    .links a:hover {
        background-color: #5a6268;
    }
</style>

<div class="container">
    <h1>Conta {{ $bank->id }} - {{ $bank->name_bank }}</h1>

    <p><strong>Nome do Banco:</strong> {{ $bank->name_bank }}</p>
    <p><strong>Agência:</strong> {{ $bank->agency }}</p>
    
    <p><strong>Número da Conta:</strong> 
        {{ 
            substr($bank->account_number, 0, 4) . '-' . 
            substr($bank->account_number, 4, 4) . '-' . 
            substr($bank->account_number, 8) 
        }}
    </p>

    <p><strong>Tipo de Conta:</strong> {{ $bank->account_type }}</p>

    <p><strong>Usuário:</strong> {{ $bank->usuario->nome ?? 'Usuário não encontrado' }}</p>

    <div class="links">
        <a href="{{ route('bank.index') }}">Voltar</a>
        <a href="{{ route('dashboard') }}">Voltar para o Dashboard</a>
    </div>
</div>
@endsection
