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
            box-shadow: 0px 0px 8px rgba(0,0,0,0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .mb-3 {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .btn-primary {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .links {
            text-align: center;
            margin-top: 20px;
        }

        .links a {
            margin: 0 10px;
        }

        .error-list {
            color: red;
            margin-bottom: 20px;
        }
    </style>

    <div class="form-container">
        <h1>Editar Banco #{{ $bank->id }} - {{ $bank->name_bank }}</h1>

        @if ($errors->any())
            <div class="error-list">
                <ul>
                    @foreach ($errors->all() as $erro)
                        <li>{{ $erro }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('bank.update', $bank->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Nome do Banco:</label>
                <input type="text" name="name_bank" value="{{ old('name_bank', $bank->name_bank) }}">
            </div>

            <div class="mb-3">
                <label>Agência:</label>
                <input type="text" name="agency" value="{{ old('agency', $bank->agency) }}">
            </div>

            <div class="mb-3">
                <label>Número da Conta:</label>
                <input type="text" name="account_number" value="{{ old('account_number', $bank->account_number) }}">
            </div>

            <div class="mb-3">
                <label>Tipo de Conta:</label>
                <input type="text" name="account_type" value="{{ old('account_type', $bank->account_type) }}">
            </div>

            <div class="mb-3">
                <label>User ID:</label>
                <input type="number" name="user_id" value="{{ old('user_id', $bank->user_id) }}">
            </div>

            <button type="submit" class="btn btn-primary">Atualizar</button>
        </form>

        <div class="links">
            <a href="{{ route('bank.index') }}">← Voltar</a>
            <a href="{{ route('dashboard') }}">Dashboard</a>
        </div>
    </div>
@endsection
