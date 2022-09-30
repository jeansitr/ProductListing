<div class="card-container {{ $class ?? 'col-12' }}">
    <a class="h-100 product-card" href="{{ route('products.show', $product->id) }}">
        <div class="row img-container">
            <div class="col-12 d-flex">
                @include("shared._image", ["item" => $product])
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <span class="card-title">{{ $product->title }}</span>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <span class="card-detail">{{ $product->price }} $</span>
            </div>
        </div>
        @isset($showSeller)
            <div class="row">
                <div class="col-12">
                    <span class="card-detail">Selling by: <a
                            href="/sellers/{{$product->seller->id}}"> {{ $product->seller->name }} </a></span>
                </div>
            </div>
        @endisset
    </a>
</div>
