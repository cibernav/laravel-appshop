
@extends('layouts.app')
@section('title', 'Bienvenido a App Shop')

@section('content')
<div class="col-md-8">
    <h2 class="title">Nueva Categoria</h2>
    <br>
    @include('partials/errors')
    
    <form class="form-horizontal" method="POST" action="{{ url('/admin/category') }}">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Nombre</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="name" name="name" placeholder="Nombre" value="{{ old('name') }}">
            </div>
        </div>
        <div class="form-group">
            <label for="description" class="col-sm-2 control-label">Descripcion</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="description" name='description' placeholder="Descripcion" value="{{ old('description') }}">
            </div>
        </div>
        
        
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ url('/admin/category')}}" class="btn btn-default">Cancelar</a>
            </div>
        </div>
    </form>
        
</div>

@endsection