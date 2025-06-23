@extends('layout')

@section('content')
    <style>
        .container {
            width: 90%;
            max-width: 1000px;
            margin: 40px auto;
            padding: 20px;
            background-color: #fdfdfd;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .actions {
            text-align: center;
            margin-bottom: 20px;
        }

        .actions a {
            margin: 0 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        table th,
        table td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }

        table th {
            background-color: #f0f0f0;
        }

        .success-message {
            color: green;
            text-align: center;
            margin-bottom: 10px;
        }

        .dashboard-link {
            display: block;
            text-align: center;
            margin-top: 20px;
        }

        form button {
            cursor: pointer;
        }
    </style>

    <div class="container">
        <h1>Lista de Contas no Banco</h1>

        @if(session('success'))
            <div class="success-message">{{ session('success') }}</div>
        @endif

        <div class="actions">
            <a href="{{ route('bank.create') }}">Adicionar Novo Banco</a>
            <a href="{{ route('usuarios.index') }}">Ver Lista de Usuários</a>
        </div>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome do Banco</th>
                    <th>Agência</th>
                    <th>Número da Conta</th>
                    <th>Tipo de Conta</th>
                    <th>User ID</th>
                    <th>Nome do Usuário</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($banks as $bank)
                    <tr>
                        <td>{{ $bank->id }}</td>
                        <td>{{ $bank->name_bank }}</td>
                        <td>{{ $bank->agency }}</td>
                        <td>
                            {{ substr($bank->account_number, 0, 4) }}-{{ substr($bank->account_number, 4, 4) }}-{{ substr($bank->account_number, 8) }}
                        </td>
                        <td>{{ $bank->account_type }}</td>
                        <td>{{ $bank->user_id }}</td>
                        <td>{{ $bank->usuario->nome ?? 'Usuário não encontrado' }}</td>
                        <td>
                            <a href="{{ route('bank.show', $bank->id) }}">Ver</a> |
                            <a href="{{ route('bank.edit', $bank->id) }}">Editar</a> |
                            <form action="{{ route('bank.destroy', $bank->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="color:red; background:none; border:none;">Deletar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <a class="dashboard-link" href="{{ route('dashboard') }}">Voltar para o Dashboard</a>
    </div>
@endsection
