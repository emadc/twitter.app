<?php

Route::get('/', function() {
// 	$tweets = App\Tweet::all();
	$tweets = App\Tweet::orderBy('created_at', 'desc')->get();
	
	return view('index', ['tweets' => $tweets]);
});

Route::get('/a-propos', function() {
    return 'Ce clone de Twitter vous est proposé par Laravel et Open School Design';
});

Route::get('/contact', function() {
    return 'Écrivez nous à exemple@exemple.org';
});

Route::post('/contact', function() {
    return 'Désolé le formulaire de contact n’est pas encore prêt';
});

Route::get('tweets/create', 'TweetsController@create');

Route::post('tweets', 'TweetsController@store');

Route::get('tweets/', 'TweetsController@index');

Route::get('tweets/{id}/edit', 'TweetsController@edit');

Route::put('tweets/{tweet}', 'TweetsController@update');

Route::delete('tweets/{tweet}', 'TweetsController@destroy');
Auth::routes();

Route::get('/home', 'HomeController@index');
