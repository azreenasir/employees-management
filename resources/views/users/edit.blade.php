@extends('layouts.main')


@section('content')
    <!-- Page Heading -->
    <div class="container">
    
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-5">
                    <div class="card-header">
                        <strong>Update User Information</strong>
                        <a href="{{ route('users.index') }}" class="float-right">
                            <button class="btn btn-sm btn-info">Go back</button>
                        </a>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('users.update' ,$user->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group row mt-2">
                                <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>
    
                                <div class="col-md-6">
                                    <input 
                                    id="username" 
                                    type="text" 
                                    class="form-control 
                                    @error('username') is-invalid @enderror" 
                                    name="username" 
                                    value="{{ old('username', $user->username) }}" 
                                    required autocomplete="username" autofocus>
    
                                    @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('First name') }}</label>
    
                                <div class="col-md-6">
                                    <input 
                                    id="first_name"
                                    type="text" 
                                    class="form-control 
                                    @error('first_name') is-invalid @enderror"
                                    name="first_name"
                                    value="{{ old('first_name', $user->first_name) }}"
                                    required autocomplete="first_name" autofocus >
    
                                    @error('first_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Last name') }}</label>
    
                                <div class="col-md-6">
                                    <input 
                                    id="last_name" 
                                    type="text" 
                                    class="form-control 
                                    @error('last_name') is-invalid @enderror" 
                                    name="last_name" 
                                    value="{{ old('last_name' , $user->last_name) }}" 
                                    required autocomplete="last_name" autofocus>
    
                                    @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
    
    
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
    
                                <div class="col-md-6">
                                    <input 
                                    id="email" 
                                    type="email" 
                                    class="form-control
                                    @error('email') is-invalid @enderror" 
                                    name="email" value="{{ old('email' , $user->email) }}" 
                                    required autocomplete="email">
    
                                    @error('email')
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
            </div>
            <div class="col-md-8 mt-4 my-8">
                <div class="card">
                    <div class="card-header"><strong>Change Password</strong></div>
    
                    <div class="card-body">
                        <form method="POST" action="{{ route('users.changePassword' , $user->id) }}">
                            @csrf
    
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
    
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
    
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
    
                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
    
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Update Password
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <form action="{{ route('users.destroy', $user->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <div class="row justify-content-end mr-2 mt-2">
                        <button class="btn btn-danger">
                            <i class="fa fa-sm fa-trash mr-1"></i>
                            Delete {{ $user->username}}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection