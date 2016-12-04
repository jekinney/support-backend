@extends('layouts.app')

@section('content')
	<header class="page-header">
		<h1>Almost Done!</h1>
	</header>
	<section class="well">
		<form action="{{ route('social.create') }}" method="post">
			<input type="hidden" name="provider_user_id" value="{{ $social->provider_user_id }}">
        	{{ csrf_field() }}
        	<div class="form-group">
            	<label for="name" class="label-control">Name</label>
            	<input type="text" id="name" name="name" value="{{ $social->name }}" class="form-control">
          	</div>
          	<div class="form-group">
            	<label for="email" class="label-control">Email</label>
            	<input type="email" id="email" name="email" value="{{ $social->email }}" readonly="true" class="form-control">
          	</div>
          	<div class="form-group">
            	<label for="password" class="label-control">Password</label>
            	<input type="password" id="password" name="password" class="form-control">
          	</div>
          	<div class="form-group">
            	<label for="password_confirmation" class="label-control">Confirm Password</label>
            	<input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
          	</div>
          	<div class="form-group text-right">
          		<button type="submit" class="btn btn-primary">Register</button>
          	</div>
        </form>
    </section>
@endsection