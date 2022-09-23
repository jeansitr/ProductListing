@extends("layout.layout")

@section("content")
    <ul>
        @forelse($products as $product)
                <li><a href="{{ route('products.show', $product->id) }}">{{$product->title}}</li>
        @empty
            <h1>No products found</h1>
        @endforelse
        <li><a href="/products/create">Add product</a> </li>
    </ul>
@endsection
