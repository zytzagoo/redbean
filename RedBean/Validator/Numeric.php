<?php
/**
 * RedBean Validator Numeric
 * @package 		RedBean/Validator/Numeric.php
 * @description		Checks whether a value is numeric
 * @author			Gabor de Mooij
 * @license			BSD
 */
class RedBean_Validator_Numeric implements RedBean_Validator {
	/**
	 * (non-PHPdoc)
	 * @see RedBean/RedBean_Validator#check()
	 */
	public function check( $v ) {
		return (bool) is_numeric( $v );
	}
}