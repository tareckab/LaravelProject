@extends('layout')

@section('content')
<h1>Criar Nova Conta de Banco</h1>

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

    <label>Nome do Banco:</label><br>
    <input type="text" name="name_bank" value="{{ old('name_bank') }}"><br><br>

    <label>Agência:</label><br>
    <input type="text" name="agency" value="{{ old('agency') }}"><br><br>

    <label>Número da Conta:</label><br>
    <input type="text" name="account_number" value="{{ old('account_number') }}"><br><br>

    <label>Tipo de Conta:</label><br>
    <input type="text" name="account_type" value="{{ old('account_type') }}"><br><br>

    <label>User ID:</label><br>
    <input type="number" name="user_id" value="{{ old('user_id') }}"><br><br>

    <button type="submit">Salvar</button>
</form>

<a href="{{ route('bank.index') }}">Voltar</a>

 <a href="{{ route('dashboard') }}">Voltar para o Dashboard</a>
@endsection


