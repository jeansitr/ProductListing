@yield("layout/layout")

@section("content")
    <form action="/product{{$product ? "/$product->id" : ""}}" method="{{ $product ? "post" : "put" }}">
        <div class="row">
            <div class="col-4">
                <label class="attribute">Title: </label>
            </div>
            <div class="col-8">
                <input class=type="text">
            </div>
        </div>
    </form>
@endsection
