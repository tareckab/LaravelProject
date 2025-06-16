@extends('layouts.app')

@section('content')
<h1>Editar Banco {{ $bank->id }} {{ $bank->name_bank }}</h1>

@if ($errors->any())
    <div style="color: red;">
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
    <label>Nome do Banco:</label><br>
    <input type="text" name="name_bank" value="{{ old('name_bank', $bank->name_bank) }}"><br><br>
</div>

<div class="mb-3">
    <label>Agência:</label><br>
    <input type="text" name="agency" value="{{ old('agency', $bank->agency) }}"><br><br>
</div>
    <div class="mb-3">
    <label>Número da Conta:</label><br>
    <input type="text" name="account_number" value="{{ old('account_number', $bank->account_number) }}"><br><br>
</div>
    <div class="mb-3">
    <label>Tipo de Conta:</label><br>
    <input type="text" name="account_type" value="{{ old('account_type', $bank->account_type) }}"><br><br>
</div>
    <div class="mb-3">
    <label>User ID:</label><br>
    <input type="number" name="user_id" value="{{ old('user_id', $bank->user_id) }}"><br><br>
</div>
    

     <button type="submit" class="btn btn-primary">Atualizar</button>
</form>

<a href="{{ route('bank.index') }}">Voltar</a>

 <a href="{{ route('dashboard') }}">Voltar para o Dashboard</a>
@endsection

