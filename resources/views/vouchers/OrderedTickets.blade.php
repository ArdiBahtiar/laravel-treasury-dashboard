@extends('layouts.app')

@section('content')
    <div class="container">
        @if(isset($orderedVouchers))
        <div class="row">
            <div class="col d-flex justify-content-center">
                <h3 class="text-white underline"> Ordered Vouchers: </h3>
            </div>
        </div>

        <div class="row">
            <div class="col d-flex justify-content-center">
                <ul>
                    @foreach($orderedVouchers as $voucher)
                        <li class="text-white">{{ $voucher }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        @else
            <p class="col d-flex justify-content-center text-white mt-2">Belum order apa-apa</p>
        @endif

        <div class="row">
            <div class="col d-flex justify-content-center">
                <a href="{{ url('/order') }}" class="btn btn-primary d-flex justify-content-center">Kembali</a>
            </div>
        </div>
    </div>
@endsection