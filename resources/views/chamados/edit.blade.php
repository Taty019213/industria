@extends('layouts.app')
@section('title','Editar Setor')
@section('content')

<H1>Editar Setor</H1>
<form action="{{ route('setores.update',$setor->id) }}" method="post" class="container">

    @csrf
    @method('PUT')
    <div class="mb3">
        <label for="" class="form-label">Nome</label>
        <input type="text" name="nome" id="nome"class="form-control" value="{{ $setor->nome}}">
    </div>
    <button type="submit" class="btn btn-success">Salvar</button>

</form>

@endsection