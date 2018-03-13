<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TweetsController extends Controller {
	
	public function create() {
		return view ( 'tweets.create' );
	}
	
	public function store(Request $request) {
		$this->validate($request, ['content' => 'required|string|max:140']);
		
		dd ( 'Validation réussie' );
	}
}
