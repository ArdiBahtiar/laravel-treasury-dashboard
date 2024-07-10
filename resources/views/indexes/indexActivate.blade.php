@extends('layouts.app');

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading h3 mb-3">Input new Asset</div>
                <div class="panel-body">

                    <form action="{{ url('/activate/redeem') }}" method="POST">
                        @csrf
                        <label for="vocer">Masukkan kode Voucher: </label> <br>
                        <input type="text" name="vocer" placeholder="folio ID"> <br>
                        <button type="submit" class="btn btn-primary">Activate Voucher</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection