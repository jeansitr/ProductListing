<div class="card-container {{ $class }}">
    <a class="h-100 product-card" href="{{ route('products.show', $product->id) }}">
        <div class="row img-container">
            <div class="col-12 d-flex">
                @include("products._image")
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <span class="card-title">{{ $product->title }}</span>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <span class="card-price">{{ $product->price }} $</span>
            </div>
        </div>
    </a>
</div>
