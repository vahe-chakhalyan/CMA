@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-6 ">
                <form method="POST" action="/tables/{{ $table->id }}" id="edit-table">
                    {{csrf_field()}}
                    {{ method_field('PUT') }}

                    <input type="hidden" name="id" value="{{ $table->id }}">
                    <div class="form-group  {{ $errors->has('name') ? ' has-error' : '' }} col-xs-6">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter name" name="name"
                               value="{{ $table->name }}" required>
                        @if ($errors->has('name'))
                            <span class="error help-block">{{ $errors->first('name') }}</span>
                        @endif
                    </div>

                    <div class="form-group  {{ $errors->has('waiter') ? ' has-error' : '' }} col-xs-6">
                        <label for="waiter">Waiters:</label>

                        <select class="form-control input-box select-waiter" name="waiter" id="waiter" required>
                            <option selected value="null">Select Waiter</option>
                            @foreach($waiters as $waiter)
                                @if($table->waiter_id == $waiter->id)
                                    <option selected value="{{ $waiter->id }}">{{ $waiter->name }}</option>
                                @else
                                    <option value="{{ $waiter->id }}">{{ $waiter->name }}</option>
                                @endif

                            @endforeach
                        </select>

                        @if ($errors->has('waiter'))
                            <span class="error help-block">{{ $errors->first('waiter') }}</span>
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