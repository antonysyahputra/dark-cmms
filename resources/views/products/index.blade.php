@extends('layouts.index')

@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ $title }} table</h4>
                    <div class="d-flex justify-content-end mb-2">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#productFormModal">
                            Add New
                        </button>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th> # </th>
                                    <th> Code </th>
                                    <th> Name </th>
                                    <th> Brand </th>
                                    {{-- <th> Specification </th> --}}
                                    <th class="text-center"> Qty </th>
                                    <th> Category </th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $key => $product)
                                    <tr>
                                        <td> {{ $products->firstItem() + $key }} </td>
                                        <td> {{ $product->code }} </td>
                                        <td> {{ $product->name }} </td>
                                        <td> {{ $product->brand }} </td>

                                        <td class="text-center"> {{ $product->inventory->count() }} </td>
                                        <td> {{ $product->category->name }} </td>
                                        <td>
                                            <div class="dropdown d-flex justify-content-center">
                                                <button class="btn btn-sm btn-outline-primary dropdown-toggle"
                                                    type="button" id="dropdownMenuOutlineButton1" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false"> Action </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuOutlineButton1">
                                                    {{-- <h6 class="dropdown-header">Settings</h6> --}}
                                                    <a class="dropdown-item text-primary"
                                                        href="{{ route('products') }}/{{ $product->id }}">View</a>
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
                <div class="d-flex justify-content-center">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
        <!-- Button trigger modal -->


        <!-- Modal -->
        <div class="modal fade" id="productFormModal" tabindex="-1" aria-labelledby="productFormModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="productFormModalLabel">Form {{ $title }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="forms-sample" action="{{ route('products.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="category_id">Category</label>
                                <select class="js-example-basic-single @error('category_id') is-invalid @enderror"
                                    name="category_id" style="width: 100%" id="category_id">
                                    <option value="">Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }} : {{ $category->code }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id')
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
                                <label for="brand">Brand</label>
                                <input type="text" class="form-control @error('brand') is-invalid @enderror"
                                    name="brand" id="brand" value="{{ old('brand') }}" placeholder="Brand">
                                @error('brand')
                                    <div id="" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="specification">Specification</label>
                                <textarea class="form-control @error('specification') is-invalid @enderror" aria-label="With textarea"
                                    name="specification" id="specification" value="{{ old('specification') }}" placeholder="specification"></textarea>
                                {{-- <input type="text" class="form-control @error('specification') is-invalid @enderror"
                                    name="specification" id="specification" value="{{ old('specification') }}"
                                    placeholder="specification"> --}}
                                @error('specification')
                                    <div id="" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
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
