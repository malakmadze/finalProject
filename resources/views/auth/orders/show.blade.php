@extends('auth.layouts.master')

@section('title', 'Order ' . $order->id)

@section('content')
    <div class="py-4">
        <div class="container">
            <div class="justify-content-center">
                <div class="panel">
                    <h1>@lang('orders.order') №{{ $order->id }}</h1>
                    <p>@lang('orders.customer'): <b>{{ $order->name }}</b></p>
                    <p>@lang('orders.phone_number'): <b>{{ $order->phone }}</b></p>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>@lang('orders.name')</th>
                            <th>@lang('orders.quantity')</th>
                            <th>@lang('orders.price')</th>
                            <th>@lang('orders.total_price')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($order->products as $product)
                            <tr>
                                <td>
                                    <p href="{{ route('product', $product->code) }}">
                                        <img height="56px"
                                             src="{{ Storage::url($product->image) }}">
                                        {{ $product->name }}
                                    </p>
                                </td>
                                <td><span class="badge">{{$product->pivot->count}}</span></td>
                                <td>{{ $product->price }} $.</td>
                                <td>{{ $product->getPriceForCount()}} $.</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="3">@lang('orders.total_price'):</td>
                            <td>{{ $order->getFullPrice() }} $.</td>
                        </tr>
                        </tbody>
                    </table>
                    <br>
                </div>
            </div>
        </div>
    </div>
@endsection
