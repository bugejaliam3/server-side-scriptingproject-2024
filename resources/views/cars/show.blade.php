@extends('layouts.app')

@section('title', 'Car Details')

@section('content')
<div class="card mt-5">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h6 class="card-title text-white mb-0">Car Details</h6>
        <a href="/" class="btn btn-link text-white"><i class="fas fa-arrow-left"></i></a>
    </div>
    <div class="card-body">
        <div class="form-group row mb-3">
            <label for="model" class="col-sm-3 col-form-label font-weight-bold">Model</label>
            <div class="col-sm-9">
                <p class="form-control-plaintext text-muted">{{ $car->model }}</p>
            </div>
        </div>
        <div class="form-group row mb-3">
            <label for="year" class="col-sm-3 col-form-label font-weight-bold">Year</label>
            <div class="col-sm-9">
                <p class="form-control-plaintext text-muted">{{ $car->year }}</p>
            </div>
        </div>
        <div class="form-group row mb-3">
            <label for="email" class="col-sm-3 col-form-label font-weight-bold">Salesperson Email</label>
            <div class="col-sm-9">
                <p class="form-control-plaintext text-muted">{{ $car->salesperson_email }}</p>
            </div>
        </div>
        <div class="form-group row mb-3">
            <label for="manufacturer" class="col-sm-3 col-form-label font-weight-bold">Manufacturer</label>
            <div class="col-sm-9">
                <p class="form-control-plaintext text-muted">{{ $car->manufacturer ? $car->manufacturer->name : 'N/A' }}</p>
            </div>
        </div>

        <hr class="my-4">

        <div class="form-group row mt-4">
            <div class="col-sm-9 offset-sm-3">
                <a href="/cars/{{ $car->id }}/edit" class="btn btn-primary">Edit</a>
                <a onclick="deleteCar('{{$car->id}}')" class="btn btn-outline-danger ml-2">Delete</a>
            </div>
        </div>
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
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    function deleteCar(id){
        axios.delete('/api/cars/' + id)
            .then(() => {
                window.location.href = '/';
            })
            .catch(error => {
                console.error('Error deleting car:', error);
            });
    }
</script>
@endsection
