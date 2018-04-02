@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-6 ">
                <form method="POST" action="/tables/{{ $table->id }}" id="edit-order">
                    {{csrf_field()}}
                    {{ method_field('PUT') }}

                    <div class="text-center">
                        <h3>Sorry, no view.</h3>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection