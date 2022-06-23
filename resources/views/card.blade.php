<div class="col-sm-6 col-md-4">
    <div class="thumbnail">
        <img src="http://internet-shop.tmweb.ru/storage/products/iphone_x.jpg" alt="iPhone X 64GB">
        <div class="caption">
            <h3>{{$product->name}}</h3>
            <p> {{$product->price}}</p>
            <p>
            <form action="{{route('cartAdd', $product)}}" method="post">
                <button type="submit" class="btn btn-primary"
                   role="button">Add to cart</button>
                <a href="{{route('product', [$product->category, $product->code])}}" class="btn btn-default"
                   role="button">Details</a>
                @csrf
            </form>
            </p>
        </div>
    </div>
</div>
