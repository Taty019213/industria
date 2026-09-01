@extends('layouts.app')
@section('title', 'Lista de Chamados')
@section('content')
<h1>Lista de Chamados para {{ Auth::user()->name }}</h1>
<a class="btn btn-primary" href="{{ route('chamados.create') }}" role="button">Novo Chamado</a>
<table class="table">
    <thead class="table-info">
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Status</th>
            <th>Opções</th>
        </tr>
    </thead>
    <tbody>
        @foreach($chamados as $chamado)
        <tr class="table-info">
            <td>{{ $chamado->id }}</td>
            <td>{{ $chamado->titulo }}</td>
            <td>
                <span class="badge {{ $chamado->status === 'aberto' ? 'bg-warning text-dark' : 'bg-success' }}">
                    {{ ucfirst($chamado->status) }}
                </span>
            </td>
            <td>
                <div class="d-flex gap-1">
                    <a class="btn btn-primary btn-sm" href="{{ route('chamados.show', $chamado->id) }}" role="button">Visualizar</a>
                    <a class="btn btn-secondary btn-sm" href="{{ route('chamados.edit', $chamado->id) }}" role="button">Editar</a>
                    <form action="{{ route('chamados.destroy', $chamado->id) }}" method="post" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Excluir</button>
                    </form>
                </div>
            </td>
        </tr>    
        @endforeach  
    </tbody>
</table>
@endsection

 
 
