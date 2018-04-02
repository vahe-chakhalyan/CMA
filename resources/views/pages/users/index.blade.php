@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-xs-9">
                <h1>Waiters</h1>
            </div>
            <div class="col-xs-3 pull-right">
                <a href="{{ route('users.create') }}" class="btn btn-success">
                    Create New User
                </a>
            </div>
        </div>

        @if(!count($waiters))
            <h1 class="text-center">No waiters show</h1>
        @else
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($waiters as $k => $waiter)
                        <tr>
                            <th scope="row">{{ $k+1 }}</th>
                            <td>{{ $waiter->name }}</td>
                            <td>
                                <a href="/users/{{ $waiter->id }}">
                                    Show
                                </a>
                                <a href="/users/{{ $waiter->id }}/edit" class="btn btn-sm btn-success">
                                    Edit
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
    </div>
    <form action="" method="post" id="waiter_delete_form">
        {{csrf_field()}}
        {{ method_field('DELETE') }}
    </form>
    <div class="col-xs-12 text-center">
        {{ $waiters->links() }}
    </div>
    @endif

@endsection