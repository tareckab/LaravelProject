@extends('layout')

@section('content')
<h1>Lista de Contas no Banco</h1>

@if(session('success'))
    <div style="color: green;">{{ session('success') }}</div>
@endif

<a href="{{ route('bank.create') }}">Adicionar Novo Banco</a>
<a href="{{ route('usuarios.index') }}">Ver Lista de Usuários</a>


<table border="1" cellpadding="5" cellspacing="0" style="margin-top: 10px;">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome do Banco</th>
            <th>Agência</th>
            <th>Número da Conta</th>
            <th>Tipo de Conta</th>
            <th>User ID</th>
            <th>Nome do Usuario</th>
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

 <a href="{{ route('dashboard') }}">Voltar para o Dashboard</a>
@endsection
