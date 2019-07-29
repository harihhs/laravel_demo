@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header"><a href="{{ URL::previous() }}"><img class="back-icon" src="{{asset('/images/backicon.png')}}" alt="back-icon"></a><span class="align-middle">  {{ __('Register') }}</span></div>

                <div class="card-body">
                <div class=”panel-body”>
                    @if(Session::has('alert'))
                    <div class="alert alert-success">
                    {{ Session::get('alert') }}
                    @php
                    Session::forget('alert');
                    @endphp
                    </div>
                    @endif
                </div>
                    <div class="create-account">{{ __('Create an account') }} </div>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">

                            <div class="col-md-12">
                                <input id="name" placeholder="First name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">

                            <div class="col-md-12">
                                <input id="email" placeholder="Email Address" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">

                            <div class="col-md-12">
                                <input id="age" placeholder="Age" type="text" class="form-control @error('age') is-invalid @enderror" name="age" required>

                                @error('age')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <label for="gender" class="col-md-4 col-form-label control-label">Gender</label>
                        <div id="gender-group" class="form-group{{ $errors->has('gender') ? ' has-error' : '' }} row">
                            <div class="col-md-12">
                                <div class="gender-radio"><input id="male" type="radio" name="gender" value="Male" {{ (old('sex') == 'male') ? 'checked' : '' }} ><span>Male</span></div>
                                <div class="gender-radio"><input id="female" type="radio" name="gender" value="Female" {{ (old('sex') == 'female') ? 'checked' : '' }} ><span>Female</span></div>
                                @if ($errors->has('gender'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('gender') }}</strong>
                                 </span>
                                @endif
                             </div>
                        </div>
                       
                        <div class="form-group row mb-0">
                            <div class="col-md-6 text-center">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Signup') }}
                                </button>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12 text-center">
				                <label for="account" class="col-form-label">{{ __('Already have an account') }}</label>
                                @if (Route::has('login'))
                            		<a href="{{ route('login') }}">Login</a>
                        	    @endif
			                </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
