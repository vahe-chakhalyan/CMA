@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-xs-12">
                <form method="POST" action="/tables/{{ $table->id }}/orders" id="add-order">
                    {{csrf_field()}}


                    <div class="form-group  {{ $errors->has('product') ? ' has-error' : '' }} col-xs-6">
                        <label for="products">Product:</label>

                        <select class="form-control input-box select-product" name="product" id="product" required>
                            <option selected value="null">Select Product</option>
                            @foreach($products as $product)
                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                            @endforeach
                        </select>

                        @if ($errors->has('product'))
                            <span class="error help-block">{{ $errors->first('product') }}</span>
                        @endif
                    </div>

                    <div class="form-group  {{ $errors->has('count') ? ' has-error' : '' }} col-xs-6">
                        <label for="count">Count:</label>
                        <input type="text" class="form-control" id="count" placeholder="Enter count" name="count"
                               value="" required>
                        @if ($errors->has('name'))
                            <span class="error help-block">{{ $errors->first('count') }}</span>
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