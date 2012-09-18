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
