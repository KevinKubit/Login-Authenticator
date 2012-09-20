<?php
/**
* This file will contain general functions that are used across the program.
*/

/**
* Test whether a user is already logged in.
*
* @return bool
*/

function is_logged_in() {

if ( @session_id() ) {
return ( isset( $_SESSION['username'] ) );
}

return false;
}

/**
* Sanitize a password stripping out dangerous characters
*
* @param string $password
* @return string
*/
function sanitize_password( $password ) {
return preg_replace( '/[\t\'"%<>\-\(\)\n\r]/i', '', $password );
}

/**
* Sanitize a username, alpha-numeric chars only!
*
* @param string $username
* @return string
*/
function sanitize_username( $username ) {
return preg_replace( '/[^a-z0-9]/i', '', $username );
}



?>
