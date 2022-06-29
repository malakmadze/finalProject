@extends ('layouts.master')

@section('title', 'All Categories')

@section('content')

        @foreach($categories as $category)
            <div class="panel">
                <a href="{{route('category',$category->code)}}">
                    <img src="{{Storage::url($category->image)}}">
                    <h1>{{$category->name}}</h1>
                </a>
                <p>
                    {{$category->description}}
                </p>
            </div>
        @endforeach

@endsection
