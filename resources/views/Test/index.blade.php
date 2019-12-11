
@extends('layouts.app')
@section('title', 'Bienvenido a App Shop')

@section('content')
<div class="row">
    <div class="col-md-12">
            <h2>Productos disponibles</h2>
            @foreach ($products as $product)
                <div class="col-md-4">
                    <div class="panel panel-default" style="height: 320px">
                        <div class="panel-body">
                            <div class="text-center">
                                <img src="{{$product->FeaturedImageUrl}}" alt="..." class="img-circle" height="160px" width="160px" >
                                
                            </div>
                            <div class="text-center">
                            <a href="{{ url('/product/'. $product->id) }}"><strong>{{ $product->name }}</strong></a>
                                <p>{{ $product->categoryname }}</p>
                                <p>{{ $product->description }}</p>
                            </div>
                        </div>
                    </div>
                    
                </div>
            @endforeach
            
    </div>
</div>
<div class="row text-center">
    {{$products->links()}}
</div>


@endsection