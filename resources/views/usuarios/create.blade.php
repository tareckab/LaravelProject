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

        .form-container input,
        .form-container select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            box-sizing: border-box;
        }

        .form-container button {
            margin-top: 15px;
            padding: 10px 20px;
        }
    </style>

    <div class="form-container">
        <h2 style="text-align: center;">Criar Novo Usuário</h2>

        @if ($errors->any())
            <div style="color: red;">
                <ul>
                    @foreach ($errors->all() as $erro)
                        <li>{{ $erro }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('usuarios.store') }}" method="POST">
            @csrf

            <label>Nome:</label>
            <input type="text" name="nome" value="{{ old('nome') }}" required>

            <label>Email:</label>
            <input type="email" name="email" value="{{ old('email') }}" required>

            <label>Senha:</label>
            <input type="password" name="password" required>

            <label>Banco:</label>
            <select name="bank_id" required>
                <option value="">-- Selecione o banco --</option>
                @foreach($banks as $bank)
                    <option value="{{ $bank->id }}" {{ old('bank_id') == $bank->id ? 'selected' : '' }}>
                        {{ $bank->name_bank }}
                    </option>
                @endforeach
            </select>

            <button type="submit">Salvar</button>
            <a href="{{ route('usuarios.index') }}" style="margin-left: 10px;">Cancelar</a>
        </form>

        <div style="margin-top: 15px; text-align: center;">
            <a href="{{ route('dashboard') }}">Voltar para o Dashboard</a>
        </div>
    </div>
@endsection
