<div class="col-sm-6 col-md-4">
    <div class="thumbnail">
        <img src="{{Storage::url($product->image)}}" alt="iPhone X 64GB">
        <div class="caption">
            <h3>{{$product->name}}</h3>
            <p> {{$product->price}}</p>
            <p> {{$product->description}}</p>
            <p>
            <form action="{{route('cartAdd', $product)}}" method="post">
                <button type="submit" class="btn btn-primary"
                        role="button">Add to cart</button>
                <a href="{{route('product', [$product->category, $product->code])}}" class="btn btn-default"
                   role="button">Details</a>
                @csrf
            </form>
        </div>
    </div>
</div>
