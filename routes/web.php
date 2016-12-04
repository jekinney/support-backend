<?php

Route::group(['namespace' => 'Site'], function() {
	Route::get('/', ['as' => 'home', 'uses' => 'Pages\HomeController@index']);

	Route::group(['prefix' => 'register', 'as' => 'register.', 'namespace' => 'Users'], function() {
		Route::get('/', ['as' => 'create', 'uses' => 'RegistrationController@create']);
		Route::post('/', ['as' => 'store', 'uses' => 'RegistrationController@store']);
	});

	Route::group(['prefix' => 'auth', 'as' => 'auth.', 'namespace' => 'Users'], function() {
		Route::post('login', ['as' => 'login', 'uses' => 'AuthController@login']);
		Route::post('logout', ['as' => 'logout', 'uses' => 'AuthController@destroy']);
	});

	Route::group(['prefix' => 'social', 'as' => 'social.', 'namespace' => 'Users'], function() {
		Route::get('{provider}', ['as' => 'redirect', 'uses' => 'SocialController@redirectToProvider']);
		Route::get('{provider}/callback', ['as' => 'callback', 'uses' => 'SocialController@handleProviderCallback']);
		Route::post('/', ['as' => 'create', 'uses' => 'SocialController@create']);
	});
});