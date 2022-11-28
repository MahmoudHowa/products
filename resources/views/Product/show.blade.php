@extends('Product.layout')

@section('Product','Show')

@section('content')

    <div class="container" style="padding-top: 7%">
        <a href="{{route('products.index')}}" class="btn btn-danger" style="padding: 0%">Back</a>
        <br><br>
        <div class="card">
            <div class="card-body">
            <p class="card-text"><h3>Show Information Product</h3></p>
            </div>
        </div>
    </div>

    <div class="container" style="padding-top: 2%">
        <div class="form-group">
        <label for="exampleFormControlInput1"> <b>Name:</b><br>  {{$product->name}}</label>
        </div>
        <div class="form-group">
        <label for="exampleFormControlSelect1"> <b>Price:</b><br>  {{$product->price}}</label>
        </div>
        <div class="form-group">
        <label for="exampleFormControlTextarea1"> <b>Detils:</b> </label>
        <br>
        {!!$product->detail!!}
        </div>
    </div>
@endsection
