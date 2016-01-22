<?php
/**
 * The Minimum Name Length extension enforces a minimum username length
 * during account registration
 *
 * @link https://www.mediawiki.org/wiki/Extension:Minimum_Name_Length Documentation
 * @link https://www.mediawiki.org/wiki/Extension_talk:Mimimum_Name_Length Support
 * @link https://git.wikimedia.org/summary/mediawiki%2Fextensions%2FMinimumNameLength.git Source Code
 *
 * @file
 * @ingroup Extensions
 * @package MediaWiki
 *
 * @author Rob Church (Robchurch) <robchur@gmail.com>
 * @author Karsten Hoffmeyer (Kghbln) <karsten@hoffmeyer.info>
 *
 * @license http://www.opensource.org/licenses/BSD-2-Clause BSD 2-clause
 */

// Ensure that the script cannot be executed outside of MediaWiki
if ( !defined( 'MEDIAWIKI' ) ) {
    die( 'This is an extension to MediaWiki and cannot be run standalone.' );
}

// Display extension's information on "Special:Version"
$wgExtensionCredits['other'][] = array(
	'path' => '__FILE__',
	'name' => 'Minimum Username Length',
	'version' => '1.2.1-alpha',
	'author' => array(
		'Rob Church',
		'Karsten Hoffmeyer',
		'...'
		),
	'descriptionmsg' => 'minimumnamelength-desc',
	'url' => 'https://www.mediawiki.org/wiki/Extension:Minimum_Name_Length',
	'license-name' => 'BSD-2-Clause'
);

// Minimum username length to enforce
$wgMinimumUsernameLength = 10;

// Register extension messages
$wgMessagesDirs['MinimumNameLength'] = __DIR__ . '/i18n';
$wgExtensionMessagesFiles['MinimumNameLength'] = __DIR__ . '/MinimumNameLength.i18n.php';

// Register hooks
$wgHooks['AbortNewAccount'][] = 'efMinimumNameLength';

/**
 * Hooks account creation and checks the username length, cancelling with an error
 * if the username is too short
 *
 * @param User $user User object being created
 * @param string $error Reference to error message to show
 * @return bool
 */
function efMinimumNameLength( $user, &$error ) {
	global $wgMinimumUsernameLength;

	if( mb_strlen( $user->getName() ) < $wgMinimumUsernameLength ) {

		$error = wfMessage( 'minimumnamelength-error' )->numParams( $wgMinimumUsernameLength )->plain();
		return false;
	}

	return true;
}
