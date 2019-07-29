@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header"><a href="{{ URL::previous() }}"><img class="back-icon" src="{{asset('/images/backicon.png')}}" alt="back-icon"></a><span class="align-middle">  {{ __('Edit Profile') }}</span></div>
                <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="m-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{route('users.update', $user)}}" method="POST">
                    @csrf
                    @method('POST')

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Name:</strong>
                                <input type="text" name="name" value="{{ $user->name }}" class="form-control" placeholder="Name">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Email:</strong>
                                <input type="text" value="{{ $user->email }}" class="form-control"  name="email" placeholder="Email address" />
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Age:</strong>
                                <input type="text" name="age" value="{{ $user->age }}" class="form-control" placeholder="Name">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection