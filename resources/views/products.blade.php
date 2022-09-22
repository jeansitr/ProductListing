@extends("layout/layout")

@section("content")
    <ul>
        @forelse($products as $product)
                <li><a href="/product/{{$product->id}}">{{$product->title}}</li>
        @empty
            <h1>No products found</h1>
        @endforelse
    </ul>
@endsection
