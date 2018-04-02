@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-6 ">
                <form method="POST" action="/users/{{ $user->id }}" id="edit-user">
                    {{csrf_field()}}
                    {{ method_field('PUT') }}

                    <input type="hidden" name="id" value="{{ $user->id }}">
                    <div class="form-group  {{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter name" name="name"
                               value="{{ $user->name }}" required>
                        @if ($errors->has('name'))
                            <span class="error help-block">{{ $errors->first('name') }}</span>
                        @endif
                    </div>

                    <div class="form-group  {{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="name">E-mail:</label>
                        <input type="text" class="form-control" id="email" placeholder="Enter email" name="email"
                               value="{{ $user->email }}" required>
                        @if ($errors->has('email'))
                            <span class="error help-block">{{ $errors->first('email') }}</span>
                        @endif
                    </div>

                    <div class="form-group  {{ $errors->has('role') ? ' has-error' : '' }} col-xs-12">
                        <label for="type">Role:</label>

                        <select class="form-control input-box select-role" name="role" id="role" required>
                            @foreach($roles as $role)
                                @if($role->id == $user->role_id)
                                    <option selected value="{{ $role->id }}">{{ $role->name }}</option>
                                @else
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endif

                            @endforeach
                        </select>

                        @if ($errors->has('role'))
                            <span class="error help-block">{{ $errors->first('role') }}</span>
                        @endif
                    </div>

                    <div class="col-xs-12 text-right">
                        <button type="reset" class="btn btn-md btn-default" id="cancel">
                            Cancel
                        </button>
                        <button type="submit" class="btn btn-md btn-primary" id="submit">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection