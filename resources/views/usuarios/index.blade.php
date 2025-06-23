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
        <h1>Lista de Usuários</h1>

        @if(session('success'))
            <div class="success-message">{{ session('success') }}</div>
        @endif

        <div class="actions">
            <a href="{{ route('usuarios.create') }}">Adicionar Novo Usuário</a>
            <a href="{{ route('bank.index') }}">Ver Lista de Bancos</a>
        </div>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Banco</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $usuario)
                    <tr>
                        <td>{{ $usuario->id }}</td>
                        <td>{{ $usuario->nome }}</td>
                        <td>{{ $usuario->email }}</td>
                        <td>{{ $usuario->bank->name_bank ?? 'Sem Banco' }}</td>
                        <td>
                            <a href="{{ route('usuarios.edit', $usuario->id) }}">Editar</a> |
                            <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Tem certeza que deseja deletar?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="background:none; border:none; color:red; cursor:pointer;">Deletar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <a class="dashboard-link" href="{{ route('dashboard') }}">Voltar para o Dashboard</a>
    </div>
@endsection
