<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Voucher</title>
</head>
<body>
    {{-- <p>Apakah mau langsung anda Register?</p> <br>
    <a href="/registerVoucher/checkout">Ya, Register Voucher</a> <br>
    <a href="/registerVoucher">Tidak</a> --}}

    <form action="{{ url('/registerVoucher/checkout') }}" method="POST">
        @csrf
        <input type="hidden" name="vocer" value="{{ $vocer }}">
        <button type="submit">Register Voucher</button>
        <br>
    </form>
    <a href="/registerVoucher">Tidak</a>
</body>
</html>