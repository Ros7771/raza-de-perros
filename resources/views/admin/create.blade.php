@extends('layouts.admin')

@section('contenido')
@include('partials.errors')

    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('admin.create') }}" method="post">
              <br/><br/>
              <div class="form-group">
                  <label for="nombre">Nombre</label>
                  <input
                  type="text"
                  class="form-control"
                  id="nombre"
                  name="nombre">
              </div>
              <div class="form-group">
                  <label for="content">Descripción</label>
                  <textarea
                  class="form-control"
                  id="descripcion"
                  name="descripcion"></textarea>
              </div>

              <div class="form-group">
                  <label for="tamano">Tamaño</label>
                  <select id="tamano" name="tamano" class="form-control">
                    {{-- ciclo para crear select --}}
                    @foreach ($tamano as $tam)
                    <option value="{{$tam->id}}">{{$tam->nombre}}</option>
                    @endforeach
                  </select>
              </div>

              <div class="form-group">
              @foreach($temperamento as $temp)
                  <div class="form-check">
                         <input
                         "form-check-input"
                         type="checkbox"
                         name="temperamentos[]"
                         value="{{ $temp->id }}"
                        />
                       <label class="form-check-label">{{ $temp->nombre }}</label>
                 </div>
             @endforeach
             </div>

              <div class="form-group">
                  <label for="alturaInicial">Altura Mínima</label>
                  <input
                  type="number"
                  class="form-control"
                  id="alturaInicial"
                  name="alturaInicial">
              </div>
              <div class="form-group">
                  <label for="alturaFinal">Altura Máxima</label>
                  <input
                  type="number"
                  class="form-control"
                  id="alturaFinal"
                  name="alturaFinal">
              </div>

              @csrf

                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </div>
    </div>
@endsection
