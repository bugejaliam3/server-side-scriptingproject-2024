@extends('layouts.app')

@section('title', 'Edit Car')

@section('content')
<div class="card mt-5">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h6 class="card-title mb-0 text-white">Edit Car</h6>
        <a href="/" class="btn btn-link text-white"><i class="fas fa-arrow-left"></i></a>
    </div>
    <div class="card-body">
        <form action="/cars/{{$car->id}}" method="POST" class="row">
            @method('PUT')
            @csrf
            <div class="form-group row mb-3">
                <label for="model" class="col-sm-3 col-form-label font-weight-bold">Model</label>
                <div class="col-sm-9">
                    <input type="text" name="model" class="form-control @error('model') is-invalid @enderror" id="model" value="{{ old('model', $car->model) }}">
                    @error('model')
                    <span class="invalid-feedback">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row mb-3">
                <label for="year" class="col-sm-3 col-form-label font-weight-bold">Year</label>
                <div class="col-sm-9">
                    <input type="text" name="year" class="form-control @error('year') is-invalid @enderror" id="year" value="{{ old('year', $car->year) }}">
                    @error('year')
                    <span class="invalid-feedback">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row mb-3">
                <label for="email" class="col-sm-3 col-form-label font-weight-bold">Salesperson Email</label>
                <div class="col-sm-9">
                    <input type="email" name="salesperson_email" class="form-control @error('salesperson_email') is-invalid @enderror" id="email" value="{{ old('salesperson_email', $car->salesperson_email) }}">
                    @error('salesperson_email')
                    <span class="invalid-feedback">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row mb-3">
                <label for="manufacturer" class="col-sm-3 col-form-label font-weight-bold">Manufacturer</label>
                <div class="col-sm-9">
                    <select name="manufacturer_id" class="form-select @error('manufacturer_id') is-invalid @enderror" id="manufacturer">
                        <option value="">Select Manufacturer</option>
                        @foreach($manufacturers as $manufacturer)
                        <option value="{{ $manufacturer->id }}" {{ $manufacturer->id == old('manufacturer_id', $car->manufacturer_id) ? 'selected' : '' }}>{{ $manufacturer->name }}</option>
                        @endforeach
                    </select>
                    @error('manufacturer_id')
                    <span class="invalid-feedback">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
            </div>
            
            <hr class="my-4">

            <div class="form-group row mt-4">
                <div class="col-sm-9 offset-sm-3">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="/" class="btn btn-outline-secondary ml-2">Cancel</a>
                </div>
                @if($success)
                <div class="col-12">
                    <div class="alert alert-success my-4">
                        Car was edited successfully.
                    </div>
                </div>
                @endif
            </div>
        </form>
    </div>
</div>
<style>
    .font-weight-bold {
        font-weight: bold;
    }

    .text-muted {
        color: #6c757d;
    }
</style>
@endsection