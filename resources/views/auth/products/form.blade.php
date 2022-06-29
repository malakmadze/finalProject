@extends('auth.layouts.master')

@isset($product)
    @section('title', 'Edit ' . $product->name)
@else
    @section('title', 'Create')
@endisset

@section('content')
    <div class="col-md-12">
        @isset($product)
            <h1>@lang('products.edit') <b>{{ $product->name }}</b></h1>
        @else
            <h1>@lang('products.add')</h1>
        @endisset
        <form method="POST" enctype="multipart/form-data"
              @isset($product)
              action="{{ route('products.update', $product) }}"
              @else
              action="{{ route('products.store') }}"
            @endisset
        >
            <div>
                @isset($product)
                    @method('PUT')
                @endisset
                @csrf
                <div class="input-group row">
                    <label for="code" class="col-sm-2 col-form-label">Code: </label>
                    <div class="col-sm-6">
                        @error('code')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                        <input type="text" class="form-control" name="code" id="code"
                               value="{{old('code', isset($product)? $product->code : null)}}">
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="name" class="col-sm-2 col-form-label">@lang('products.name'): </label>
                    <div class="col-sm-6">
                        @error('name')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                        <input type="text" class="form-control" name="name" id="name"
                               value="{{old('name', isset($product)? $product->name : null)}}">
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="category_id" class="col-sm-2 col-form-label">@lang('products.categories'): </label>
                    <div class="col-sm-6">
                        <select name="category_id" id="category_id" class="form-control" >
                            @foreach($categories as $category)
                                <option value="{{$category->id}}"
                                @isset($product)
                                    @if($product->category_id == $category->id)
                                        selected
                                    @endif
                                @endisset
                                >{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="description" class="col-sm-2 col-form-label">@lang('products.description'): </label>
                    <div class="col-sm-6">
                        @error('description')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
								<textarea name="description" id="description" cols="72"
                                          rows="7">{{old('description', isset($product)? $product->description : null)}}</textarea>
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="image" class="col-sm-2 col-form-label">@lang('products.image'): </label>
                    <div class="col-sm-10">
                        <label class="btn btn-default btn-file">
                            @lang('products.upload') <input type="file" style="display: none;" name="image" id="image">
                        </label>
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="price" class="col-sm-2 col-form-label">@lang('products.price'): </label>
                    <div class="col-sm-2">
                        @error('price')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                        <input type="text" class="form-control" name="price" id="price"
                               value="{{old('price', isset($product)? $product->price : null)}}">
                    </div>
                </div>
                <button class="btn btn-success">@lang('products.save')</button>
            </div>
        </form>
    </div>
@endsection
