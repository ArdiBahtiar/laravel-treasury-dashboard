@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col d-flex justify-content-center">
            <div class="panel panel-default">
                <div class="panel-heading h3 mt-2 mb-3 text-white text-center underline">Update Expiry Voucher</div>
                <div class="panel-body">

                    <form action="{{ url('/expiry/update') }}" method="GET">
                        
                        <div class="row">
                            <div class="col d-grid">
                                <label for="query" class="text-white text-center">Masukkan Voucher: </label>
                                <input type="text" class="w-100 mb-3" name="query" placeholder="folio ID">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary">Update Voucher</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection