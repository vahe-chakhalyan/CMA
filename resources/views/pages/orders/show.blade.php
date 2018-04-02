@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-xs-9">
                <h1>Order Details</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-9">
                <h2>
                    {{ $table->name }}
                </h2>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col">Product Name</th>
                    <th scope="col">Count</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @if($order->productsInOrder->count())
                    @foreach($order->productsInOrder as $pio)
                        <tr>
                            <td>{{ $pio->product->name }}</td>
                            <td>{{ $pio->count  }}</td>
                            <td>
                                <a href="/tables/{{ $table->id }}/orders/{{ $order->id }}/edit" class="btn btn-sm btn-success">
                                    Edit
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
        <div class="row">
            <div class="col-xs-9">
                <h3>
                    Total Amount: {{ $order->total_amount }}
                </h3>
            </div>
        </div>

    </div>
@endsection