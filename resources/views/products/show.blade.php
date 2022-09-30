@extends("layout/layout")

@section("content")
    @include("shared._profile", ["item" => $product])
    <div class="row">
        <div class="col-8 ms-auto">
            <div class="row">
                <div class="col-6">
                    <a href="{{ route("products.edit", $product->id) }}" class="btn btn-warning w-100">Edit</a>
                </div>
                <div class="col-6">
                    <form id="deleteForm" method="POST" action="{{ route('products.destroy', $product->id) }}">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="btn btn-danger w-100" value="Delete">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
