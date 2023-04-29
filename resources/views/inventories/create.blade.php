@extends('layouts.index')

@section('content')
    <div class="row">
        <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ $title }} Form</h4>
                    {{-- <p class="card-description">Basic form elements</p> --}}
                    <form class="forms-sample" action="{{ route('inventories') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="product_id">Product</label>
                            <select class="js-example-basic-single @error('product_id') is-invalid @enderror"
                                name="product_id" style="width: 100%" id="product_id">
                                <option value="">Product</option>
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
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
                            <select class="js-example-basic-single @error('room_id') is-invalid @enderror" name="room_id"
                                style="width: 100%" id="room_id">
                                <option value="">Room</option>
                                @foreach ($rooms as $room)
                                    <option value="{{ $room->id }}">{{ $room->name }}</option>
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
                                name="purchased_in" id="purchased_in" placeholder="" />
                            @error('purchased_in')
                                <div id="" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>
                        <button type="submit" class="btn btn-primary mr-2">
                            Submit
                        </button>
                        <button class="btn btn-dark">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
