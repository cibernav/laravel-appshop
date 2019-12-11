
@extends('layouts.app')
@section('title', 'Listado de Productos')

@section('content')
<div class="col-md-12">
<h2 class="text-center">Imagenes de Productos seleccionado "{{ $p->name }}"</h2>
    <div class="row text-center">
        <br/>
        <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{ url('/admin/product/image/'. $p->id )}}">
            {{ csrf_field() }}
            <div class="form-group">
                <input type="file" class="form-control" name="photo" id="photo" value="Archivo" required />
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Subir Nueva Imagen</button>
                <a class="btn btn-default " href="{{ url('/admin/product/')}}">Volver Lista Productos</a>
            </div>
        </form>

        <hr>

        <div class="row">
            @foreach ($images as $im)
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                    <img src="{{ $im->url }}" width="250px" height="250px">
                    <form method="POST" action="{{ url('/admin/product/image/'.$im->id ) }}">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-danger">Eliminar Imagen</button>
                        @if ($im->featured)
                        <button type="button" title="Imagen destacada de este producto" class="btn btn-warning">
                            <i class="fa fa-heart"></i>
                        </button>
                        @else
                        <a href="{{ url('/admin/product/image/'. $p->id . '/select/' . $im->id) }}" class="btn btn-success">
                            <i class="fa fa-heart"></i>
                        </a>
                        @endif
                        
                    </form>
                    </div>
                </div>  
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection