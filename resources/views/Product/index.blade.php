@extends('Product.layout')

@section('Product','Home')

@section('content')
<div class="jumbotron container" style="padding-bottom: 0.5%">
    <h1 class="display-4">Hello, Products</h1>
    {{-- <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p> --}}
    <hr class="my-4">
    <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
    <a class="btn btn-primary btn-lg" href="{{ route('products.create')}}" role="button">Create</a>
    <a class="btn btn-primary btn-lg" href="{{ route('product.trash')}}" role="button">Trash</a>


<div class="container" style="margin-top: 2%">
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
                    <a class="btn btn-success" style="display: inline" href=" {{ route('products.edit', $item->id) }} ">Edit</a>
                    <a class="btn btn-info" style="display: inline" href=" {{ route('products.show', $item->id) }} ">Show</a>
                    <a class="btn btn-warning" style="display: inline" href=" {{ route('soft.delete', $item->id) }} ">Trush</a>
                    {{-- <form action=" {{ route('products.destroy', $item->id) }} " method="POST" style="display: inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form> --}}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="container" style="margin-top: 2%; height: 10px; width: 300px; display: block;">
        {!! $products->links() !!}
    </div>

</div>
@endsection
