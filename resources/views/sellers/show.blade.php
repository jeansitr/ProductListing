@extends("layout/layout")

@section("content")

    @include("shared._profile", ["item" => $seller])
    <br>
    <h2>Selling: </h2>
    <div class="row">
        @forelse($seller->products as $product)
            @include("products._card", ["class" => "col-" . (12/3), "product" => $product])
        @empty
            <h3>This seller currently has no products to sell!</h3>
        @endforelse
    </div>
@endsection
