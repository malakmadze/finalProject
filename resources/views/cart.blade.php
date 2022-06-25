@extends ('layouts.master')

@section('title', 'Cart')

@section('content')


        <h1>Cart</h1>
        <p>Finish order</p>
        <div class="panel">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                </tr>
                </thead>
                <tbody>
                @foreach($order->products as $product)
                    <tr>
                        <td>
                            <a href="{{route('product', [$product->category, $product->code])}}">
                                <img height="56px" src="http://internet-shop.tmweb.ru/storage/products/iphone_x.jpg">
                                {{$product->name}}
                            </a>
                        </td>
                        <td><span class="badge">{{$product->pivot->count}}</span>
                            <div class="btn-group form-inline">
                                <form action="{{route('cartRemove', $product)}}" method="post">
                                    <button type="submit" class="btn btn-danger">
                                        <span class="glyphicon glyphicon-minus" aria-hidden="true"><</span>
                                    </button>
                                    @csrf
                                </form>
                                <form action="{{route('cartAdd', $product)}}" method="post">
                                    <button type="submit" class="btn btn-success">
                                        <span class="glyphicon glyphicon-plus" aria-hidden="true"><</span>
                                    </button>
                                    @csrf
                                </form>
                            </div>
                        </td>
                        <td>{{$product->price}} $</td>
                        <td>{{$product->getPriceForCount()}} $</td>
                    </tr>
                @endforeach

                <tr>
                    <td colspan="3">Total Price:</td>
                    <td>{{$order->getFullPrice()}} $</td>
                </tr>
                </tbody>
            </table>
            <br>
            <div class="btn-group pull-right" role="group">
                <a type="button" class="btn btn-success" href="{{route('order')}}">Complete
                    Order</a>
            </div>
@endsection
