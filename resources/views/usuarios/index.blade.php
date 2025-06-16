

<!DOCTYPE html>
<html>
<head>
    
    <title>Lista de Contas</title>
</head>
<body>

<div class="container">
    <h1>Lista de Contas</h1>

    
    <a href="{{ route('bank.index') }}">Ir para Bancos</a>
   
    <table border="1" cellpadding="8" cellspacing="0">
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
                        <a href="{{ route('usuarios.edit', $usuario->id) }}">Editar</a>
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
     <a href="{{ route('usuarios.create') }}">Adicionar Novo Usuario</a>

     <a href="{{ route('dashboard') }}">Voltar para o Dashboard</a>

</div> <!-- div container -->
</body>
</html>
