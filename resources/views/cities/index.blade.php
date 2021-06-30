@extends('layouts.main')

@section('content')
<div class="container">
    <div>
        <h1 class="h3 mb-0 text-gray-800 my-2">City</h1>
    </div>
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div>
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                </div>
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div class="col">
                            <form action="{{ route('cities.index') }}" method="GET" class="my-0">
                                <div class="form-row align-items-between">
                                    <div class="col">
                                        <input type="search" name="search" class="form-control mb-2 mr-sm-5 "
                                            id="inlineFormInput" placeholder="Shah Alam">
                                    </div>
                                    <div class="col">
                                        <button type="submit" class="btn btn-primary mb-2">Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col">
                            <a href="{{ route('cities.create') }}" class="float-right">
                                <button class="btn btn-primary">Register New City</button>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#Id</th>
                                <th scope="col">State Name</th>
                                <th scope="col">City Name</th>
                                <th scope="col">Manage</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cities as $city)
                                <tr>
                                    <th> {{ $city->id }} </th>
                                    <td> {{ $city->state->name }} </td>
                                    <td> {{ $city->name }} </td>
                                    <td>
                                        <a href="{{ route('cities.edit', $city->id) }}" class="btn btn-success">
                                            Edit
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection