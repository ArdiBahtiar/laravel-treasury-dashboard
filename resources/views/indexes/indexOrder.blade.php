@extends('layouts.app');

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading h3 mb-3">Order Voucher</div>
                <div class="panel-body">

                    <form action="{{ url('/order/confirm') }}" method="GET">
                        <input type="number" name="amount" placeholder="Order Amount"> <BR></BR>
                        <select name="catalog_id" id="catalog_id">
                            @foreach($catalogs as $catalog)
                            <option value="{{ $catalog->catalog_id }}">{{ $catalog->product_desc }}</option>
                            @endforeach
                        </select> <br>
                        <input type="date" name="expiry">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Order Vouchers</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection