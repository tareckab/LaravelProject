@extends('layout')

@section('content')
    <h1>Conta {{ $bank->id }} {{ $bank->name_bank }}</h1>

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

<a href="{{ route('bank.index') }}">Voltar</a>

 <a href="{{ route('dashboard') }}">Voltar para o Dashboard</a>
@endsection
