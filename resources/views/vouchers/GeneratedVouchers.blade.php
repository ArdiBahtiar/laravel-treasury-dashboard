@extends('layouts.app')

@section('content')
<div class="container">
    @if(isset($generatedVouchers))
    <div class="row">
        <div class="col d-flex justify-content-center">
            <h3 class="text-white underline"> Generated Vouchers: </h3>
        </div>
    </div>

    <div class="row">
        <div class="col d-flex justify-content-center">
            <ul>
                @foreach($generatedVouchers as $voucher)
                <li class="text-white">{{ $voucher }}</li>
                @endforeach
            </ul>
        </div>
    </div>
    @else
        <p>Belum generate apa-apa</p>
    @endif

    <div class="row">
        <div class="col d-flex justify-content-center">
            <a href="{{ url('/generate') }}" class="btn btn-primary d-flex justify-content-center">Kembali</a>
        </div>
    </div>
</div>
@endsection