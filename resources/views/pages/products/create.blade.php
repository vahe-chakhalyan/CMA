@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-6 ">
                <form method="POST" action="/products" id="add-product">
                    {{csrf_field()}}

                    <div class="form-group  {{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter name" name="name"
                               value="{{ old('name') ? old('name') : '' }}" required>
                        @if ($errors->has('name'))
                            <span class="error help-block">{{ $errors->first('name') }}</span>
                        @endif
                    </div>

                    <div class="form-group  {{ $errors->has('price') ? ' has-error' : '' }}">
                        <label for="price">Price:</label>
                        <input type="text" class="form-control" id="price" placeholder="Enter price" name="price"
                               value="{{ old('price') ? old('price') : '' }}" required>
                        @if ($errors->has('price'))
                            <span class="error help-block">{{ $errors->first('price') }}</span>
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