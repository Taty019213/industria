<?php

namespace App\Http\Controllers;

use App\Models\Equipamento;
use App\Models\Setor;
use Illuminate\Http\Request;

class EquipamentoController extends Controller
{
    public function index()
    {
        $equipamentos = Equipamento::all();
        return view('equipamentos.index', compact('equipamentos'));
    }

    public function create()
    {
        $setores = Setor::all();
        return view('equipamentos.create', compact('setores'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|max:150',
            'patrimonio' => 'required|max:30|unique:equipamentos,patrimonio',
            'setor_id' => 'required|exists:setores,id',
            'status' => 'required|max:20',
        ]);

        Equipamento::create($request->all());

        return redirect()
            ->route('equipamentos.index')
            ->with('success', 'Equipamento cadastrado com sucesso!');
    }

    public function edit($id)
    {
        $equipamento = Equipamento::findOrFail($id);
        $setores = Setor::all();

        return view('equipamentos.edit', compact('equipamento', 'setores'));
    }

    public function update(Request $request, $id)
    {
        $equipamento = Equipamento::findOrFail($id);

        $request->validate([
            'nome' => 'required|max:150',
            'patrimonio' => 'required|max:30|unique:equipamentos,patrimonio,' . $id,
            'setor_id' => 'required|exists:setores,id',
            'status' => 'required|max:20',
        ]);

        $equipamento->update($request->all());

        return redirect()
            ->route('equipamentos.index')
            ->with('success', 'Equipamento atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $equipamento = Equipamento::findOrFail($id);
        $equipamento->delete();

        return redirect()
            ->route('equipamentos.index')
            ->with('success', 'Equipamento excluído com sucesso!');
    }
}
