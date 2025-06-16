@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Usuário: {{ $usuario->nome }}</h1>

    <p><strong>Email:</strong> {{ $usuario->email }}</p>

    <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">Voltar</a>
</div>

 <a href="{{ route('dashboard') }}">Voltar para o Dashboard</a>
@endsection
