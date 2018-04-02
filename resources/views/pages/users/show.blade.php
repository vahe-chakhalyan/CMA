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

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Role</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    <td>
                        <a href="/users/{{ $user->id }}/edit" class="btn btn-sm btn-success">
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
@section('custom')

@endsection