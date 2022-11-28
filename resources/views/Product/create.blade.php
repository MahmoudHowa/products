@extends('Product.layout')

@section('Product', 'Create')

@section('content')

    <div class="container" style="padding-top: 7%">
        <a href="{{route('products.index')}}" class="btn btn-danger" style="padding: 0%">Back</a>
        <br><br>
        <div class="card">
            <div class="card-body">
            <p class="card-text"><b>Create Product</b></p>
            </div>
        </div>
    </div>

    <div class="container" style="padding-top: 2%">
        <form action="{{ route('products.store') }}" method="POST">
            @csrf
            <div class="form-group">
            <label for="exampleFormControlInput1">Name</label>
            <input type="text" name="name" class="form-control" placeholder="Products Name">
            </div>
            <div class="form-group">
            <label for="exampleFormControlSelect1">Price</label>
            <input type="text" name="price" class="form-control" placeholder="Products Price">
            </div>
            <div class="form-group">
            <label for="exampleFormControlTextarea1">Detils</label>
            <textarea class="form-control" name="detail" rows="3"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
@endsection
