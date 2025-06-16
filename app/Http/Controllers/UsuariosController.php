<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Bank;

use Illuminate\Support\Facades\Hash;

class UsuariosController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::with('bank')->get();
return view('usuarios.index', compact('usuarios'));


        
    }

    public function create()
    {
       $banks = Bank::all(); 
    return view('usuarios.create', compact('banks'));
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'nome' => 'required|string|max:255',
        'email' => 'required|email|unique:usuarios,email',
        'password' => 'required|min:6',
        'bank_id' => 'required|exists:banks,id',
    ]);

    $validated['password'] = Hash::make($validated['password']);

    Usuario::create($validated);

    return redirect()->route('usuarios.index')->with('success', 'Usuário criado com sucesso!');
}


    public function show(string $id)
    {
        $usuario = Usuario::findOrFail($id);
        return view('usuarios.show', compact('usuario'));
    }

    public function edit(string $id)
    {
       $usuario = Usuario::findOrFail($id);
    $banks = Bank::all(); 

    return view('usuarios.edit', compact('usuario', 'banks'));
    }

    public function update(Request $request, string $id)
    {
        $usuario = Usuario::findOrFail($id);

     

        $usuario->nome = $request->nome;
        $usuario->email = $request->email;
        $usuario->bank_id = $request->bank_id;

        if ($request->filled('password')) {
            $usuario->password = Hash::make($request->password);
        }
        

        $usuario->save();

        return redirect()->route('usuarios.index')->with('success', 'Usuário atualizado com sucesso!');
    }

    public function destroy(string $id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();

        return redirect()->route('usuarios.index')->with('success', 'Usuário excluído com sucesso!');
    }
}
