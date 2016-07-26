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
if ( function_exists( 'wfLoadExtension' ) ) {
	wfLoadExtension( 'MinimumNameLength' );
	// Keep i18n globals so mergeMessageFileList.php doesn't break
	$wgMessagesDirs['MinimumNameLength'] = __DIR__ . '/i18n';
	/* wfWarn(
		'Deprecated PHP entry point used for Minimum Name Length extension. ' .
		'Please use wfLoadExtension instead, ' .
		'see https://www.mediawiki.org/wiki/Extension_registration for more details.'
	); */
	return true;
} else {
	die( 'This version of the Minimum Name Length extension requires MediaWiki 1.25+' );
}
