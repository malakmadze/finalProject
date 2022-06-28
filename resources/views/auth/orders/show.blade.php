@extends('auth.layouts.master')

@section('title', 'Order ' . $order->id)

@section('content')
    <div class="py-4">
        <div class="container">
            <div class="justify-content-center">
                <div class="panel">
                    <h1>Order №{{ $order->id }}</h1>
                    <p>Customer: <b>{{ $order->name }}</b></p>
                    <p>Phone Number: <b>{{ $order->phone }}</b></p>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total Price</th>
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
                            <td colspan="3">Total Price:</td>
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
