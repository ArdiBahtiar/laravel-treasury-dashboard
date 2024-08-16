@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col d-flex justify-content-center">
                <h3 class="text-white">Voucher Expiry Updated!</h3>
            </div>
        </div>
        <div class="row">
            <div class="col d-flex justify-content-center">
                <a href="{{ url('/expiry') }}" class="btn btn-primary d-flex justify-content-center">Kembali</a>
            </div>
        </div>
    </div>
@endsection