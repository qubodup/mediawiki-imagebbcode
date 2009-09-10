<?php
#
# BBCode Thumbnail Embedding extension for MediaWiki
#
# Installation:
#	create a new directory extensions/bbthem and copy all files there
#	add the following to LocalSettings.php:
#	require_once( "extensions/bbthem/bbthem.php" );
#

if(! defined('MEDIAWIKI')) {
	die("This is a MediaWiki extension and can not be used standalone.\n");
}

$wgAutoloadClasses['ImageBBCode'] = dirname( __FILE__ ) . '/ImageBBCode.class.php';
$wgExtensionMessagesFiles['ImageBBCode'] = dirname(__FILE__) . '/ImageBBCode.i18n.php';
$wgExtensionFunctions[] = 'efImageBBCode';
$wgExtensionCredits['other'][] = array(
	'name' => 'ImageBBCode',
	'description' => 'Adds BBCode in the Image namespace for embedding images thumbnails.',
	'version' => '0.1',
	'author' => 'Iwan Gabovitch',
	'url' => 'http://www.mediawiki.org/wiki/Extension:ImageBBCode'
);

function efImageBBCode() {
	global $wgHooks;
	wfLoadExtensionMessages( 'ImageBBCode' );
	$wgHooks['ImageOpenShowImageInlineBefore'][] = 'ImageBBCode::imageOpenHook';
}
