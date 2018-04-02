@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-xs-9">
                <h1>Tables</h1>
            </div>
            <div class="col-xs-3 pull-right">
                <a href="{{ route('tables.create') }}" class="btn btn-success">
                    Create New Table
                </a>
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
                        <th scope="col">status</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tables as $table)
                        <tr>
                            <td>{{ $table->id }}</td>
                            <td>{{ $table->name }}</td>
                            <td>{{ empty($table->waiter_id) ? 'free' : 'busy' }}</td>
                            <td>
                                <a href="/tables/{{ $table->id }}">
                                    Show
                                </a>
                                <a href="/tables/{{ $table->id }}/edit" class="btn btn-sm btn-success">
                                    Edit
                                </a>
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
    <div class="col-xs-12 text-center">
        {{ $tables->links() }}
    </div>
    @endif

@endsection