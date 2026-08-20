<?php

namespace App\Http\Controllers;

use App\Models\Equipamento;
use Illuminate\Http\Request;

class EquipamentoController extends Controller
{
    /**
     * Exibir uma listagem dos equipamentos.
     */
    public function index()
    {
        $equipamentos = Equipamento::all();
        
        // Se for uma API, retorne JSON. Se for usar views (Blade), use: return view('equipamentos.index', compact('equipamentos'));
        return response()->json($equipamentos);
    }

    /**
     * Mostrar o formulário para criar um novo recurso (Usado apenas se tiver telas em Blade).
     */
    public function create()
    {
        // return view('equipamentos.create');
    }

    /**
     * Salvar um novo equipamento no banco de dados.
     */
    public function store(Request $request)
    {
        // Validação dos dados com base na sua tabela do DBeaver
        $request->validate([
            'nome' => 'required|string|max:150',
            'patrimonio' => 'required|string|max:30|unique:equipamentos,patrimonio',
            'setor_id' => 'nullable|integer|exists:setores,id', // Garante que o setor existe se for enviado
            'status' => 'nullable|string|max:20',
        ]);

        // Cria o equipamento (o status assume 'ativo' por padrão se vier vazio)
        $equipamento = Equipamento::create([
            'nome' => $request->nome,
            'patrimonio' => $request->patrimonio,
            'setor_id' => $request->setor_id,
            'status' => $request->status ?? 'ativo',
        ]);

        return response()->json([
            'mensagem' => 'Equipamento cadastrado com sucesso!',
            'dados' => $equipamento
        ], 201);
    }

    /**
     * Exibir um equipamento específico por ID.
     */
    public function show(string $id)
    {
        $equipamento = Equipamento::findOrFail($id);
        return response()->json($equipamento);
    }

    /**
     * Mostrar o formulário para editar (Usado apenas se tiver telas em Blade).
     */
    public function edit(string $id)
    {
        // $equipamento = Equipamento::findOrFail($id);
        // return view('equipamentos.edit', compact('equipamento'));
    }

    /**
     * Atualizar o equipamento específico no banco de dados.
     */
    public function update(Request $request, string $id)
    {
        $equipamento = Equipamento::findOrFail($id);

        // Validação (ignora o patrimônio do próprio equipamento atual na regra de ser único)
        $request->validate([
            'nome' => 'required|string|max:150',
            'patrimonio' => 'required|string|max:30|unique:equipamentos,patrimonio,' . $id,
            'setor_id' => 'nullable|integer|exists:setores,id',
            'status' => 'required|string|max:20',
        ]);

        $equipamento->update($request->all());

        return response()->json([
            'mensagem' => 'Equipamento atualizado com sucesso!',
            'dados' => $equipamento
        ]);
    }

    /**
     * Remover o equipamento do banco de dados.
     */
    public function destroy(string $id)
    {
        $equipamento = Equipamento::findOrFail($id);
        $equipamento->delete();

        return response()->json([
            'mensagem' => 'Equipamento excluído com sucesso!'
        ]);
    }
}
