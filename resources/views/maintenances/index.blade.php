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
                            {{-- <input type="text" name="search" class="form-control" placeholder="Search inventorys">
                            <button class="btn btn-sm btn-outline-dark">Search</button> --}}
                        </form>
                        <div class="mt-2">
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal"
                                data-target="#maintenanceForm">
                                Add New Issue
                            </button>
                        </div>
                        {{-- <a class="btn btn-info" href="{{ route('inventories.create') }}">Add New</a> --}}
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Product</th>
                                    <th>Inventory Code</th>
                                    <th>Room</th>
                                    <th>Request Date</th>
                                    <th>Issue</th>
                                    <th>Completion Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($maintenances as $maintenance)
                                    <tr>
                                        <td></td>
                                        <td>{{ $maintenance->inventory->product->name }}</td>
                                        <td>{{ $maintenance->inventory->code_inventory }}</td>
                                        <td>{{ $maintenance->inventory->room->name }}</td>
                                        <td>{{ $maintenance->created_at->format('d-m-Y') }}</td>
                                        <td>{{ $maintenance->issue }}</td>
                                        <td>{{ $maintenance->completion_date ? $maintenance->completion_date : 'incomplete' }}
                                        </td>
                                        <td>
                                            @switch($maintenance->status)
                                                @case(1)
                                                    <label class="badge badge-danger"> Pending
                                                    @break

                                                    @case(2)
                                                        <label class="badge badge-warning"> In progress
                                                        @break

                                                        @case(3)
                                                            <label class="badge badge-info"> Fixed
                                                            @break

                                                            @default
                                                        @endswitch

                                                    </label>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
                {{-- <p class="text-muted mx-3">showing
                    {{ $inventories->firstItem() . ' to ' . $inventories->lastItem() . ' of ' . $inventories->total() . ' result' }}
                </p>
                <div class="d-flex justify-content-center">
                    {{ $inventories->links() }}
                </div> --}}
            </div>
        </div>
        <!-- Button trigger modal -->


        <!-- Modal -->
        <div class="modal fade" id="maintenanceForm" tabindex="-1" aria-labelledby="maintenanceFormLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="maintenanceFormLabel">Form {{ $title }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="forms-sample" action="{{ route('maintenances') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="inventory_id">Inventory</label>
                                <select class="js-example-basic-single @error('inventory_id') is-invalid @enderror"
                                    name="inventory_id" style="width: 100%" id="inventory_id">
                                    <option value="">Inventory</option>
                                    @foreach ($inventories as $inventory)
                                        <option value="{{ $inventory->id }}"
                                            {{ old('inventory_id') == $inventory->id ? 'selected' : '' }}>
                                            {{ $inventory->code_inventory }} = {{ $inventory->product->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('inventory_id')
                                    <div id="" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="issue">Issue</label>
                                <input type="text" class="form-control @error('issue') is-invalid @enderror"
                                    name="issue" id="issue" value="{{ old('issue') }}" placeholder="" />
                                @error('issue')
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
