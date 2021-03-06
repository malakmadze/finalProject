@extends('auth.layouts.master')

@section('title', 'Products')

@section('content')
    <div class="col-md-12">
        <h1>Products</h1>
        <table class="table">
            <tbody>
            <tr>
                <th>
                    #
                </th>
                <th>
                    @lang('products.code')
                </th>
                <th>
                    @lang('products.name')
                </th>
                <th>
                    @lang('products.category')
                </th>
                <th>
                    @lang('products.price')
                </th>
                <th>
                    @lang('products.action')
                </th>
            </tr>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->id}}</td>
                    <td>{{ $product->code }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <form action="{{ route('products.destroy', $product) }}" method="POST">
                                <a class="btn btn-success" type="button"
                                   href="{{ route('products.show', $product) }}">@lang('products.open')</a>
                                <a class="btn btn-warning" type="button"
                                   href="{{ route('products.edit', $product) }}">@lang('products.edit')</a>
                                @csrf
                                @method('DELETE')
                                <input class="btn btn-danger" type="submit" value="Delete"></form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a class="btn btn-success" type="button" href="{{ route('products.create') }}">@lang('products.add_product')</a>
    </div>
@endsection
