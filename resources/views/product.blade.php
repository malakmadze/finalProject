@extends ('layouts.master')

@section('title', 'Product')

@section('content')


    <h1></h1>
        <h2></h2>
        <p>Price:</p>

        <img src="http://internet-shop.tmweb.ru/storage/products/iphone_x.jpg">
        <p>Good Mobile Phone</p>

        <form action="http://internet-shop.tmweb.ru/basket/add/1" method="POST">
        <a class="btn btn-success" href="{{ route('cartAdd', $product) }}">Add to Cart</a>

    <input type="hidden" name="_token" value="RduoLrFYyD9oGxYpOrqpV8rvcxmtiV8czDqlbyvS">        </form>

@endsection

{{--<h1>{{ $product->name }}</h1>--}}
{{--<h2>{{ $product->category->name }}</h2>--}}
{{--<p>Цена: <b>{{ $product->price }} руб.</b></p>--}}
{{--<img src="{{ Storage::url($product->image) }}">--}}
{{--<p>{{ $product->description }}</p>--}}
{{--@if($product->isAvailable())--}}
{{--    <a class="btn btn-success" href="{{ route('basket-add', $product) }}">Добавить в корзину</a>--}}
{{--@else--}}
{{--    Не доступен--}}
{{--@endif--}}
{{--@endsection--}}
