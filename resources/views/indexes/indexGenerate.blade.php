@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col d-flex justify-content-center">
            <div class="panel panel-default">
                <div class="panel-heading h3 mt-2 mb-3 text-white text-center underline">Generate Voucher</div>
                <div class="panel-body">

                    <form action="{{ url('/generate/confirm') }}" method="GET">
                        <div class="row">
                            <div class="col d-grid">
                                <input type="number" class="w-100 mb-1" name="amount" placeholder="Generate Amount">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col d-grid">
                                <select name="catalog_id" id="catalog_id">
                                    @foreach($catalogs as $catalog)
                                    <option value="{{ $catalog->catalog_id }}">{{ $catalog->product_desc }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col d-grid mt-3">
                                <button type="submit" class="btn btn-primary">Generate</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection