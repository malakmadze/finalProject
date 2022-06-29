@extends ('layouts.master')

@section('title', 'Main Page')

@section('content')


        <h1>@lang('main.all_products')</h1>
        <div class="row">
        @foreach($products as $product)
            @include('layouts.card', compact('product'))
            @endforeach
        </div>

@endsection
