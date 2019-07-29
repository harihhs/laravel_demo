@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-6">
			<div class="card">
				<div class="card-header">
					<a href="{{ URL::previous() }}">
						<img class="back-icon" src="{{asset('/images/backicon.png')}}" alt="back-icon">
					</a>
					<span class="title align-middle">{{ __('My Profile') }}</span>
					<button class="btn btn-primary float-right">
						<a class="text-white" href='{{url("/edit")}}'>Edit</a>
					</button>
				</div>
				<div class="card-body">
					<!--BEGIN SUCCESS ALERT-->
					@if(Session::has("password_success"))
					<div class="alert bg-success alert-icon-left alert-arrow-left alert-dismissible mb-2" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
						<span class="text-white">{!! Session::get("password_success") !!}</span>
					</div>
					@endif
					@if ($message = Session::get('success'))
					<div class="alert alert-success">
						{{ $message }}
					</div>
					@endif
					<!--END SUCCESS ALERT-->
					<div class="img-wrapper row">
						<div class="img-container">
							<img src="{{asset('/images/avatar.png')}}" alt="avatar-image">
						</div>
					</div>
				</div>
				<div class="card-body">
					<div class="container">
						<div class="info-wrapper row">
							<div class="col-md-8">
								<div class="row">
									<div class="col-md-4 col-3">
										<span class="info">Name</span>
									</div>
									<div class="col-md-8 col-9">
										<span class="data">: {{ Auth::user()->name }}</span>
									</div>
								</div>
								<div class="row">
									<div class="col-md-4 col-3">
										<span class="info">Email</span>
									</div>
									<div class="col-md-8 col-9">
										<span class="data">: {{ Auth::user()->email }}</span>
									</div>
								</div>
								<div class="row">
									<div class="col-md-4 col-3">
										<span class="info">Age</span>
									</div>
									<div class="col-md-8 col-9">
										<span class="data">: {{ Auth::user()->age }}</span>
									</div>
								</div>
							</div>
						</div>	
					</div>
				</div>
				<div class="card-body">
					<div class="resetPwd">
						<span class="btn btn-primary">
							{{ __('Change Password') }}
						</span>
						<div class="card-body changePwd d-none">
							<!--BEGIN ERROR ALERT-->
							@if(Session::has("password_error"))
							<div class="alert bg-danger alert-icon-left alert-arrow-left alert-dismissible mb-2" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">×</span>
								</button>
								<span class="error-msg text-white">{!! Session::get("password_error") !!} </span>
							</div>
							@endif
							<!--END ERROR ALERT-->
							<form method="POST" action="{{url('/resetPassword')}}" id="resetPwd">
								@csrf
								<div class="form-body">
									<div class="form-group row">
										<label class="col-md-4">Old Password</label>
										<div class="col-md-6">
											<input type="Password" class="form-control" name="oldPassword">
											<div class="col-sm-12 error-msg">{!! $errors->first('oldPassword') !!}</div>
										</div>		
									</div>
									<div class="form-group row">
										<label class="col-md-4">New Password</label>
										<div class="col-md-6">
											<input type="Password" class="form-control" name="newPassword">
											<div class="col-sm-12 error-msg">{!! $errors->first('newPassword') !!}</div>
										</div>		
									</div>
									<div class="form-group row">
										<label class="col-md-4">Confirm Password</label>
										<div class="col-md-6">
											<input type="Password" class="form-control" name="confirmPassword">
											<div class="col-sm-12 error-msg">{!! $errors->first('confirmPassword') !!}</div>
										</div>		
									</div>
									<div class="form-group row">
										<label class="col-md-4"></label>
										<div class="col-md-6 text-center">
											<input type="submit" class="btn btn-primary" value="Update Password">
										</div>		
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
