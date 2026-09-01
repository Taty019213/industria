@extends('layouts.app')
@section('title', 'Lista de Equipamentos')
@section('content')

<h1>Lista de equipamentos para {{ Auth::user()->name }}</h1>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<a class="btn btn-primary" href="{{ route('equipamentos.create') }}" role="button">Novo</a>

<table class="table">
    <thead class="table-info">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Patrimônio</th>
            <th>Setor</th>
            <th>Status</th>
            <th>Opções</th>
        </tr>
    </thead>
    <tbody>
        @foreach($equipamentos as $equipamento)
        <tr class="table-info">
            <td>{{ $equipamento->id }}</td>
            <td>{{ $equipamento->nome }}</td>
            <td>{{ $equipamento->patrimonio }}</td>
            <td>{{ $equipamento->setor_id }}</td>
            <td>
                {{ $equipamento->status == 'ativo' ? 'Ativado' : 'Desativado' }}
            </td>
            <td>
              
                <a class="btn btn-primary" href="{{ route('equipamentos.edit', $equipamento->id) }}" role="button">Editar</a>
             
                <form action="{{ route('equipamentos.destroy', $equipamento->id) }}" method="post" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                </form>
            </td>
        </tr>    
        @endforeach  
    </tbody>
</table>

@endsection

