@extends('layouts.app')

@section('content')
    <form action="{{ route('register.store') }}" method="post">
        {{ csrf_field() }}
        <div class="row">
	        @if(!isset($social))
	      		@include('users.partials.social_buttons')
	      	@endif

	      	<div class="col-sm-12 col-md-6 col-md-offset-3">
		      	<section class="panel panel-default">
		      		<header class="panel-heading">
		      			<h1 class="panel-title">Your Information</h1>
		      		</header>
		      		<section class="panel-body">
				      	<div class="form-group">
				        	<label for="name" class="label-control">Name</label>
				        	<input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control">
				      	</div>
				      	<div class="form-group">
				        	<label for="email" class="label-control">Email</label>
				        	<input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control">
				      	</div>
				      	<div class="row">
					      	<div class="form-group col-md-6">
					        	<label for="password" class="label-control">Password</label>
					        	<input type="password" id="password" name="password" class="form-control">
					      	</div>
					      	<div class="form-group col-md-6">
					        	<label for="password_confirmation" class="label-control">Confirm Password</label>
					        	<input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
					      	</div>
					    </div>
				    </section>
			    </section>
			</div>

			<div class="col-sm-12 col-md-6 col-md-offset-3">
			    <section class="panel panel-primary">
			      	<header class="panel-heading">
		      			<h1 class="panel-title">Company and/or Website Information</h1>
		      		</header>
		      		<section class="panel-body">
				      	<div class="form-group">
				        	<label for="company_name" class="label-control">Name</label>
				        	<input type="text" id="company_name" name="company_name" value="{{ old('company_name') }}" class="form-control">
				      	</div>
				      	<div class="form-group">
				        	<label for="company_email" class="label-control">Contact Email</label>
				        	<input type="email" id="company_email" name="company_email" value="{{ old('company_email') }}" class="form-control">
				      	</div>
				      	<div class="form-group">
				        	<label for="company_url" class="label-control">Website Url</label>
				        	<input type="url" id="company_url" name="company_url" value="{{ old('company_url') }}" class="form-control">
				      	</div>
				    </section>
			    </section>
			</div>
			
			<div class="col-sm-12 col-md-6 col-md-offset-3">
		      	<section class="panel panel-info">
		      		<header class="panel-heading">
		      			<h1 class="panel-title">Details and Terms</h1>
		      		</header>
					<article class="panel-body">
						<p>To enable quick registration all new memebers will be signed up for the free plan by default. You can upgrade (or downgrade) any time in your company's settings page. After successful registration, you will be redirected to that page.</p>
						<div class="form-group">
							<div class="checkbox">
								<label for="terms">
									<input type="checkbox" name="terms" id="terms">
									You have read and agree to the <a href="" target="_blank">terms of service</a> agreement
								</label>
							</div>
						</div>
						<div class="form-group">
							<div class="checkbox">
								<label for="privacy">
									<input type="checkbox" name="privacy" id="privacy">
									You have read and agree to the <a href="" target="_blank">privacy</a> agreement
								</label>
							</div>
						</div>
						<div class="form-group">
							<div class="checkbox">
								<label for="data">
									<input type="checkbox" name="data" id="data">
									You have read and agree to the <a href="" target="_blank">data storage</a> agreement
								</label>
							</div>
						</div>
					</article>
					<footer class="panel-footer text-center">
						<button type="submit" class="btn btn-primary">Register</button>
					</footer>
		    	</section>
		    </div>
		</div>
    </form>
@endsection