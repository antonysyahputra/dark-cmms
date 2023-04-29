@extends('layouts.index')

@section('content')
    <div class="row">
        <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ $inventory->code_inventory }} </h4>
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th>Name</th>
                                <td>:</td>
                                <td>{{ $inventory->product->name }}</td>
                            </tr>
                            <tr>
                                <th>Code</th>
                                <td>:</td>
                                <td>{{ $inventory->code_inventory }}</td>
                            </tr>
                            <tr>
                                <th>Room</th>
                                <td>:</td>
                                <td>{{ $inventory->room->name }}</td>
                            </tr>
                        </table>
                    </div>
                    <a class="btn btn-sm btn-outline-primary m-3" href="{{ url()->previous() }}"><i
                            class="mdi mdi-skip-previous"></i>Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
