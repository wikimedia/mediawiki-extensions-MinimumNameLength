<?php
/**
 * Implements the PreAuthenticationProvider interface for the MinimumNameLength extension.
 */

/**
 * Class MinimumNameLengthPreAuthenticationProvider
 */
class MinimumNameLengthPreAuthenticationProvider extends
	\MediaWiki\Auth\AbstractPreAuthenticationProvider {
	public function testUserForCreation( $user, $autocreate, array $options = [] ) {
		global $wgMinimumUsernameLength;

		$value = StatusValue::newGood();
		if( $autocreate === false && strlen( $user->getName() ) < $wgMinimumUsernameLength ) {
			$value->fatal( wfMessage( 'minimumnamelength-error', Message::numParam(
				$wgMinimumUsernameLength ) ) );
		}
		return $value;
	}
}
