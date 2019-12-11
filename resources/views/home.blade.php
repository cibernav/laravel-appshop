@extends('layouts.app')
@section('title', 'Bienvenido')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h3>Dashboard</h3>
                    <ul class="nav nav-tabs">
                        <li role="presentation" class="active"><a href="#">CARRITO DE COMPRAS</a></li>
                        <li role="presentation"><a href="#">PEDIDOS REALIZADOS</a></li>
                    </ul>
                    
                    <p style="margin-top: 5px">Tiene {{ $details->count() }} producto(s) en el carrito de compra</p>

                    <table class="table table-condensed table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Nombre</th>
                                <th>Categoria</th>
                                <th>Precio</th>
                                <th>Cantidad</th>
                                <th>SubTotal</th>
                                <th class="text-right">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($details as $d)
                            @php
                               $p = $d->product
                            @endphp
                            <tr>
                                <td><img src="{{ $p->FeaturedImageUrl }}" height="50px" /></td>
                                <td>{{$p->name}}</td>
                                <td>{{$p->categoryname}}</td>
                                <td>{{$p->price}}</td>
                                <td>{{$d->quantity}}</td>
                                <td>{{$d->quantity * $p->price}}</td>
                                <td class="text-right">
                                    <form method="POST" action="{{ url('/cart/delete/'.$d->id) }}">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <a href="" class="btn btn-info btn-xs">
                                            <i class="fa fa-info"></i>
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


                </div>
            </div>

            <div class="text-center">
            <form action="{{ url('/order') }}" method="POST">
                {{ csrf_field() }}
                    <button type="submit" class="btn btn-primary">Realizar Pedido</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
