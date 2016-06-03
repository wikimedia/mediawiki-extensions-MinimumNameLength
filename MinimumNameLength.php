<?php
/**
 * The Minimum Name Length extension enforces a minimum username length
 * during account registration
 *
 * @link https://www.mediawiki.org/wiki/Extension:Minimum_Name_Length Documentation
 * @link https://www.mediawiki.org/wiki/Extension_talk:Mimimum_Name_Length Support
 * @link https://phabricator.wikimedia.org/diffusion/EMNL/repository/master/ Source Code
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
	'version' => '1.2.2',
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

// Load exension's class
$wgAutoloadClasses['MinimumNameLength'] = __DIR__ . '/MinimumNameLength.class.php';

// Register extension messages
$wgMessagesDirs['MinimumNameLength'] = __DIR__ . '/i18n';
$wgExtensionMessagesFiles['MinimumNameLength'] = __DIR__ . '/MinimumNameLength.i18n.php';

// Register hooks
$wgHooks['AbortNewAccount'][] = 'MinimumNameLength::onAbortNewAccount';
