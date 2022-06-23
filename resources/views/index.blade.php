@extends ('master')

@section('title', 'Main Page')

@section('content')


    <div class="starter-template">
        <h1>All Products</h1>
        <div class="row">
        @foreach($products as $product)
            @include('card', compact('product'))
            @endforeach
        </div>
    </div>
@endsection
