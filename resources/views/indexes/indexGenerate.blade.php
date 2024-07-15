@extends('layouts.app');

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading h3 mb-3">Input new Asset</div>
                <div class="panel-body">

                    <form action="{{ url('/generate/confirm') }}" method="GET">
                        <input type="number" name="amount" placeholder="Generate Amount"> <BR></BR>
                        <select name="catalog_id" id="catalog_id">
                            {{-- <option value="" selected></option> --}}
                            @foreach($catalogs as $catalog)
                            <option value="{{ $catalog->catalog_id }}">{{ $catalog->product_desc }}</option>
                            @endforeach
                        </select>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Generate</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection