<!-- Comentario HTML -->
{{-- Comentario de Blade--}}
@extends('layouts.master')
@section('titulo','Lista de VideoJuegos')
@section('contenido')

<div class="row">
<div class="col-lg-12">
<h2>Lista de Raza de Perros</h2>
</div>
</div>
<div class="row">
  @foreach ($razaPerros as $rp)
  <div class="col">
    <div class="card" style="width: 18rem;">
      <div class="card-body">
        <h5 class="card-title">{{$rp->nombre}}</h5>
        <p class="card-text">
        {{$rp->descripcion}}</p>
        <a href="{{route('rp.detalle',['id'=>$rp->id])}}" class="btn btn-secondary">Ver</a>
      </div>
    </div>
  </div>
  @endforeach
</div>
@endsection
