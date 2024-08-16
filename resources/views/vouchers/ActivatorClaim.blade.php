<!DOCTYPE html>
<html>
<head>
    <title>Claim Voucher</title>
</head>
<body>
    <p>Tiket bisa diklaim, Apakah mau langsung anda Klaim?</p> <br>
    <a href="{{ url('/activate/confirm/' . $vocer) }}">Ya, Klaim</a>
    <a href="{{ url('/activate') }}">Tidak</a>
</body>
</html>