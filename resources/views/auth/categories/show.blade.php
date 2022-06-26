@extends('auth.layouts.master')

@section('title', 'Categories ' . $category->name)

@section('content')
    <div class="col-md-12">
        <h1>Category</h1>
        <table class="table">
            <tbody>
            <tr>
                <th>
                    Field
                </th>
                <th>
                    Value
                </th>
            </tr>
            <tr>
                <td>ID</td>
                <td>{{ $category->id }}</td>
            </tr>
            <tr>
                <td>Code</td>
                <td>{{ $category->code }}</td>
            </tr>
            <tr>
                <td>Name</td>
                <td>{{ $category->name }}</td>
            </tr>
            <tr>
                <td>Description</td>
                <td>{{ $category->description }}</td>
            </tr>
            <tr>
                <td>Image</td>
                <td><img src="http://laravel-diplom-1.rdavydov.ru/storage/categories/appliance.jpg"
                         height="240px"></td>
            </tr>
            <tr>
                <td>Product count</td>
                <td>{{ $category->products->count() }}</td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
