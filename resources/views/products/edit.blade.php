@extends("layout.layout")

@section("content")
    <br/>
    <form action="/product{{$product ? "/$product->id" : ""}}" method="{{ $product ? "post" : "put" }}">
        <div class="row">
            <div class="col-12 attribute-box">
                <label class="attribute ml-auto" for="title">Title: </label>
                <input id="title" class="attribut-input w-100" type="text">
            </div>
        </div>
        <div class="row">
            <div class="col-12 attribute-box">
                <label class="attribute ml-auto" for="description">Description: </label>
                <input id="description" class="attribut-input w-100" type="text">
            </div>
        </div>
        <div class="row">
            <div class="col-12 attribute-box">
                <label class="attribute ml-auto" for="price">Price: </label>
                <input id="price" class="attribut-input w-100" type="number">
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <input type="submit" style="margin-top: 10px" class="btn btn-success w-100 " value="{{$product ? "Edit" : "Create"}}">
            </div>
        </div>
    </form>
@endsection
