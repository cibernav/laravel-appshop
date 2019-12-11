
@extends('layouts.app')
@section('title', 'Bienvenido a App Shop')

@section('content')
<div class="row">
    <div class="col-md-12">
        @include('partials/errors')
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="row text-center">
            <img src="{{$p->FeaturedImageUrl}}"  alt="Circle Image" class="img-rounded img-circle" height="200px"/>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <h3>{{$p->name}}</h3>
                <h5>{{ $p->category->name }}</h5>
                <h6>$. {{ $p->price }}</h6>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3 text-center">
                <p>{{ $p->long_description }}</p>
                </div>
        </div>

        <div class="row text-center">
            <a href="{{ url('/') }}" title="Añadir al corrito de compras" class="btn btn-warning">
                    <i class="fa fa-bookmark"></i> Ver productos disponibles
            </a>
            <button type="button" title="Añadir al corrito de compras" class="btn btn-primary" data-toggle="modal" data-target="#modalAddToCart">
                <i class="fa fa-bookmark"></i> Añadir al corrito de compras
            </button>
        </div>


<hr>
        <div clas="row">
            <div class="col-md-6">
                @foreach ($imagesLeft as $image)
                <img src="{{ $image->url }}" class="img-rounded" style="height: 200px; width: 180px" />
                @endforeach
            </div>
            <div class="col-md-6">
                @foreach ($imagesRight as $image)
                <img src="{{ $image->url }}" class="img-rounded"  style="height: 200px; width: 180px" />
                @endforeach
            </div>
        </div>
        
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="modalAddToCart" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Seleccione la cantidad que desea agregar</h4>
            </div>
        <form method="POST" action="{{ url('/cart') }}">
                <div class="modal-body">
                    {{ csrf_field() }}
                    <input type="hidden" value="{{ $p->id }}" name="product_id" />
                    <input type="number" name="quantity" value="1" class="form-control" />
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Añadir al carrito</button>
                </div>
            </form>
            
        </div>
    </div>
</div>

@endsection