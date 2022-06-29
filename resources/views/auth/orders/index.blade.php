@extends('auth.layouts.master')

@section('title', 'Orders')

@section('content')
    <div class="col-md-12">
        <h1>@lang('orders.orders')</h1>
        <table class="table">
            <tbody>
            <tr>
                <th>
                    #
                </th>
                <th>
                    @lang('orders.name')
                </th>
                <th>
                    @lang('orders.phone_number')
                </th>
                <th>
                    @lang('orders.order_date')
                </th>
                <th>
                    @lang('orders.total_price')
                </th>
                <th>
                    @lang('orders.action')
                </th>
            </tr>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id}}</td>
                    <td>{{ $order->name }}</td>
                    <td>{{ $order->phone }}</td>
                    <td>{{ $order->created_at->format('H:i d/m/Y') }}</td>
                    <td>{{ $order->getFullPrice() }} $</td>
                    <td>
                        <div class="btn-group" role="group">
                            <a class="btn btn-success" type="button"
                               @admin
                               href="{{route('order.show', $order)}}"
                            @else
                                href="{{route('person.orders.show', $order)}}"
                            @endadmin
                            >@lang('orders.open')</a>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
