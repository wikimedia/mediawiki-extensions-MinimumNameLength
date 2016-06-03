<?php
/**
 * MinimumNameLength
 *
 * @file
 * @ingroup Extensions
 *
 * @license http://www.opensource.org/licenses/BSD-2-Clause BSD 2-clause
 *
 */

/**
 * Hooks account creation and checks the username length, cancelling with an error
 * if the username is too short
 *
 * @param User $user User object being created
 * @param string $error Reference to error message to show
 * @return bool
 */

class MinimumNameLength {

	public static function onAbortNewAccount( $user, &$error ) {
		global $wgMinimumUsernameLength;

		if( mb_strlen( $user->getName() ) < $wgMinimumUsernameLength ) {

			$error = wfMessage( 'minimumnamelength-error' )->numParams( $wgMinimumUsernameLength )->plain();
			return false;
		}

		return true;
	}
}
