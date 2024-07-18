@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col col-md-1 m-4"></div>
        <div class="col-md-auto">
            <div class="panel panel-default">
                <div class="panel-heading h3 my-3 text-white text-center">Dashboard</div>

                <div class="row">
                    <div class="col-4 d-grid gap-2">
                        <a href="/order" class="btn btn-primary btn-lg m-1 fw-bold p-4">Order Ticket</a> <br>
                    </div>
                    <div class="col-4 d-grid gap-2">
                        <a href="/registerVoucher" class="btn btn-secondary btn-lg m-1 fw-bold p-4">Register Ticket</a> <br>
                    </div>
                    <div class="col-4 d-grid gap-2">
                        <a href="/activate" class="btn btn-success btn-lg m-1 fw-bold p-4">Activate Ticket</a> <br>
                    </div>
                </div>

                <div class="row">
                    <div class="col-4 d-grid">
                        <a href="/expiry" class="btn btn-warning btn-lg m-1 fw-bold p-4">Update Expiry Ticket</a> <br>
                    </div>
                    <div class="col-4 d-grid">
                        <a href="/catalog" class="btn btn-info btn-lg m-1 fw-bold p-4">Create New Catalog</a> <br>
                    </div>
                    <div class="col-4 d-grid">
                        <a href="/generate" class="btn btn-danger btn-lg m-1 fw-bold">Generate Ticket by Catalog</a> <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection