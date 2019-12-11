
@extends('layouts.app')
@section('title', 'Listado de Categoria')

@section('content')
<div class="col-md-12">
    <h2 class="text-center">Listados de Categoria</h2>
    <div class="row">
    <a class="btn btn-primary" href="{{ url('/admin/category/create')}}">Nuevo</a>
    <br/>
    <br/>
            <table class="table table-condensed table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th class="col-md-2 text-center">Nombre</th>
                        <th class="col-md-4 text-center">Descripcion</th>
                        <th class="text-right">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $key => $c)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$c->name}}</td>
                        <td>{{$c->description}}</td>
                        <td class="text-right">
                            <form method="POST" action="{{ url('/admin/category/delete/'.$c->id) }}">
                                {{ csrf_field() }}
                                <a href="" class="btn btn-info btn-xs">
                                    <i class="fa fa-info"></i>
                                </a>
                                <a type="button" class="btn btn-success btn-xs" title="Editar" href="{{ url('/admin/category/edit/'.$c->id) }}">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <button type="submit" class="btn btn-danger btn-xs" title='Eliminar'>
                                    <i class="fa fa-times"></i>
                                </button>
                            </form>
                        </td>
                    </tr>  
                    @endforeach
                    
                </tbody>    
            </table>    
            {{ $categories->links() }} 
    </div>
</div>

@endsection