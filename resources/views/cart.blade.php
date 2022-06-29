@extends ('layouts.master')

@section('title', 'Cart')

@section('content')


        <h1>@lang('main.basket')</h1>
        <p>@lang('main.finish_order')</p>
        <div class="panel">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>@lang('main.name')</th>
                    <th>@lang('main.quantity')</th>
                    <th>@lang('main.price')</th>
                    <th>@lang('main.total')</th>
                </tr>
                </thead>
                <tbody>
                @foreach($order->products as $product)
                    <tr>
                        <td>
                            <a href="{{route('product', [$product->category, $product->code])}}">
                                <img height="56px" src="{{Storage::url($product->image)}}">
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
                    <td colspan="3">@lang('main.total_price'):</td>
                    <td>{{$order->getFullPrice()}} $</td>
                </tr>
                </tbody>
            </table>
            <br>
            @Auth
            <div class="btn-group pull-right" role="group">
                <a type="button" class="btn btn-success" href="{{route('order')}}">@lang('main.complete_order')</a>
            </div>
        @endauth
    @guest
                <p><b>@lang('main.note')</b></p>
    @endguest
@endsection
