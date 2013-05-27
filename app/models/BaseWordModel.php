<?php

class BaseWordModel extends Eloquent {

	public static $letters = array(
		'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'
	);


	public static function createNew( $word )
	{

		$attributes = array(
			'word' => $word,
			// 'length' => Str::length( $word ),
			'length' => strlen( $word ),
			'alphagram' => Wordlist::alphagram( $word)
		);

		$frequency = Wordlist::letterFrequency( $word );

		$attributes = array_merge( $attributes, $frequency );

		print_r($attributes);

	}



}
