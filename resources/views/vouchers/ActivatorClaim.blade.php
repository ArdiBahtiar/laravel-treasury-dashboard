{{-- <!DOCTYPE html>
<html>
<head>
    <title>Claim Voucher</title>
</head>
<body>
    <p>Tiket bisa diklaim, Apakah mau langsung anda Klaim?</p> <br>
    <a href="{{ url('/activate/confirm/' . $vocer) }}">Ya, Klaim</a>
    <a href="{{ url('/activate') }}">Tidak</a>
</body>
</html> --}}


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
                <h3 class="text-white">Activate Voucher?</h3>
            </div>
        </div>
        <div class="row">
            <div class="col d-flex justify-content-center">
                {{-- <form action="{{ url('/registerVoucher/checkout') }}" method="POST">
                @csrf
                <input type="hidden" name="vocer" value='{{ $vocer }}'>
                <button type="submit" class="text-white btn btn-success">Activate Sekarang</button>
                </form> --}}
                <a href="{{ url('/activate/confirm/' . $vocer) }}" class="btn btn-success">Activate Sekarang</a>
            </div>

            <div class="col d-flex justify-content-center">
                <a href="{{ url('/activate') }}" class="btn btn-danger">Tidak</a>
            </div>
        </div>
    </div>
@endsection