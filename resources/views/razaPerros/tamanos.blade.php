
@extends('layouts.master')
@section('titulo','Lista de VideoJuegos')
@section('contenido')

<br>
<div class="row">
  <ul class="list-group">
      <li class="list-group-item d-flex justify-content-between align-items-center active">
    Lista de Cantidad de Razas de Perros por Tamaño
    </li>
    @foreach($tamanos as $tam)
      <li class="list-group-item d-flex justify-content-between align-items-center">
      {{$tam->nombre}}
        <span class="badge badge-primary badge-pill"> {{count($tam->razaperros )}}</span>
      </li>

  @endforeach
  </ul>
</div>
@endsection
