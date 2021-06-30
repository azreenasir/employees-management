@extends('layouts.main')


@section('content')
<div class="container">
    <div>
        <h1 class="h3 mb-0 text-gray-800 my-2">State</h1>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">
                    <strong>Update State Information</strong>
                    <a href="{{ route('states.index', $state->id) }}" class="float-right">
                        <button class="btn btn-sm btn-info">Go back</button>
                    </a>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('states.update', $state->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="country_id" class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>

                            <div class="col-md-6">
                                <select name="country_id" class="form-control">
                                    @foreach ($countries as $country)
                                    <option value="{{$country->id}}" {{$country->id == $state->country->country_id ? 'selected' : ''}}>{{$country->name}}</option>
                                    @endforeach
                                </select>

                                @error('country_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('State Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $state->name) }}" required autocomplete="name" autofocus>

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
            <form action="{{ route('states.destroy', $state->id)}}" method="post">
                @csrf
                @method('DELETE')
                <div class="row justify-content-end mr-2 mt-2">
                    <button class="btn btn-danger">
                        <i class="fa fa-sm fa-trash mr-1"></i>
                        Delete {{ $state->name}}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
    
@endsection