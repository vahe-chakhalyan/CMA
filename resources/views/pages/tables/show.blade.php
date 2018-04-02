@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-xs-9">
                <h1>Waiters</h1>
            </div>
            <div class="col-xs-3 pull-right">
                <a href="{{ route('tables.create') }}" class="btn btn-success">
                    Create New Table
                </a>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Status</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>{{ $table->name }}</td>
                    <td>{{ empty($table->waiter_id) ? 'free' : 'busy'  }}</td>
                    <td>
                        <a href="/tables/{{ $table->id }}/edit" class="btn btn-sm btn-success">
                            Edit
                        </a>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <form action="" method="post" id="waiter_delete_form">
        {{csrf_field()}}
        {{ method_field('DELETE') }}
    </form>
@endsection