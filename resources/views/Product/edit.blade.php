@extends('Product.layout')

@section('Product','Edit')

@section('content')

    <div class="container" style="padding-top: 7%">
        <a href="{{route('products.index')}}" class="btn btn-danger" style="padding: 0%">Back</a>
        <br><br>
        <div class="card">
            <div class="card-body">
            <p class="card-text"> <b>Product Name: {{$product->name}}</b> </p>
            </div>
        </div>
    </div>

    <div class="container" style="padding-top: 2%">
        <form action="{{ route('products.update', $product->id) }}" method="POST">
            @csrf
            @method("PUT")
            <div class="form-group">
            <label for="exampleFormControlInput1">Name</label>
            <input type="text" name="name" class="form-control" value="{{$product->name}}">
            </div>
            <div class="form-group">
            <label for="exampleFormControlSelect1">Price</label>
            <input type="text" name="price" class="form-control" value="{{$product->price}}">
            </div>
            <div class="form-group">
            <label for="exampleFormControlTextarea1">Detils</label>
            <textarea class="form-control" name="detail" rows="3">{!! $product->detail !!}</textarea> {{-- We put two exclamation points because we are allowed to fetch the formats and tags in css and HTML, as the normal blade does not allow these tags to be passed --}}

            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
@endsection
