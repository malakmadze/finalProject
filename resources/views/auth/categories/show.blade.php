@extends('auth.layouts.master')

@section('title', 'Categories ' . $category->name)

@section('content')
    <div class="col-md-12">
        <h1>Category</h1>
        <table class="table">
            <tbody>
            <tr>
                <th>
                    @lang('categories.field')
                </th>
                <th>
                    @lang('categories.value')
                </th>
            </tr>
            <tr>
                <td>ID</td>
                <td>{{ $category->id }}</td>
            </tr>
            <tr>
                <td>@lang('categories.code')</td>
                <td>{{ $category->code }}</td>
            </tr>
            <tr>
                <td>@lang('categories.name')</td>
                <td>{{ $category->name }}</td>
            </tr>
            <tr>
                <td>@lang('categories.description')</td>
                <td>{{ $category->description }}</td>
            </tr>
            <tr>
                <td>@lang('categories.photo')</td>
                <td><img src="{{Storage::url($category->image)}}"
                         height="240px"></td>
            </tr>
            <tr>
                <td>@lang('categories.product_count')</td>
                <td>{{ $category->products->count() }}</td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
