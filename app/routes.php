<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{

	$output_formats = Helper::arrayToFormer( Wordlist::$output_formats );

	return View::make('home', compact('output_formats'));
});


Route::post('/', function()
{

	$word = Word::make('scrabble');

	print_r($word);


	print_r(Input::all());
	exit;
});
