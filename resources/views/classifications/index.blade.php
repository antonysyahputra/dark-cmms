@extends('layouts.index')

@section('content')
    <div class="row">
        <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ $title }} table</h4>
                    {{-- <p class="card-description"> Add class <code>.table-bordered</code>
                </p> --}}
                    <div class="d-flex justify-content-end mb-2">
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#classificationFormModal">
                            Add New
                        </button>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th> # </th>
                                    <th> Name </th>
                                    <th> Code </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($classifications as $key => $classification)
                                    <tr>
                                        <td> {{ $classifications->firstItem() + $key }} </td>
                                        <td> {{ $classification->name }} </td>
                                        <td> {{ $classification->code }} </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Button trigger modal -->


        <!-- Modal -->
        <div class="modal fade" id="classificationFormModal" tabindex="-1" aria-labelledby="classificationFormModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="classificationFormModalLabel">Form Classification</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="forms-sample" action="{{ route('classifications.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <label for="code">Code</label>
                                <input type="text" class="form-control" name="code" id="code" placeholder="Code">
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        {{-- <button class="btn btn-dark" data-dismiss="modal">Cancel</button> --}}
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
