<?php




Route::get('/', 'HomeController@landing');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'client.auth'], function () {
	Route::get('dashboard', 'Client\DashboardController@index')->name('client.dashboard');
	Route::get('credential', 'Client\CredentialController@index')->name('client.credentials');
	Route::get('regenerate', 'Client\CredentialController@regenerate')->name('client.token.regenerate');
	Route::get('logout', function () {
		session()->forget(['token_type', 'token', 'expires_in']);
		return redirect()->route('login');
	});
});
