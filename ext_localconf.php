<?php
if (!defined ('TYPO3_MODE')) 	die ('Access denied.');

Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY,
	'Pi1',
	array(
		'Video' => 'index, show, new, create, edit, update, delete',
    'Feed' => 'index, show, new, create, edit, update, delete',
    'User' => 'index, show, new, create, edit, update, delete',
    'Comment' => 'index, show, new, create, edit, update, delete',
    'Assignment' => 'index, show, new, create, edit, update, delete',
	),
	array(
		'Video' => 'create, update, delete',
    'Feed' => 'create, update, delete',
    'User' => 'create, update, delete',
    'Comment' => 'create, update, delete',
    'Assignment' => 'create, update, delete',
	)
);

?>