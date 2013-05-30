<?php

class Helper {


	public static function arrayToFormer( $array ) {

		$return = array();

		foreach( $array as $key => $value ) {
			$return[$value] = array(
				'label' => $value,
				'value' => $key,
			);
		}

		return $return;

	}


}
