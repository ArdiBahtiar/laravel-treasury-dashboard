@extends('layouts.app');

@section('content')
<head>
    <title>Postgre API</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
{{-- <div class="container">
    <!-- <img src="image/kidzania-logo.jpg" alt="kidzania" width="100px"> -->
    <form action="table.php">
        <input type="submit" value="Voucher yang sudah di-Klaim" class="claimed">
    </form>
    <!-- <img src="image/tlclogo.jpg" alt="tlc" width="100px"> -->
</div> --}}

<form action="{{ url('/activate') }}" role="form" method="post">
    {{ csrf_field() }}
    <div class="form-group mx-2">
        Kode Voucher: <input type="text" name="folio_id" value="<?php if(isset($_SESSION['folio_id']));?>">
    </div>
    <div class="form-group mx-2 mt-2">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>    
</form>

</body>
@endsection