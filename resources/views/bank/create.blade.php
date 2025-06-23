@extends('layout')

@section('content')
    <style>
        .form-container {
            width: 500px;
            margin: 40px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background-color: #f9f9f9;
        }

        .form-container label {
            display: block;
            margin-top: 10px;
        }

        .form-container input {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            box-sizing: border-box;
        }

        .form-actions {
            margin-top: 15px;
            display: flex;
            gap: 10px;
        }

        .form-actions button,
        .form-actions a {
            padding: 10px 20px;
            text-decoration: none;
            text-align: center;
            border-radius: 4px;
            border: 1px solid transparent;
            cursor: pointer;
            user-select: none;
        }

        .form-actions button {
            background-color: #007bff;
            color: white;
            border-color: #007bff;
            transition: background-color 0.3s ease;
        }

        .form-actions button:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .form-actions a {
            background-color: #6c757d;
            color: white;
            border-color: #6c757d;
        }

        .form-actions a:hover {
            background-color: #5a6268;
            border-color: #545b62;
        }

        .back-dashboard {
            margin-top: 15px;
            text-align: center;
        }
    </style>

    <div class="form-container">
        <h2 style="text-align: center;">Criar Nova Conta de Banco</h2>

        @if ($errors->any())
            <div style="color: red;">
                <ul>
                    @foreach ($errors->all() as $erro)
                        <li>{{ $erro }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('bank.store') }}" method="POST">
            @csrf

            <label>Nome do Banco:</label>
            <input type="text" name="name_bank" value="{{ old('name_bank') }}">

            <label>Agência:</label>
            <input type="text" name="agency" value="{{ old('agency') }}">

            <label>Número da Conta:</label>
            <input type="text" name="account_number" value="{{ old('account_number') }}">

            <label>Tipo de Conta:</label>
            <input type="text" name="account_type" value="{{ old('account_type') }}">

            <label>User ID:</label>
            <input type="number" name="user_id" value="{{ old('user_id') }}">

            <div class="form-actions">
                <button type="submit">Salvar</button>
                <a href="{{ route('bank.index') }}">Cancelar</a>
            </div>
        </form>

        <div class="back-dashboard">
            <a href="{{ route('dashboard') }}">Voltar para o Dashboard</a>
        </div>
    </div>
@endsection
