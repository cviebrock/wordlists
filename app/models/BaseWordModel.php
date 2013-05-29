<?php

class BaseWordModel extends Eloquent {

	protected $guarded = array('id');

	public $timestamps = false;

	public static $letters = array(
		'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'
	);


	public static function buildAttributes( $word, $with_nulls = false )
	{

		$attributes = array(
			'word'      => $word,
			'length'    => Str::length( $word ),
			'alphagram' => Wordlist::alphagram( $word )
		);

		$frequency = Wordlist::letterFrequency( $word, static::$letters );

		$attributes = array_merge( $attributes, $frequency );

		return $attributes;

	}



}
