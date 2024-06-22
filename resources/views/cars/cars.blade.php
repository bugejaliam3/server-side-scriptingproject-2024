@extends('layouts.app')

@section('title', 'All Cars Models')

@section('content')
<div class="card text-white mt-5">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="card-title mb-0">All Cars Models</h5>
        <a href="/cars/create" class="btn btn-success">+ Add New</a>
    </div>
    <div class="card-body">
        <div class="mb-3">
            <form method="get" action="/">
                <input type="text" name="search" id="search" class="form-control" placeholder="Search" value="{{ request('search') }}">
            </form>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Model</th>
                    <th>Year</th>
                    <th>Salesperson Email</th>
                    <th>Manufacturer</th>
                    @auth
                    <th scope="col">Actions</th>
                    @endauth
                </tr>
            </thead>
            <tbody>
                @foreach($cars as $car)
                <tr id="{{$car->id}}">
                    <td class="font-weight-bold">{{ $car->id }}</td>
                    <td>{{ $car->model }}</td>
                    <td>{{ $car->year }}</td>
                    <td>{{ $car->salesperson_email }}</td>
                    <td>{{ $car->manufacturer ? $car->manufacturer->name : 'N/A' }}</td>
                    @auth
                        <td class="btn-actions">
                            <a href="/cars/{{$car->id}}" class="btn btn-sm btn-outline-green">
                                <i class="fa-regular fa-eye" style="color: #63E6BE;"></i>
                            </a>
                            <a href="/cars/{{ $car->id }}/edit" class="btn btn-sm btn-outline">
                                <i class="fa-regular fa-pen-to-square" style="color: #787878;"></i>
                            </a>
                            <button onclick="deleteCar('{{$car->id}}')" class="btn btn-sm btn-outline-red">
                                <i class="fa-solid fa-xmark" style="color: #eb200a;"></i>
                            </button>
                        </td>
                    @endauth
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<style>
    .font-weight-bold {
        font-weight: bold;
    }

    .btn-actions {
        display: flex;
        align-items: center;
    }

    .btn-sm {
        border-radius: 50%;
        width: 30px;
        height: 30px;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-right: 5px;
    }

    .btn-outline {
        border: 2px solid #6c757d;
        color: #6c757d;
    }

    .btn-outline-red {
        border: 2px solid #eb200a;
        color: #eb200a;
    }

    .btn-outline-green {
        border: 2px solid #63E6BE;
        color: #63E6BE;
    }
</style>
<script>
    function deleteCar(id) {
        axios('/api/cars/' + id, {
            method: "DELETE"
        }).then(() => {
            document.getElementById(id).remove();
        }).catch(e => {

        }).finally(() => {

        });
    }
</script>
@endsection