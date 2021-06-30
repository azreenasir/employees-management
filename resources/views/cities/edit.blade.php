@extends('layouts.main')


@section('content')
<div class="container">
    <div>
        <h1 class="h3 mb-0 text-gray-800 my-2">City</h1>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <strong>Edit City</strong>
                    <a href="{{ route('cities.index') }}" class="float-right">
                        <button class="btn btn-sm btn-info">Go back</button>
                    </a>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('cities.update', $city->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="state_id" class="col-md-4 col-form-label text-md-right">{{ __('State Name') }}</label>

                            <div class="col-md-6">
                                <select name="state_id" class="form-control">
                                    <option selected disabled>Select State</option>
                                    @foreach ($states as $state)
                                    <option value="{{$state->id}}" {{ $state->id == $city->state_id ? 'selected' : '' }}>{{$state->name}}</option>
                                    @endforeach
                                </select>

                                @error('state_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('City Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $city->name) }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <form action="{{ route('cities.destroy', $city->id)}}" method="post">
                @csrf
                @method('DELETE')
                <div class="row justify-content-end mr-2 mt-2">
                    <button class="btn btn-danger">
                        <i class="fa fa-sm fa-trash mr-1"></i>
                        Delete {{ $city->name}}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
    
@endsection