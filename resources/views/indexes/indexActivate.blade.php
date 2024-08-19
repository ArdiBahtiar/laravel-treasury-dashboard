@extends('layouts.app')

@section('content')
<div class="container">

    @if(session('status'))
        <div class="row">
            <div class="col d-flex justify-content-center alert alert-success">
                {{ session('status') }}
            </div>
        </div>
    @endif

    <div class="row">
        <div class="col d-flex justify-content-center">
            <div class="panel panel-default">
                <div class="panel-heading h3 mt-2 mb-3 text-white text-center underline">Activator Voucher</div>
                <div class="panel-body">

                    <form action="{{ url('/activate/redeem') }}" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col d-grid">
                                <label for="vocer" class="text-center text-white mb-1">Masukkan kode Voucher: </label>
                                <input type="text" name="vocer" class="w-100" placeholder="folio ID"> <br>        
                            </div>
                        </div>

                        <div class="row">
                            <div class="col d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary">Activate Voucher</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection