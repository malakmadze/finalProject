@extends ('layouts.master')

@section('title', 'Checkout')

@section('content')

        <h1>@lang('main.order'):</h1>
        <div class="container">
            <div class="row justify-content-center">
                <p>@lang('main.total_price'): <b>{{$order->getFullPrice()}}.</b></p>
                <form action="{{route('order-confirm')}}" method="POST">
                    <div>
                        <p>@lang('main.please_fill'):</p>
                        <div class="container">
                            <div class="form-group">
                                <label for="name" class="control-label col-lg-offset-3 col-lg-2">@lang('main.name'): </label>
                                <div class="col-lg-4">
                                    <input type="text" name="name" id="name" value="" class="form-control">
                                </div>
                            </div>
                            <br>
                            <br>
                            <div class="form-group">
                                <label for="phone" class="control-label col-lg-offset-3 col-lg-2">@lang('main.phone_number'): </label>
                                <div class="col-lg-4">
                                    <input type="text" name="phone" id="phone" value="" class="form-control">
                                </div>
                            </div>
                        </div>
                        <br>
                        @csrf
                        <input type="submit" class="btn btn-success" value="@lang('main.order')">
                    </div>
                </form>
            </div>
        </div>

@endsection
