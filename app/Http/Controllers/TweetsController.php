<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Tweet;

class TweetsController extends Controller {
	
	public function create() {
		return view ( 'tweets.create' );
	}
	
	public function store(Request $request) {
		$this->validate ( $request, [ 
				'content' => 'required|string|max:140' 
		] );
		
		$tweet = new Tweet ();
		
		$tweet->content = $request->content;
		
		$tweet->save ();
		
		return redirect ( '/' );
	}
	
	public function index() {
		$tweets = Tweet::orderBy ( 'created_at', 'desc' )->paginate ( 10 );
		
		return view ( 'tweets.index', compact ( 'tweets' ) );
	}
	
	public function edit($id)
	{
		$tweet = Tweet::findOrFail($id);
		
		return view('tweets.edit', compact('tweet'));
	}
	
	public function update(Request $request, $id)
	{
		$this->validate($request, ['content' => 'required|string|max:140']);
		
		$tweet = Tweet::findOrFail($id);
		
		$tweet->content = $request->content;
		
		$tweet->save();
		
		return redirect('/');
	}
	
	public function destroy(Tweet $tweet)
	{
		Tweet::destroy($tweet->id);
		
		return redirect('/tweets');
	}
}
