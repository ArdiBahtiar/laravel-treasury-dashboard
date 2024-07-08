@extends('layouts.app');

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading h3 mb-3 text-white">Result</div>
                <div class="panel-body">
                

                    {{-- <div class="table-responsive">
                    <table class="text-white">
                        @foreach($tickets as $ticket)
                            <tr>
                                <td>{{ $ticket->id }}</td>    
                                <td>{{ $ticket->catalog_id }}</td>    
                                <td>{{ $ticket->folio_id }}</td>    
                            </tr> 
                        @endforeach   
                    </table>    
                    </div> --}}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection