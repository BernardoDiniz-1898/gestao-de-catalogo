<?php

namespace App\Http\Controllers;

use App\Models\Equipamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EquipamentosController extends Controller
{
    public function index()
    {
        $equipamentos = Equipamento::where('user_id', Auth::id())->latest()->get();
        return view('equipamentos.index', compact('equipamentos'));
    }

    public function create()
    {
        return view('equipamentos.create');
    }

    public function store(Request $request)
    {
        $validatedData['user_id'] = Auth::id();

        $validatedData = $request->validate([
            'nome' => 'required|string|max:100',
            'modelo' => 'nullable|string|max:50',
            'fabricante' => 'nullable|string|max:50',
            'numero_serie' => 'nullable|string|max:50|unique:equipamentos,numero_serie' . $equipamentos->id(),
            'data_aquisicao' => 'nullable|date',
            'status' => 'nullable|in:Ativo,Manutenção,Inativo,Disponível',
            'valor_estimado' => 'nullable|numeric|min:0',
            'localizacao' => 'nullable|string|max:255',
            'descricao' => 'nullable|string',
        ]);

        if (!isset($validatedData['status'])) {
            $validatedData['status'] = 'Disponível';
        }
        Equipamento::create($validatedData);

        return redirect()
            ->route('equipamentos.index')
            ->with('success', 'Equipamento cadastrado com sucesso!');
    }

    public function edit(Equipamento $equipamentos)
    {
        if ($equipamentos->user_id !== Auth::id())
            abort(403, 'Acesso Negado.');
        return view('equipamentos.edit', compact('equipamentos'));
    }

    public function update(Request $request, Equipamento $equipamentos)
    {
        if ($equipamentos->user_id !== Auth::id())
            abort(403, 'Acesso Negado.');
        $validatedData = $request->validate([
            'nome' => 'required|string|max:100',
            'modelo' => 'nullable|string|max:50',
            'fabricante' => 'nullable|string|max:50',
            'numero_serie' => 'nullable|string|max:50|unique:equipamentos,numero_serie',
            'data_aquisicao' => 'nullable|date',
            'status' => 'nullable|in:Ativo,Manutenção,Inativo,Disponível',
            'valor_estimado' => 'nullable|numeric|min:0',
            'localizacao' => 'nullable|string|max:255',
            'descricao' => 'nullable|string',
        ]);

        $equipamentos->update($validatedData);
        return redirect()->route('equipamentos.index');
    }

    public function destroy(Equipamento $equipamentos)
    {
        if ($equipamentos->user_id !== Auth::id())
            abort(403, 'Acesso negado.');
        $equipamentos->delete();
        return redirect()->route('equipamentos.index');
    }
}
