@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-6">
			<div class="card">
				<div class="card-header">
					<a href="{{ URL::previous() }}">
						<span class="back-arrow"> < </span>
					</a>
					<span class="title">{{ __('My Profile') }}</span>
					<button class="btn btn-primary">Edit</button>
				</div>
				<div class="card-body">
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
									<div class="col-md-4">
										<span class="info">Name</span>
									</div>
									<div class="col-md-8">
										<span class="data">: {{ Auth::user()->name }}</span>
									</div>
								</div>
								<div class="row">
									<div class="col-md-4">
										<span class="info">Email</span>
									</div>
									<div class="col-md-8">
										<span class="data">: {{ Auth::user()->email }}</span>
									</div>
								</div>
								<div class="row">
									<div class="col-md-4">
										<span class="info">Age</span>
									</div>
									<div class="col-md-8">
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
						<div class="card-body changePwd">
							<form method="POST" action="{{url('/resetPassword')}}" id="resetPwd">
								<div class="form-body">
									<div class="form-group row">
										<label for="" class="col-md-4">Old Password</label>
										<div class="col-md-6">
											<input type="Password" class="form-control" name="oldPassword">
										</div>		
									</div>
									<div class="form-group row">
										<label for="" class="col-md-4">New Password</label>
										<div class="col-md-6">
											<input type="Password" class="form-control" name="newPassword">
										</div>		
									</div>
									<div class="form-group row">
										<label for="" class="col-md-4">Confirm Password</label>
										<div class="col-md-6">
											<input type="Password" class="form-control" name="confirmPassword">
										</div>		
									</div>
									<div class="form-group row">
										<label for="" class="col-md-4"></label>
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
