@extends('Product.layout')

@section('Product','Trash')

@section('content')
<div class="jumbotron container" style="padding-bottom: 0.5%">
    <h1 class="display-4">Hello, Products</h1>
    {{-- <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p> --}}
    <hr class="my-4">
    <p>Trashed Products</p>
    <a class="btn btn-primary btn-lg" href="{{ route('products.index')}}" role="button" style="padding: 0%">Home</a>
    {{-- <a class="btn btn-primary btn-lg" href="{{ route('product.trash')}}" role="button">Learn more</a> --}}

    <div class="container" style="margin-top: 2%"">
        @if ($message = Session::get('success'))
            <div class="alert alert-primary" role="alert">
                {{$message}}
            </div>
        @endif
    </div>

</div>
<div class="container">
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col" style="text-align: center">Product Name</th>
            <th scope="col" style="text-align: center">Product Price</th>
            <th scope="col" style="text-align: center">Action</th>
        </tr>
        </thead>
        <tbody>
            @php
                $i = 0;
            @endphp
            @foreach ($products as $item)
            <tr style="text-align: center">
                <th scope="row">{{++$i}}</th>
                <td>{{ $item->name }}</td>
                <td>{{ $item->price }}  PS  </td>
                <td>
                    <a class="btn btn-info" style="display: inline" href=" {{ route('product.backFrom.trash', $item->id) }} ">Back</a>
                    <a class="btn btn-danger" style="display: inline" href=" {{ route('product.deleteFromDB.trash', $item->id) }} ">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {!! $products->links() !!}
</div>
@endsection
