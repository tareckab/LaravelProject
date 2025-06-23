<?php

namespace App\Http\Controllers;
use App\Models\Bank;
use Illuminate\Http\Request;

class BankController extends Controller
{
        // Exibe a lista de todos os bancos

    public function index()
    {
       $banks = Bank::with('usuario')->get(); // Carrega os usuários relacionados
    return view('bank.index', compact('banks'));
        //
    }

    // Exibe o formulário para criar um novo banco
    public function create()
    {
        return view('bank.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_bank' => 'required|string|max:255',
            'agency' => 'required|string|max:50',
            'account_number' => 'required|string|max:50',
            'account_type' => 'required|string|max:100',
            //'user_id' => 'required|exists:usuarios,id',
        ]);

        Bank::create($request->all());

        return redirect()->route('bank.index')->with('success', 'Banco criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $bank = Bank::findOrFail($id);
        return view('bank.show', compact('bank'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
         $bank = Bank::findOrFail($id);
         
    return view('bank.edit', compact('bank'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $request->validate([
            
            'name_bank' => 'required|string|max:255',
            'agency' => 'required|string|max:50',
            'account_number' => 'required|string|max:50',
            'account_type' => 'required|string|max:100',
            //'user_id' => 'required|exists:users,id',
        ]);

        $bank = Bank::findOrFail($id);
        $bank->update($request->all());

        return redirect()->route('bank.index')->with('success', 'Banco atualizado com sucesso!');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        {
        $bank = Bank::findOrFail($id);
        $bank->delete();

        return redirect()->route('bank.index')->with('success', 'Banco deletado com sucesso!');
    }
    }
}
