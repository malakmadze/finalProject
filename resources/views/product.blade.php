@extends ('layouts.master')

@section('title', 'Product')

@section('content')

        <h1>{{$product->name}}</h1>
        <p><b>Price:</b>{{$product->price}} $</p>
        <img src="{{Storage::url($product->image)}}">
        <p><b>Description:</b> {{$product->description}}</p>
{{--<form action="{{route('cartAdd', $product)}}" method="post">--}}
{{--    <button type="submit" class="btn btn-primary"--}}
{{--            role="button">Add to cart</button>--}}
        <a href="{{route('index')}}" class="btn btn-primary"
           role="button">back</a>
@endsection

