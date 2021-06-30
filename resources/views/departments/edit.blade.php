@extends('layouts.main')


@section('content')
<div class="container">
    <div>
        <h1 class="h3 mb-0 text-gray-800 my-2">Department</h1>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">
                    <strong>Register Department</strong>
                    <a href="{{ route('departments.index') }}" class="float-right">
                        <button class="btn btn-sm btn-info">Go back</button>
                    </a>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('departments.update', $department->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Department Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $department->name) }}" required autocomplete="name" autofocus>

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
            <form action="{{ route('departments.destroy', $department->id)}}" method="post">
                @csrf
                @method('DELETE')
                <div class="row justify-content-end mr-2 mt-2">
                    <button class="btn btn-danger">
                        <i class="fa fa-sm fa-trash mr-1"></i>
                        Delete {{ $department->name}}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
    
@endsection