@extends('layouts.master')
@section('titulo', 'Informacion Raza Perros')
@section('contenido')
  <blockquote class="blockquote">
      <h1 class="display-3">{{$rp->nombre}}</h1>
      <p class="lead">{{$rp->descripcion}}</p>

        <p class="lead">
          <b>Tamaño: </b> {{$rp->tamanos->nombre}}
        </p>
       <p class="lead">
          <b>Altura: </b> {{$rp->alturaInicial}}cm - {{$rp->alturaFinal}}cm
        </p>
        <p class="lead">
           <b>Temperamentos:</b>

        <ul class="list-group list-group-flush">
          @foreach ($rp->temperamentos as $temp)
              <li class="list-group-item">
                {{$temp->nombre}}
              </li>
          @endforeach
        </ul>
      </p>
  </blockquote>
@endsection
