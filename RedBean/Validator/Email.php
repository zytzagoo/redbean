<?php
/**
 * RedBean Validator Email
 * @package 		RedBean/Validator/Email.php
 * @description		Checks whether a value is a valid email address
 * @author			Gabor de Mooij
 * @license			BSD
 */
class RedBean_Validator_Email implements RedBean_Validator {
	/**
	 * (non-PHPdoc)
	 * @see RedBean/RedBean_Validator#check()
	 */
	public function check( $v ) {
		return (bool) preg_match( "/^([0-9a-zA-Z]([-.\w]*[0-9a-zA-Z])*@([0-9a-zA-Z][-\w]*[0-9a-zA-Z]\.)+[a-zA-Z]{2,9})$/", $v );
	}
}