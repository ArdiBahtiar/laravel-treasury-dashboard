@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col d-flex justify-content-center">
            <div class="panel panel-default">
                <div class="panel-heading h3 my-3 text-white text-center underline">Order Voucher</div>
                <div class="panel-body">

                    <form action="{{ url('/order/confirm') }}" method="GET">
                        <div class="row">
                            <div class="col my-2">
                                <input type="number" name="amount" class="w-100" placeholder="Order Amount">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col my-1">
                                <select name="catalog_id" id="catalog_id" class="w-100">
                                    @foreach($catalogs as $catalog)
                                    <option value="{{ $catalog->catalog_id }}">{{ $catalog->product_desc }}</option>
                                    @endforeach
                                </select> <br>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col my-2">
                                <input type="date" name="expiry" class="w-100">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col my-3">
                                <button type="submit" class="btn btn-primary w-100 ">Order Vouchers</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection