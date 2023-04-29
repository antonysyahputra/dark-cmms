@extends('layouts.index')

@section('content')
    <div class="row">
        <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ $product->code }} </h4>
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th>Name</th>
                                <td>:</td>
                                <td>{{ $product->name }}</td>
                            </tr>
                            <tr>
                                <th>Code</th>
                                <td>:</td>
                                <td>{{ $product->code }}</td>
                            </tr>
                            <tr>
                                <th>Room</th>
                                <td>:</td>
                                <td>{{ $product->name }}</td>
                            </tr>
                            <tr>
                                <th>Specification</th>
                                <td>:</td>
                                <td>

                                    @php
                                        $specifications = explode(',', $product->specification);
                                    @endphp
                                    <ul style="list-style-type:square; line-height:180%">
                                        @foreach ($specifications as $specification)
                                            <li>{{ $specification }}</li>
                                        @endforeach
                                    </ul>

                                </td>
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
