
@extends('layouts.master')
@section('titulo','Lista de VideoJuegos')
@section('contenido')
<div class="row">
<div class="col-lg-12">
<h2>Lista de Temperamentos de Razas de Perros</h2>
</div>
</div>
<br>
<div class="row">
  <div class="col-4">
    <div class="list-group" id="list-tab" role="tablist">
       <a class="list-group-item list-group-item-action active"  data-toggle="list" href="{{route('rp.temperamentos')}}" role="tab">Temperamentos</a>
      @foreach ($temperamentos as $temp)

       <a class="list-group-item list-group-item-action "
       href="{{route('rp.temperamentos',['id'=>$temp->id])}}">
       {{$temp->nombre}}</a>

      @endforeach
    </div>
  </div>
  <div class="col-8">
    @isset($tempRz->razaperros)
      @foreach ($tempRz->razaperros as $razaPerro)

            <li><span style="font-weight:bold; font-size:25px">{{$razaPerro->nombre}}</span></li>

      @endforeach
    @endisset
  
  </div>
</div>
<div class="row">
  <ul>

  </ul>
</div>
@endsection
