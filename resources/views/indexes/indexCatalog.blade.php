@extends('layouts.app');

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading h3 mb-3 text-white">Input new Catalog</div>
                <div class="panel-body">

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}             {{-- INI BUAT NAMPILIN ANGKA 1, KALO SESSION STATUS DITERIMA MUNCUL --}}
                        </div>
                    @endif

                    <form action="{{ url('/catalog/create') }}" method="GET">
                        <input type="text" name="catalog_id" placeholder="Catalog ID"> <br>
                        <input type="text" name="product_desc" placeholder="Product Description"> <br>
                        <input type="number" name="product_price" placeholder="Product Price"> <br>
                        <input type="text" name="product_info" placeholder="Additional Info"> <br>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary text-white">Create Catalog</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection