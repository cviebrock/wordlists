<?php


class Wordlist {

	/**
	 * Returns an alphagram (letters sorted alphabetically)
	 * of a given word.
	 *
	 * e.g. WORDLIST -> DILORSTW
	 *
	 * @param  string $word
	 * @return string
	 */
	public static function alphagram( $word )
	{
		return join('', static::wordToArray($word));
	}


	/**
	 * Returns an array of letter count for a word.
	 *
	 * e.g. SCRABBLE -> array ( 'a'=>1, 'b'=>2, 'c'=>1, 'e'=>1, 'l'=>1, 'r'=>1, 's'=>1 )
	 *
	 * @param  string $word
	 * @return array
	 */
	public static function letterFrequency( $word, $keys = array() )
	{
		$array = array_flip( static::wordToArray( $word ) );

		$i = 0;

		foreach ($array as $letter => $n ) {
			if ($i++==0) {
				$array[$letter] = $n+1;
			} else {
				$array[$letter] = $n - $prev_n;
			}
			$prev_n = $n;
		}

		if ( !empty( $keys ) ) {
			$keys = array_fill_keys( $keys, 0 );
			$array = array_merge( $keys, $array );
		}


		return $array;

	}



	/**
	 * Convert a word into an array of it's letters.
	 *
	 * @param  string $word
	 * @return array
	 */
	private static function wordToArray( $word )
	{
		$array = str_split($word);
		sort($array);
		return $array;
	}



}
