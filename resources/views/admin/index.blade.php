@extends('layouts.admin')

@section('contenido')

@if(Session::has('info'))
        <div class="row">
            <div class="col-md-12">
                <p class="alert alert-info">{{Session::get('info')}}</p>
            </div>
        </div>
@endif
<div class="row">
        <div class="col-md-12">
            <a href="{{ route('admin.create') }}" class="btn btn-info">Nuevo</a>
        </div>
</div>
<br>
<table class="table table-hover">
  <thead>
    <tr class="table-info">
      <th scope="col">Nombre</th>
      <th scope="col">Editar</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($razaPerros as $rp)
    <tr>
      <th scope="row">{{$rp->nombre}}</th>
      <td><a href="{{route('admin.edit',['id'=>$rp->id])}}">Editar</a></td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection
