@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col d-flex justify-content-center">
            <div class="panel panel-default">
                <div class="panel-heading h3 mt-2 mb-3 text-white text-center underline">Create new Catalog</div>
                <div class="panel-body">

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}             {{-- INI BUAT NAMPILIN ANGKA 1, KALO SESSION STATUS DITERIMA MUNCUL --}}
                        </div>
                    @endif

                    <form action="{{ url('/catalog/create') }}" method="GET">
                        <div class="row">
                            <div class="col d-grid">
                                <input type="text" class="w-100" name="catalog_id" placeholder="Catalog ID">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col d-grid">
                                <input type="text" class="w-100" name="product_desc" placeholder="Product Description">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col d-grid">
                                <input type="number" name="product_price" placeholder="Product Price">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col d-grid">
                                <input type="text" name="product_info" placeholder="Additional Info">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col d-flex justify-content-center mt-3">
                                <button type="submit" class="btn btn-primary text-white">Create Catalog</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection