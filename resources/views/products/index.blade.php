@extends('layouts.app')

@section('title', 'Product')

@section('content')
    <div class="d-flex align-items-center justify-content-between">
        <h6 class="mb-0">Daftar Product</h6>
        <a href="{{ route('products.create') }}" class="btn btn-primary">Add Product</a>
    </div>
    <hr />
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    <table class="table table-hover">
        <thead class="table-primary">
            <tr>
                <th>#</th>
                <th>Product</th>
                <th>Price</th>
                <th>Product Code</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if($products->count() > 0)
                @foreach($products as $product)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $product->title }}</td>
                        <td class="align-middle">{{ $product->price }}</td>
                        <td class="align-middle">{{ $product->product_code }}</td>
                        <td class="align-middle">{{ $product->description }}</td>
                        <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('products.show', $product->id) }}" type="button" class="btn btn-secondary">Detail</a>
                                <a href="{{ route('products.edit', $product->id) }}" type="button" class="btn btn-warning">Edit</a>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="btn btn-danger p-0" onsubmit="return confirm('Are you sure you want to delete?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger m-0">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="text-center" colspan="6">No products found</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection
