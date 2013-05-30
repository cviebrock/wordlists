<?php

class BaseWordModel extends Eloquent {

	protected $guarded = array('id');

	public $timestamps = false;

	public static $letters = array(
		'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'
	);


	public static function make( $word )
	{

		$word = Str::lower($word);

		$letters = str_split($word);
		sort($letters);

		$alphagram = join('', $letters);

		$attributes = array(
			'word'      => $word,
			'length'    => Str::length( $word ),
			'alphagram' => $alphagram,
		);

		foreach( static::$letters as $letter ) {
			$pos = strpos($alphagram, $letter);
			if ( $pos !== false ) {
				$attributes[$letter] = strrpos($alphagram, $letter) - $pos + 1;
			} else {
				$attributes[$letter] = 0;
			}
		}

		return new static( $attributes );

	}



}
