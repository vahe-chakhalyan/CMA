@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-xs-9">
                <h1>My Tables</h1>
            </div>
        </div>

        @if(!count($tables))
            <h1 class="text-center">No Tables show</h1>
        @else
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">Table Number</th>
                        <th scope="col">Name</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tables as $table)
                        <tr>
                            <td>{{ $table->id }}</td>
                            <td>{{ $table->name }}</td>
                            <td>
                                @if($table->activeOrder)
                                    <a href="/tables/{{ $table->id }}/orders/{{ $table->activeOrder->id }}">
                                        view Order
                                    </a>
                                    <a href="/tables/{{ $table->id }}/orders/{{ $table->activeOrder->id }}/edit" class="btn btn-sm btn-success">
                                        Edit
                                    </a>
                                @else
                                    <a href="tables/{{ $table->id }}/orders/create"  class="btn btn-sm btn-success">
                                        Create Order
                                    </a>
                                @endif


                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
    </div>
    <form action="" method="post" id="table_delete_form">
        {{csrf_field()}}
        {{ method_field('DELETE') }}
    </form>
    @endif

@endsection