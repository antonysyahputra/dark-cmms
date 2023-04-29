@extends('layouts.index')

@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    {{-- <h4 class="card-title">{{ $title }} table</h4> --}}
                    <div class="d-flex justify-content-end mb-2">
                        <form action="/inventories/search" class="nav-link d-lg-flex search">
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="text" class="form-control form-control-sm" name="search"
                                        placeholder="Search" aria-label="Recipient's username"
                                        aria-describedby="basic-addon2" />
                                    <div class="input-group-append">
                                        {{-- <select class="js-example-basic-single" name="search" id="search"
                                            style="width: 100%">
                                            <option value="">ABC</option>
                                            <option value="">DEF</option>
                                        </select> --}}
                                        <button class="btn btn-sm btn-outline-primary">
                                            Search
                                        </button>
                                    </div>
                                </div>
                            </div>
                            {{-- <input type="text" name="search" class="form-control" placeholder="Search products">
                            <button class="btn btn-sm btn-outline-dark">Search</button> --}}
                        </form>
                        <div class="mt-2">
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal"
                                data-target="#inventoryForm">
                                Add New
                            </button>
                        </div>
                        {{-- <a class="btn btn-info" href="{{ route('inventories.create') }}">Add New</a> --}}
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th> # </th>
                                    <th> Code </th>
                                    <th> Product </th>
                                    <th> Purchased in </th>
                                    <th> Department </th>
                                    <th> Room </th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($inventories as $key => $inventory)
                                    <tr>
                                        <td> {{ $inventories->firstItem() + $key }} </td>
                                        <td> {{ $inventory->code_inventory }} </td>
                                        <td> {{ $inventory->product->name }} </td>
                                        <td> {{ $inventory->purchased_in }} </td>
                                        <td> <a
                                                href="/inventories?category={{ $inventory->product->category->id }}&department={{ $inventory->room->department->id }}">{{ $inventory->room->department->name }}</a>
                                        </td>
                                        <td> {{ $inventory->room->name }} </td>
                                        <td>
                                            <div class="dropdown d-flex justify-content-center">
                                                <button class="btn btn-sm btn-outline-primary dropdown-toggle"
                                                    type="button" id="dropdownMenuOutlineButton1" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false"> Action </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuOutlineButton1">
                                                    {{-- <h6 class="dropdown-header">Settings</h6> --}}
                                                    <a class="dropdown-item text-primary"
                                                        href="{{ route('inventories') }}/{{ $inventory->id }}">View</a>
                                                    <a class="dropdown-item text-warning" href="#">Edit</a>
                                                    <a class="dropdown-item text-danger" href="#">Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <p class="text-muted mx-3">showing
                    {{ $inventories->firstItem() . ' to ' . $inventories->lastItem() . ' of ' . $inventories->total() . ' result' }}
                </p>
                <div class="d-flex justify-content-center">
                    {{ $inventories->links() }}
                </div>
            </div>
        </div>
        <!-- Button trigger modal -->


        <!-- Modal -->
        <div class="modal fade" id="inventoryForm" tabindex="-1" aria-labelledby="inventoryFormLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="inventoryFormLabel">Form {{ $title }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="forms-sample" action="{{ route('inventories') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="product_id">Product</label>
                                <select class="js-example-basic-single @error('product_id') is-invalid @enderror"
                                    name="product_id" style="width: 100%" id="product_id">
                                    <option value="">Product</option>
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}"
                                            {{ old('product_id') == $product->id ? 'selected' : '' }}>{{ $product->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('product_id')
                                    <div id="" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="room_id">Room</label>
                                <select class="js-example-basic-single @error('room_id') is-invalid @enderror"
                                    name="room_id" style="width: 100%" id="room_id">
                                    <option value="">Room</option>
                                    @foreach ($rooms as $room)
                                        <option value="{{ $room->id }}"
                                            {{ old('room_id') == $room->id ? 'selected' : '' }}>{{ $room->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('room_id')
                                    <div id="" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="purchased_in">Purchased In</label>
                                <input type="date" class="form-control @error('purchased_in') is-invalid @enderror"
                                    name="purchased_in" id="purchased_in" value="{{ old('purchased_in') }}"
                                    placeholder="" />
                                @error('purchased_in')
                                    <div id="" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>
                            <button type="submit" class="btn btn-primary mr-2">
                                Submit
                            </button>
                            {{-- <button class="btn btn-dark inventory-submit-btn">Cancel</button> --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
