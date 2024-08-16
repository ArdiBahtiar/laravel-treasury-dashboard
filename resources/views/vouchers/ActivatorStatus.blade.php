@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col d-flex justify-content-center mt-2">
            <p class="text-white">{{ $message }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col d-flex justify-content-center">
            <a href="{{ url('/activate') }}" class="btn btn-primary">Kembali</a>
        </div>
    </div>
</div>
@endsection