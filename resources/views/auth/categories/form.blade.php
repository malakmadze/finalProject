@extends('auth.layouts.master')

@isset($category)
    @section('title', 'Edit Category ' . $category->name)
@else
    @section('title', 'Create Category')
@endisset

@section('content')
    <div class="col-md-12">
        @isset($category)
            <h1>@lang('categories.edit_category')<b>{{ $category->name }}</b></h1>
        @else
            <h1>@lang('categories.add_category')</h1>
        @endisset

        <form method="POST" enctype="multipart/form-data"
              @isset($category)
              action="{{ route('categories.update', $category) }}"
              @else
              action="{{ route('categories.store') }}"
            @endisset
        >
            <div>
                @isset($category)
                    @method('PUT')
                @endisset
                @csrf
                <div class="input-group row">
                    <label for="code" class="col-sm-2 col-form-label">@lang('categories.code'): </label>
                    <div class="col-sm-6">
                        @error('code')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                        <input type="text" class="form-control" name="code" id="code"
                               value="{{old('code', isset($category)? $category->code : null)}}">
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="name" class="col-sm-2 col-form-label">@lang('categories.name'): </label>
                    <div class="col-sm-6">
                        @error('name')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                        <input type="text" class="form-control" name="name" id="name"
                               value="{{old('name', isset($category)? $category->name : null)}}">
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="description" class="col-sm-2 col-form-label">@lang('categories.description'): </label>
                    <div class="col-sm-6">
                        @error('description')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
							<textarea name="description" id="description" cols="72"
                                      rows="7">{{old('description', isset($category)? $category->description : null)}}</textarea>
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="image" class="col-sm-2 col-form-label">@lang('categories.photo'): </label>
                    <div class="col-sm-10">
                        <label class="btn btn-default btn-file">
                            @lang('categories.upload') <input type="file" style="display: none;" name="image" id="image">
                        </label>
                    </div>
                </div>
                <button class="btn btn-success">@lang('categories.save')</button>
            </div>
        </form>
    </div>
@endsection
