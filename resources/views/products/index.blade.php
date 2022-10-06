@extends("layouts.layout")
<?php
$PRODUCTPERROW = 4;
?>

@section("content")
    @forelse($products as $product)
        @if(($loop->index % $PRODUCTPERROW) == 0)
            <div class="row">
                @endif

                @include("products._card", ["class" => "col-" . (12/$PRODUCTPERROW), "product" => $product, "showSeller" => true])

                @if(!$loop->first && ($loop->index + 1) % $PRODUCTPERROW == 0)
            </div>
        @endif
    @empty
        <h1>No products found</h1>
    @endforelse

    <a href="/products/create" class="btn btn-success my-3">Add product</a>
@endsection
