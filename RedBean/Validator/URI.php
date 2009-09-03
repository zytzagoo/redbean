<?php
/**
 * RedBean Validator URI
 * @package 		RedBean/Validator/URI.php
 * @description		Checks whether a value is a valid URI address
 * @author			Gabor de Mooij
 * @license			BSD
 */
class RedBean_Validator_URI implements RedBean_Validator {
	/**
	 * (non-PHPdoc)
	 * @see RedBean/RedBean_Validator#check()
	 */
	public function check( $v ) {
		return (bool) preg_match( "/^([a-zA-Z0-9]([a-zA-Z0-9\-]{0,61}[a-zA-Z0-9])?\.)+[a-zA-Z]{2,6}$/", $v );
	}
}