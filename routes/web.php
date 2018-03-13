<?php

Route::get('/', function() {
	$tweets = App\Tweet::all();
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


