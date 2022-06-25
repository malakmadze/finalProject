@extends ('layouts.master')

@section('title', 'Checkout')

@section('content')

        <h1>Order:</h1>
        <div class="container">
            <div class="row justify-content-center">
                <p>Total price: <b>{{$order->getFullPrice()}}.</b></p>
                <form action="{{route('order-confirm')}}" method="POST">
                    <div>
                        <p>Please fill your name and phone number:</p>
                        <div class="container">
                            <div class="form-group">
                                <label for="name" class="control-label col-lg-offset-3 col-lg-2">Name: </label>
                                <div class="col-lg-4">
                                    <input type="text" name="name" id="name" value="" class="form-control">
                                </div>
                            </div>
                            <br>
                            <br>
                            <div class="form-group">
                                <label for="phone" class="control-label col-lg-offset-3 col-lg-2">Phone number: </label>
                                <div class="col-lg-4">
                                    <input type="text" name="phone" id="phone" value="" class="form-control">
                                </div>
                            </div>
                        </div>
                        <br>
                        <input type="hidden" name="_token" value="Jg1lxTbzCTsRxI4INggdkmX5L8Pwh7igip1JnNNd">
                        <br>
                        @csrf
                        <input type="submit" class="btn btn-success" value="order">
                    </div>
                </form>
            </div>
        </div>

@endsection
