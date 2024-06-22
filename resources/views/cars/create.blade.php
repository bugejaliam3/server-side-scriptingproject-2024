@extends('layouts.app')

@section('title', 'Add a New Car')

@section('content')
<div class="card mt-5">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h6 class="card-title text-white mb-0">Add a New Car</h6>
    </div>
    <div class="card-body">
        <form action="/cars" method="post" class="row">
            @csrf

            <div class="form-group row mb-3">
                <label for="model" class="col-sm-3 col-form-label font-weight-bold">Model</label>
                <div class="col-sm-9">
                    <input type="text" name="model" class="form-control @error('model') is-invalid @enderror" id="model" placeholder="">
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
                    <input type="text" name="year" class="form-control @error('year') is-invalid @enderror" id="year" placeholder="">
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
                    <input type="email" name="salesperson_email" class="form-control @error('salesperson_email') is-invalid @enderror" id="email" placeholder="">
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
                        <option value="{{ $manufacturer->id }}">{{ $manufacturer->name }}</option>
                        @endforeach
                    </select>
                    @error('manufacturer_id')
                    <span class="invalid-feedback">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
            </div>
            <hr class="my-1">
            <div class="form-group row mt-4">
                <div class="col-sm-9 offset-sm-3">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="/" class="btn btn-outline-secondary ml-2">Cancel</a>
                </div>
            </div>
            @if($success)
            <div class="col-12">
                <div class="alert alert-success my-4">
                    Car was created successfully.
                </div>
            </div>
            @endif
        </form>
    </div>
</div>
<style>
    .font-weight-bold {
        font-weight: bold; 
    }
</style>
@endsection