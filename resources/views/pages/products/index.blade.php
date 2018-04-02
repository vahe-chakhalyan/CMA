@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-xs-9">
                <h1>Products</h1>
            </div>
            <div class="col-xs-3 pull-right">
                <a href="{{ route('products.create') }}" class="btn btn-success">
                    Create New Product
                </a>
            </div>
        </div>

        @if(!count($products))
            <h1 class="text-center">No Products show</h1>
        @else
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">status</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->price }}</td>
                            <td>
                                <a href="/products/{{ $product->id }}">
                                    Show
                                </a>
                                <a href="/products/{{ $product->id }}/edit" class="btn btn-sm btn-success">
                                    Edit
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
    </div>
    <form action="" method="post" id="product_delete_form">
        {{csrf_field()}}
        {{ method_field('DELETE') }}
    </form>
    <div class="col-xs-12 text-center">
        {{ $products->links() }}
    </div>
    @endif

@endsection