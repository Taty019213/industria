@extends('layouts.app')
@section('title','Visualizar Setor<')
@section('content')

<H1>Visualizar Setor</H1>

    <p> Id {{ $setor->id}}</p>
    <p> Nome {{ $setor->nome}}</p>

@endsection