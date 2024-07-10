@extends('layouts.app');

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading h3 mb-3">Input new Asset</div>
                <div class="panel-body">

                    <form action="{{ url('/expiry/update') }}" method="GET">
                        <input type="text" name="query" placeholder="folio ID">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection