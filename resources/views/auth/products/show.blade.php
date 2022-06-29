@extends('auth.layouts.master')

@section('title', 'Product ' . $product->name)

@section('content')
    <div class="col-md-12">
        <h1>{{ $product->name }}</h1>
        <table class="table">
            <tbody>
            <tr>
                <th>
                    @lang('orders.field')
                </th>
                <th>
                    @lang('orders.value')
                </th>
            </tr>
            <tr>
                <td>ID</td>
                <td>{{ $product->id}}</td>
            </tr>
            <tr>
                <td>@lang('orders.code')</td>
                <td>{{ $product->code }}</td>
            </tr>
            <tr>
                <td>@lang('orders.name')</td>
                <td>{{ $product->name }}</td>
            </tr>
            <tr>
                <td>@lang('orders.description')</td>
                <td>{{ $product->description }}</td>
            </tr>
            <tr>
                <td>@lang('orders.image')</td>
                <td><img src="{{Storage::url($product->image)}}" height="240px"></td>
            </tr>
            <tr>
                <td>@lang('orders.category')</td>
                <td>{{ $product->category->name }}</td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
