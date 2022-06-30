@extends('auth.layouts.master')

@section('title', 'Категории')

@section('content')
    <div class="col-md-12">
        <h1>@lang('categories.categories')</h1>
        <table class="table">
            <tbody>
            <tr>
                <th>
                    #
                </th>
                <th>
                    @lang('categories.code')
                </th>
                <th>
                    @lang('categories.name')
                </th>
                <th>
                    @lang('categories.action')
                </th>
            </tr>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->code }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <form action="{{ route('categories.destroy', $category) }}" method="POST">
                                <a class="btn btn-success" type="button" href="{{ route('categories.show', $category) }}">@lang('categories.open')</a>
                                <a class="btn btn-warning" type="button" href="{{ route('categories.edit', $category) }}">@lang('categories.edit')</a>
                                @csrf
                                @method('DELETE')
                                <input class="btn btn-danger" type="submit" value="Delete"></form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a class="btn btn-success" type="button"
           href="{{ route('categories.create') }}">@lang('categories.add_category')</a>
    </div>
@endsection
