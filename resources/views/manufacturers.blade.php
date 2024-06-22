@extends('layouts.app')

@section('title', 'All Manufacturers')

@section('content')
<div class="card text-white mb-4 mt-4">
    <div class="card-header">
        <h2 class="card-title mb-0">All Manufacturers</h2>
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Phone</th>
                </tr>
            </thead>
            <tbody>
                @foreach($manufacturers as $manufacturer)
                    <tr>
                        <td>{{ $manufacturer->id }}</td>
                        <td>{{ $manufacturer->name }}</td>
                        <td>{{ $manufacturer->address }}</td>
                        <td>{{ $manufacturer->phone }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
