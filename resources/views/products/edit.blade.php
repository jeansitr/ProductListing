@extends("layout.layout")

@section("content")
    <br/>
    <form action="/products{{isset($product) ? "/$product->id" : ""}}" method="post">
        @csrf
        <div class="row">
            <div class="col-12 attribute-box">
                <label class="attribute ml-auto" for="title">Title: </label>
                <input id="title" name="title" class="attribut-input w-100" type="text" value="{{isset($product) ? $product->title : ""}}">
            </div>
        </div>
        <div class="row">
            <div class="col-12 attribute-box">
                <label class="attribute ml-auto" for="description">Description: </label>
                <input id="description" name="description" class="attribut-input w-100" type="text" value="{{isset($product) ? $product->description : ""}}">
            </div>
        </div>
        <div class="row">
            <div class="col-12 attribute-box">
                <label class="attribute ml-auto" for="price">Price: </label>
                <input id="price" name="price" class="attribut-input w-100" step="0.01" type="number" value="{{isset($product) ? $product->price : ""}}">
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <input type="submit" style="margin-top: 10px" class="btn btn-success w-100 " value="{{ isset($product) ? "Edit" : "Create" }}">
            </div>
        </div>
        @if(isset($product))
            @method("PUT")
        @endif
    </form>
@endsection
