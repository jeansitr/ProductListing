<div class="row">
    <div class="col-4">
        <div id="img-container" class="h-100 w-100 d-flex">
            @include("shared._image")
        </div>
    </div>
    <div class="col-8">
        <div class="col-12">
            <span class="card-detail"> {{$item->title ?? $item->name}} </span>
        </div>
        <div class="col-12">
            <span class="card-detail">
                @if(str($item->price)->isNotEmpty())
                    {{$item->price}} $
                @else
                    {{$item->email}}
                @endif
            </span>
        </div>
        <div class="col-12">
            <span class="card-detail">
                @if(str($item->available)->isNotEmpty())
                    available: {{$item->available ? "yes" : "no"}}
                @else
                    {{$item->phone}}
                @endif
            </span>
        </div>
        @if(str($item->description)->isNotEmpty())
            <div class="col-12">
                <p class="card-detail">
                    {{$item->description}}
                </p>
            </div>
            <div class="col-12">
                <span class="card-detail">Selling by: <a
                        href="/sellers/{{$item->seller->id}}"> {{ $item->seller->name }} </a></span>
            </div>
        @endif
    </div>
</div>
