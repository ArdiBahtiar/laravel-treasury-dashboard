@extends('layouts.app')

@section('content')
    <div class="container">

        @if(session('status'))
        <div class="row">
            <div class="col d-flex justify-content-center">
                {{ session('status') }}
            </div>
        </div>
        @endif

        <div class="row">
            <div class="col d-flex justify-content-center">
                <h3 class="text-white">Register Voucher?</h3>
            </div>
        </div>
        <div class="row">
            <div class="col d-flex justify-content-center">
                <form action="{{ url('/registerVoucher/checkout') }}" method="POST">
                @csrf
                <input type="hidden" name="vocer" value='{{ $vocer }}'>
                <button type="submit" class="text-white btn btn-success">Register Sekarang</button>
                </form>

            </div>

            <div class="col d-flex justify-content-center">
                <a href="{{ url('registerVoucher') }}" class="btn btn-danger">Tidak</a>
            </div>
        </div>
    </div>
@endsection