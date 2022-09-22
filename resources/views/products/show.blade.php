@extends("layout/layout")

@section("content")
    <div class="row">
        <div class="col-4">
            <div id="img-container" class="h-100 w-100 d-flex">
                <img class="product-image w-100 m-auto" src="{{$product->image}}">
            </div>
        </div>
        <div class="col-8">
            <div class="col-12">
                {{$product->title}}
            </div>
            <div class="col-12">
                {{$product->price}} $
            </div>
            <div class="col-12">
                <label>available: {{$product->available ? "yes" : "no"}}</label>
            </div>
            <div class="col-12">
                {{$product->description}}
            </div>

        </div>
    </div>
    <div class="row">
        <div class="col-8 ms-auto">
            <div class="row">
                <div class="col-6">
                    <button class="btn btn-warning w-100">Edit</button>
                </div>
                <div class="col-6">
                    <form id="deleteForm" method="POST" action="{{ route('products.destroy', $product->id) }}">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="btn btn-danger" value="Delete">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
