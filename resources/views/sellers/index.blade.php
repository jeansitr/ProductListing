@extends("layout/layout")

@section("content")
    <div class="row">
        <div class="col-12">
            <ul>
                @forelse($sellers as $seller)
                    <li><a href="/sellers/{{$seller->id}}">{{$seller->name}}</a></li>
                @empty
                    <li>No Sellers !</li>
                @endforelse
            </ul>
        </div>
    </div>
@endsection
