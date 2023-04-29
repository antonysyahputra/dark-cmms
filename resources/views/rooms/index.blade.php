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
                                    <th> Department </th>
                                </tr>
                            </thead>
                            <tbody>
                                @unless (!$rooms->count() == 0)
                                    <span>tidak ada data</span>
                                @else
                                    @foreach ($rooms as $key => $room)
                                        <tr>
                                            <td> {{ $rooms->firstItem() + $key }} </td>
                                            <td> {{ $room->name }} </td>
                                            <td> {{ $room->department->name }} </td>
                                        </tr>
                                    @endforeach
                                @endunless
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    {{ $rooms->links() }}
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
                        <form class="forms-sample" action="{{ route('rooms.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="department_id">Department</label>
                                <select class="js-example-basic-single @error('department_id') is-invalid @enderror"
                                    name="department_id" style="width: 100%" id="department_id">
                                    <option value="">Department</option>
                                    @foreach ($departments as $department)
                                        <option value="{{ $department->id }}">{{ $department->code }}</option>
                                    @endforeach
                                </select>
                                @error('department_id')
                                    <div id="" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="floor">Floor</label>
                                <select class="js-example-basic-single @error('floor') is-invalid @enderror" name="floor"
                                    style="width: 100%" id="floor">
                                    <option value="">Floor</option>
                                    <option value="1" {{ old('floor') == '1' ? 'selected' : '' }}>I</option>
                                    <option value="2" {{ old('floor') == '2' ? 'selected' : '' }}>II</option>
                                    <option value="3" {{ old('floor') == '3' ? 'selected' : '' }}>III</option>
                                    <option value="4" {{ old('floor') == '4' ? 'selected' : '' }}>IV</option>
                                </select>
                                @error('floor')
                                    <div id="" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" id="room-name" value="{{ old('name') }}" placeholder="Name">
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
