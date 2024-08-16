<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Voucher</title>
</head>
<body>
    <form action="{{ url('/registerVoucher/checkout') }}" method="POST">
        @csrf
        <input type="hidden" name="vocer" value="{{ $vocer }}">
        <button type="submit">Register Voucher</button>
        <br>
    </form>
    <a href="{{ url('/registerVoucher') }}">Tidak</a>
</body>
</html>

{{-- @extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col d-flex justify-content-center">
                <h3>Register Voucher?</h3>
            </div>
        </div>
        <div class="row">
            <div class="col d-flex justify-content-center">
                <form action=""></form>
            </div>
        </div>
    </div>
@endsection --}}