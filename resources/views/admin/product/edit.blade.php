
@extends('layouts.app')
@section('title', 'Bienvenido a App Shop')

@section('content')
<div class="col-md-8">
    <h2 class="title">Editar Producto</h2>
    <br>
    @include('partials/errors')
    <form class="form-horizontal" method="POST" action="{{ url('/admin/product/edit/'. $p->id) }}">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Nombre</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="name" name="name" placeholder="Nombre" value="{{ old('name', $p->name)}}">
            </div>
        </div>
        <div class="form-group">
            <label for="description" class="col-sm-2 control-label">Descripcion</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="description" name='description' placeholder="Descripcion" value="{{ old('description', $p->description) }}" >
            </div>
        </div>
        <div class="form-group">
                <label for="long_description" class="col-sm-2 control-label">Descripcion Larga</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name='long_description' id='long_description'>{{ old('long_description', $p->long_description)}}</textarea>
                </div>
        </div>
        <div class="form-group">
            <label for="category_id" class="col-sm-2 control-label">Categoria</label>
            <div class="col-sm-10">
                <select class="form-control" name='category_id' id='category_id'>
                    <option value="">Seleccione</option>
                    @foreach ($categories as $c)
                    @if($c->id == old('category_id', $p->category_id))
                    <option selected value="{{ $c->id }}">{{ $c->name }}</option>
                    @endif
                    <option value="{{ $c->id }}">{{ $c->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
                <label for="price" class="col-sm-2 control-label">Precio</label>
                <div class="col-sm-10">
                <input type="number" class="form-control" id="price" name='price' placeholder="Precio" step="0.01" value="{{ old('price', $p->price)}}">
                </div>
        </div>
        
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ url('/admin/product')}}" class="btn btn-default">Cancelar</a>
            </div>
        </div>
    </form>
        
</div>

@endsection