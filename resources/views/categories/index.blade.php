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
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#categoryFormModal">
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
                                @foreach ($categories as $key => $category)
                                    <tr>
                                        <td> {{ $categories->firstItem() + $key }} </td>
                                        <td> {{ $category->name }} </td>
                                        <td> {{ $category->code }} </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    {{ $categories->links() }}
                </div>
            </div>
        </div>
        <!-- Button trigger modal -->


        <!-- Modal -->
        <div class="modal fade" id="categoryFormModal" tabindex="-1" aria-labelledby="categoryFormModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="categoryFormModalLabel">Form Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="forms-sample" action="{{ route('categories.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="classification_id">Classification</label>
                                <select class="js-example-basic-single @error('classification_id') is-invalid @enderror"
                                    name="classification_id" style="width: 100%" id="classification_id">
                                    <option value="">Classification</option>
                                    @foreach ($classifications as $classification)
                                        <option value="{{ $classification->id }}"
                                            {{ old('classification_id') == $classification->id ? 'selected' : '' }}>
                                            {{ $classification->name }} : {{ $classification->code }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('classification_id')
                                    <div id="" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="code">Code</label>
                                <input type="text" class="form-control @error('code') is-invalid @enderror"
                                    name="code" id="code" value="{{ old('code') }}" placeholder="Code">
                                @error('code')
                                    <div id="" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" id="name" value="{{ old('name') }}" placeholder="Name">
                                @error('name')
                                    <div id="" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <button class="btn btn-dark" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
